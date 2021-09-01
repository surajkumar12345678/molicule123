<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreDetail;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use DataTables;
use DB;

class CMS_ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        
        if ($request->ajax()) {

            $pages=Page::where('store_detail_id',$store_detail_id->id)->get();
            return DataTables::of($pages)
            ->editColumn('title', function ($pages) {
                return $pages->title;
            })
            ->editColumn('slug', function ($pages) {
                return $pages->slug;
            })
            ->addColumn('status', function($pages){
                if($pages->status=='1'){
                    $checked = "checked";
                    $active = "active";

                }else{
                    $checked = " ";
                    $active = "";
                }
                return $status_pages = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$pages->id.'"  '.$checked.' action="page-change-status" class="cb-value togglePage" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
            ->addColumn('action', function($pages){
                $button = ' <a href="/merchant/update-page/'.$pages->id.'" class="btn-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                $button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeletePage'.$pages->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
        $pages = Page::where('store_detail_id',$store_detail_id->id)->get();
        return view('merchant-dashboard.cms-management',compact('pages'));
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
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        $arr = [
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id->id,
            'created_at' => now()
        ];
        if($request->file('banner_image'))
        {
            $originName = $request->file('banner_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('banner_image')->move(public_path('/uploads/cms/'), $fileName);
            $arr['banner_image'] = $fileName;
        }
        
        $data = Page::create($arr);                          
        return redirect('/merchant/cms-management')->with('success','Page updated successfully');
    }

    public function pageform()
    {
        return view('merchant-dashboard.page-form');
    }

    public function updatepageform($id)
    {
        $data = Page::where('id',$id)->get()->first();
        return view('merchant-dashboard.page-update-form',compact('data'));
    }

    public function storeupdatepage(Request $request, $id)
    {
        $arr = [
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'updated_at' => now()
        ];
        if($request->file('banner_image'))
        {
            $originName = $request->file('banner_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('banner_image')->move(public_path('/uploads/cms/'), $fileName);
            $arr['banner_image'] = $fileName;
        }
        
        $data = Page::where('id',$id)->update($arr);                          
        return redirect()->back()->with('success','Page updated successfully');
    }
    

    public function aboutus()
    { 
        $store_detail_id = StoreDetail::where('user_id', Auth::id())
                                  ->get()->first();

        $data = Page::where('store_detail_id',$store_detail_id->id)->where('slug','about-us')->get()->first();
        return view('web-layouts.about',compact('data','store_detail_id'));
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

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('/uploads/cms/'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/uploads/cms/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
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
    public function GetTerm(Request $request)
    {
        $term = DB::table('admin_term')->where('slug','term')->first();
        return view('merchent.terms',compact('term'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Page::where('id',$id)->delete();                          
        return redirect()->back()->with('success','Page deleted successfully');
    }

    public function ChangeStatus(Request $request)
    {

        $products = Page::find($request->id);
        $products->status = $request->status;
        $products->save();
        return response()->json(['success'=>'Status Change Successfully.']);
    }
}
