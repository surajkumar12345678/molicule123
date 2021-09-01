<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use DataTables;
use Str;

class AdminBlogController extends Controller
{
    public function blog_management(Request $request)
    {
        if ($request->ajax())
        {

            $blogs = DB::table('admin_blogs')
                    ->join('admin_blogs_category', 'admin_blogs_category.id', '=', 'admin_blogs.category_id')
                    ->select('admin_blogs.*','admin_blogs_category.cate_name')
                    ->get();
            return DataTables::of($blogs)
            ->editColumn('id', function ($blogs) {
                return $blogs->id;
            })
            ->editColumn('title', function ($blogs) {
                return $blogs->title;
            })
            ->editColumn('image', function ($blogs) {
                return $image = '<img class="productcss" src="'.asset('/uploads/admin/blogs/'.$blogs->images).'">';
            })
            ->editColumn('category', function ($blogs) {
                return $blogs->cate_name;
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
                <input data-size="mini" data-id="'.$blogs->id.'"  '.$checked.' action="admin/blog-change-status" class="cb-value toggleBlog" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($blogs){
				$button = ' <a href="update-admin-blog/'.$blogs->id.'" class="btn-link">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeleteBlog'.$blogs->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
 
        $blogs = DB::table('admin_blogs')->where('id','!=','0')->get();
        return view("admin.blog_management",compact(['blogs']));
    }
    

    public function blog(Request $request, $id="")
    {
        $categories = DB::table('admin_blogs_category')->where('status','1')->get();
        $blog = DB::table('admin_blogs')->where('id',$id)->where('status','1')->first();
        return view('admin.blog-form',compact('categories','blog'));
    }

    public function CategoryList(Request $request)
    {
        if ($request->ajax()) {
            
			$categories=DB::table('admin_blogs_category')->get();
            return DataTables::of($categories)
            ->editColumn('id', function ($categories) {
                return $categories->id;
            })
            ->editColumn('name', function ($categories) {
                return $categories->cate_name;
            })
            ->addColumn('status', function($categories){
				if($categories->status=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $status_categories = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$categories->id.'"  '.$checked.' action="admin/category-change-status" class="cb-value toggleCategory" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($categories){
				$button = ' <a href="update-category/'.$categories->id.'" class="btn-link">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeleteCategory'.$categories->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
 
        $category = DB::table('admin_blogs_category')->where('id','!=','0')->get();
        return view("admin.blog_category.category",compact(['category']));
    }

    public function category(Request $request, $id="")
    {
        $category = DB::table('admin_blogs_category')->where('id',$id)->first();
        return view('admin.blog_category.add_category',compact('category'));
    }

    public function storeCategory(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|unique:admin_blogs_category,cate_name,'.$id.',id',
        ]);
        
        if(isset($request->id)){
            $data = DB::table('admin_blogs_category')->where('id',$request->id)->update([
                'cate_name' => $request->name,
                'cate_slug' => Str::slug($request->name)
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Category updated successfully');
            }

        }else{
            $data = DB::table('admin_blogs_category')->insert([
                'cate_name' => $request->name,
                'cate_slug' => Str::slug($request->name)
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Category added successfully');
            }
        }

    }

    public function DeleteCategory($id)
    {
        DB::table('admin_blogs_category')->where('id',$id)->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }

    public function ChangeStatus(Request $request)
    {
        DB::table('admin_blogs_category')->where('id',$request->id)->update([
            'status' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('uploads/admin/blogs/'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/admin/blogs/'.$fileName);
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
            'title' => 'required|unique:admin_blogs,title,'.$id.',id',
            'category' => 'required',
        ]);
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = "blog_".rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/admin/blogs');
            $image->move($destinationPath, $image_update);
        }else{
            $image = DB::table('admin_blogs')->where('id',$request->id)->first();
            $image_update = $image->images;
        }
        $fileName=$image_update;

        if(isset($request->id)){
            $data = DB::table('admin_blogs')->where('id',$request->id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'blog_desc' => $request->blog_desc,
                'images' => $fileName,
                'category_id' => $request->category
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Blog updated successfully');
            }

        }else{
            $data = DB::table('admin_blogs')->insert([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'blog_desc' => $request->blog_desc,
                'images' => $fileName,
                'category_id' => $request->category
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Blog added successfully');
            }
        }
    }

    public function BlogChangeStatus(Request $request)
    {
        DB::table('admin_blogs')->where('id',$request->id)->update([
            'status' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }

    public function DeleteBlog($id)
    {
        DB::table('admin_blogs')->where('id',$id)->delete();
        return redirect()->back()->with('success','Blogs deleted successfully');
    }


    //blogs data
	public function listBlogs(Request $request,$slug = ""){

		if($request->ajax()){

			$limit=$request["limit"];
			$offset=$request['offset'];
			$cond="admin_blogs.id != '0'  and admin_blogs.status = '1'";
			
			if(isset($request->cate_slug)){
				$cond.=" and admin_blogs_category.cate_slug ='".$request->cate_slug."'";
			}

			$blogs = DB::select('SELECT admin_blogs.*, admin_blogs_category.cate_name, admin_blogs_category.cate_slug as cateslug FROM admin_blogs INNER JOIN admin_blogs_category ON admin_blogs_category.id=admin_blogs.category_id  where '.$cond.' LIMIT '.$limit.' OFFSET '.$offset);
			
			if($blogs){

				$json['status']=true;
				$json['total']=count($blogs);
				$json['html']=view('merchent.partisals.blogs')->with('blogs',$blogs)->render();

			}else{

				$json['status']=false;
				$json['total']=0;
				$json['html']='<div class="col-md-12" style="padding-top: 200px;display: flex;align-items: center;justify-content: center;"><img style="height:150px" src="'.asset('notfound.PNG').'" /></div>';
			}
			return response($json,200);
		}
		return view('merchent.blogs')->with(['slug'=>$slug]);
	}
    
    
    
    

    
}
