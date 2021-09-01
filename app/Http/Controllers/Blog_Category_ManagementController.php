<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\StoreDetail;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Str;
use DB;

class Blog_Category_ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


	public function index(Request $request){
		

        if ($request->ajax()) {

            $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())->first();
			$categories=BlogCategory::where('store_detail_id',$store_detail_id->id)->get();
            return DataTables::of($categories)
            ->editColumn('id', function ($categories) {
                return $categories->id;
            })
            ->editColumn('name', function ($categories) {
                return $categories->category_name;
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
                <input data-size="mini" data-id="'.$categories->id.'"  '.$checked.' action="blog-category-change-status" class="cb-value toggleCategory" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($categories){
				$button = ' <button class="btn-link" data-toggle="modal" data-target="#updatecategory'.$categories->id.'">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeleteCategory'.$categories->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);


        }
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())->first();
        $categories=BlogCategory::where('store_detail_id',$store_detail_id->id)->get();
        return view('merchant-dashboard.blog-category-management',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'category_name' => ['required','unique:blog_categories']
        ]);
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())->first();
        $data = DB::table('blog_categories')->insert([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id->id
        ]);
        if($data)
        {
            return redirect()->back();
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
        $validateData= $request->validate([
            'category_name' => ['required','unique:categories']
        ]);
        $data=BlogCategory::where('id',$id)->update(array(
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name)
        ));
        if($data)
        {
            return redirect()->back()->with('success','Category updated successfully');
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
        Blog::where('blog_category_id',$request->id)->delete();
        $data=BlogCategory::where('id',$request->id)->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }

    public function ChangeStatus(Request $request)
    {

        $category = BlogCategory::find($request->id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['success'=>'Status Change Successfully.']);
    }
}
