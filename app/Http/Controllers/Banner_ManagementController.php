<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreDetail;
use App\Models\BannerImage;
use Illuminate\Support\Facades\Auth;
class Banner_ManagementController extends Controller
{
    public function index()
    {
        $store_detail_id = StoreDetail::select('id')
                                      ->where('user_id',Auth::id())
                                      ->first();
   
        $banners = BannerImage::where('store_detail_id',$store_detail_id->id)->get();
        return view('merchant-dashboard.banner-management',compact('banners'));
    }

    public function store(Request $request)
    {
        $validateData= $request->validate([
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg']
        ]);
        $store_detail_id = StoreDetail::select('id')
                                      ->where('user_id', Auth::id())
                                      ->get()->first();
        $set_arr = [
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id->id
        ];
        if($request->file('image'))
        {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('image')->move(public_path('/uploads/banners/'), $fileName);
            $set_arr['image'] = $fileName;
        }

        $data=BannerImage::create($set_arr);
        if($data)
        {
            return redirect()->back()->with('success','Banner added successfully');
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validateData= $request->validate([
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg']
        ]);

        $set_arr = [];

        if($request->file('image'))
        {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('image')->move(public_path('/uploads/banners/'), $fileName);
            $set_arr['image'] = $filename;
        }

        $data=BannerImage::where('id',$id)->update($set_arr);
        if($data)
        {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        // $id = $request->id;
        $data=BannerImage::where('id',$id)->delete();
        return redirect()->back();
    }
}
