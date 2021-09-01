<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use DataTables;

class AdminCmsController extends Controller
{
    public function AboutPageUpdate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'title' => 'required'
        ]);
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = "blog_".rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/admin/about');
            $image->move($destinationPath, $image_update);
        }else{
            $image = DB::table('admin_about')->where('id',$request->id)->first();
            $image_update = $image->images;
        }
        $fileName=$image_update;

        if(isset($request->id)){
            $data = DB::table('admin_about')->where('id',$request->id)->update([
                'title' => $request->title,
                'slug' => 'about',
                'desc' => $request->desc,
                'image' => $fileName
            ]);
            if($data)
            {
                return redirect()->back()->with('msg','About updated successfully');
            }

        }else{
                //     $data = DB::table('admin_about')->insert([
                //     'title' => $request->title,
                //     'slug' => 'about',
                //     'desc' => $request->desc,
                //     'image' => $fileName
                // ]);
                return redirect()->back()->with('msg','data not found');
            
             }
    }

    public function AboutPage(Request $request)
    {
        $about = DB::table('admin_about')->where('slug','about')->first();
        return view('admin.pages.about')->with(compact('about'));
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('uploads/admin/about'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/admin/about'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    //faq page
    public function faqPage(Request $request)
    {
        if ($request->ajax())
        {
            $faqs = DB::table('admin_faq')->get();
            return DataTables::of($faqs)
            ->editColumn('id', function ($faqs) {
                return $faqs->id;
            })
            ->editColumn('title', function ($faqs) {
                return $faqs->title;
            })
            ->editColumn('desc', function ($faqs) {
                return $faqs->desc;
            })
			->addColumn('action', function($faqs){
				$button = ' <a href="/admin/update-faq/'.$faqs->id.'" class="btn-link">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#Deletefaq'.$faqs->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
        $faqs = DB::table('admin_faq')->get();
        return view('admin.pages.faq')->with(compact('faqs'));
    }

    public function AddFaq(Request $request,$id="")
    {
        $faq = DB::table('admin_faq')->where('id',$id)->first();
        return view('admin.pages.add-faq')->with(compact('faq'));
    }

    public function AddFormFaq(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'title' => 'required'
        ]);
        if(isset($request->id)){
            $data = DB::table('admin_faq')->where('id',$request->id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Faq updated successfully');
            }

        }else{
            $data = DB::table('admin_faq')->insert([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc
            ]);
            return redirect()->back()->with('success','Faq added successfully');
        
        }
    }

    public function DeleteFaq(Request $request,$id="")
    {
        $faq = DB::table('admin_faq')->where('id',$id)->delete();
        return redirect()->back()->with('success','Faq deleted successfully');
    }

    //term page
    public function TermPageUpdate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'title' => 'required'
        ]);
        
        if(isset($request->id)){
            
            DB::table('admin_term')->where('id',$request->id)->update([
                'title' => $request->title,
                'slug' => 'term',
                'desc' => $request->desc
            ]);
            return redirect()->back()->with('msg','Term and Condition updated successfully');
           

        }else{
             DB::table('admin_term')->insert([
                'title' => $request->title,
                'slug' => 'term',
                'desc' => $request->desc
            ]);
            return redirect()->back()->with('msg','data not found');
        
        }
    }

    public function TermPage(Request $request)
    {
        $term = DB::table('admin_term')->where('slug','term')->first();
        return view('admin.pages.term')->with(compact('term'));
    }
    

    
     
}
