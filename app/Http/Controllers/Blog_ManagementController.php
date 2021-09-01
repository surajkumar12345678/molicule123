<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\StoreDetail;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;
use Str;

class Blog_ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if ($request->ajax())
        {
            $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->first();
            $blogs = DB::table('blogs')
                    ->join('blog_categories', 'blog_categories.id', '=', 'blogs.blog_category_id')
                    ->select('blogs.*','blog_categories.category_name')
                    ->where('blogs.store_detail_id',$store_detail_id->id)
                    ->get();
            return DataTables::of($blogs)
            ->editColumn('id', function ($blogs) {
                return $blogs->id;
            })
            ->editColumn('title', function ($blogs) {
                return $blogs->title;
            })
            ->editColumn('image', function ($blogs) {
                return $image = '<img class="productcss" src="'.asset('/uploads/blogs/'.$blogs->image).'">';
            })
            ->editColumn('category', function ($blogs) {
                return $blogs->category_name;
            })
            ->editColumn('created_at', function ($blogs) {
                return date('M', strtotime($blogs->updated_at)).", ".date('d-Y', strtotime($blogs->updated_at));
            })
            ->addColumn('status', function($blogs){
				if($blogs->status=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $status = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$blogs->id.'"  '.$checked.' action="blog-change-status" class="cb-value toggleBlog" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($blogs){
				$button = ' <a href="/merchant/update-blog/'.$blogs->id.'" class="btn-link">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeleteBlog'.$blogs->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
        $store_detail_id = StoreDetail::select('id')
                                    ->where('user_id', Auth::id())
                                    ->first();
        $blogs = Blog::where('store_detail_id',$store_detail_id->id)->get();
        return view("merchant-dashboard.blog-management",compact(['blogs']));
    }


    public function blog(Request $request, $id="")
    {
        $categories = BlogCategory::where('status','1')->get();
        $blog = DB::table('blogs')->where('id',$id)->first();
        return view('merchant-dashboard.blog-form',compact('categories','blog'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('uploads/blogs/'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/blogs/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function store(Request $request)
    {
        
        $id = $request->id;
        $request->validate([
            'title' => 'required|unique:blogs,title,'.$id.',id',
            'category' => 'required',
            'body' => 'required|min:3',
        ]);
        $user_id = Auth::id();

        $store_detail_id = StoreDetail::select('id')
                                      ->where('user_id', Auth::id())
                                      ->get()->first();

                                      
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = "blog_".rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs');
            $image->move($destinationPath, $image_update);
        }else{
            $image = Blog::where('id',$request->id)->first();
            $image_update = $image->image;
        }
        $fileName=$image_update;
        
        if(isset($request->id)){
            $data = DB::table('blogs')->where('id',$request->id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
                'image' => $fileName,
                'blog_category_id' => $request->category,
                'user_id' => $user_id,
                'store_detail_id' => $store_detail_id->id
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Blog updated successfully');
            }

        }else{
            $data = DB::table('blogs')->insert([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
                'image' => $fileName,
                'blog_category_id' => $request->category,
                'user_id' => $user_id,
                'store_detail_id' => $store_detail_id->id
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Blog added successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        echo $id;
        $validateData= $request->validate([
            'title' => ['required',],
            'body'  => ['required'],
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg']
        ]);

        $set_arr = [
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'blog_category_id' => $request->category,
            'feature_home' => $request->feature_home,
            'updated_at' => now()
        ];

        if($request->file('image'))
        {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('image')->move(public_path('/uploads/blogs/'), $fileName);
            $set_arr['image'] = $fileName;
        }

        $data= DB::table('blogs')->where('id',$id)->update($set_arr);
        if($data)
        {
            return redirect(url('/merchant/blog-management'))->with('success','Blog updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data=Blog::where('id',$id)->delete();
        return redirect('/merchant/blog-management')->with('success','Blog deleted successfully');
    }

    public function ChangeStatus(Request $request)
    {

        $category = Blog::find($request->id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['success'=>'Status Change Successfully.']);
    }
}
