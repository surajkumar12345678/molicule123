<?php

namespace App\Http\Controllers;
use App\Models\StoreDetail;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Admin_blogs;
use DB;
use App\Models\BlogCategory;
use Str;

class MerchentManagementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax())
        {

            $user = DB::table('users')
                    ->join('store_details', 'store_details.user_id', '=', 'users.id')
                    ->select('users.*','store_details.domain_name','users.status as usersstatus')
                    ->where('users.role','merchant')
                    ->get();

            return DataTables::of($user)
            ->editColumn('id', function ($user) {
                return $user->id;
            })
            ->editColumn('name', function ($user) {
                return $user->first_name.' '.$user->last_name;
            })
            ->editColumn('domain', function ($user) {
                if($user->domain_name){
                    return $user->domain_name;
                }else{
                    return $domain_name ="N/A";
                }

            })
            ->editColumn('mobile_number', function ($user) {
                if($user->mobile_number){
                    return $user->mobile_number;
                }else{
                    return $mobile ="N/A";
                }

            })
            ->addColumn('status', function($user){
				if($user->usersstatus=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $status_categories = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$user->userid.'"  '.$checked.' action="admin/user-change-status" class="cb-value toggleuser" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($user){
				$button = ' <button class="btn-link" data-toggle="modal" data-target="#DeleteCategory'.$user->userid.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }

        return view('admin.merchent');

    }
    public function destroy($id)
    {
        $deleted=User::find($id)->dele;
        if($deleted)
        {
            return back()->withConfirm('Merchent has been deleted');
        }
    }
    public function show($id)
    {
        $merchent=User::find($id);
        return view('admin.single-merchent', compact('merchent'));;
    }
    public function update(Request $request, $id)
    {
        $merchent=User::find($id);
        if ($merchent->is_varified=='0') {
            $merchent->is_varified=1;
            $merchent->save();
            return back()->with('confirm', 'Merchent has been activated');
        } else {
            $merchent->is_varified=0;
            $merchent->save();
            return back()->with('confirm', 'Merchent has been inactivated');
        }


    }



	public function blog(Request $request, $id="")
    {
        $categories = BlogCategory::all();
        $blog = DB::table('admin_blogs')->where('id',$id)->first();
        return view('admin.blog-form',compact('categories','blog'));
    }

	public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'title' => 'required|unique:admin_blogs,title,'.$id.',id',
            'category' => 'required',
            'body' => 'required|min:3',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = "blog_".rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs');
            $image->move($destinationPath, $image_update);
        }else{
            $image = Admin_blogs::where('id',$request->id)->first();
            $image_update = $image->image;
        }
        $fileName=$image_update;

        if(isset($request->id)){
            $data = DB::table('admin_blogs')->where('id','=',$id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
                'image' => $fileName,
                'blog_category_id' => $request->category
            ]);
            if($data)
            {
                return redirect('merchents-blog')->with('success','Blog updated successfully');
            }

        }else{
            $data = DB::table('admin_blogs')->insert([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
                'image' => $fileName,
                'blog_category_id' => $request->category
            ]);
            if($data)
            {
                return redirect('merchents-blog')->with('success','Blog added successfully');
            }
        }
    }

	public function destroyblog(Request $request)
    {
        $id = $request->id;
        $data=Admin_blogs::where('id',$id)->delete();
        return redirect('merchents-blog')->with('success','Blog deleted successfully');
    }

	public function changeUserStatus(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'status' => $request->status
        ]);

        return response()->json(['success'=>'Status Change Successfully.']);
    }

}
