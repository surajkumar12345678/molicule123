<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;

class AdminEmailNotificationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            
            $user = DB::table('users')
                    ->join('store_details', 'store_details.user_id', '=', 'users.id')
                    ->select('users.*','store_details.domain_name')
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
                return $user->domain_name;
            })
            ->addColumn('new', function($user){
				if($user->new_merchant=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $new = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$user->id.'"  '.$checked.' action="admin/new_merchant-change" class="cb-value toggleemail" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
            ->addColumn('cancell', function($user){
				if($user->cancell=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $cancell = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$user->id.'"  '.$checked.' action="admin/cancell-change" class="cb-value toggleemail" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
            ->addColumn('upgreade', function($user){
				if($user->upgraded=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $upgreade = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$user->id.'"  '.$checked.' action="admin/upgraded-change" class="cb-value toggleemail" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
            ->addColumn('trial', function($user){
				if($user->trial_expire=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $trial = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$user->id.'"  '.$checked.' action="admin/trial_expire-change" class="cb-value toggleemail" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
            ->addColumn('setup', function($user){
				if($user->not_setup=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $setup = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$user->id.'"  '.$checked.' action="admin/not_setup-change" class="cb-value toggleemail" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
            ->escapeColumns([])
            ->make(true);
        }
        
        return view("admin.email_notification.email_notification");
    }
    
    public function new_merchantStatus(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'new_merchant' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }
    public function cancellStatus(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'cancell' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }
    public function upgradedStatus(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'upgraded' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }
    public function trial_expireStatus(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'trial_expire' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }
    public function not_setupStatus(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'not_setup' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }
}
