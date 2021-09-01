<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use DataTables;
use DB;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax())
        {

            $subscriptions = Subscription::get();
            return DataTables::of($subscriptions)
            ->editColumn('id', function ($subscriptions) {
                return $subscriptions->id;
            })
            ->editColumn('plan_name', function ($subscriptions) {
                return $subscriptions->plan_name;
            })
            ->editColumn('number_of_product_allowed', function ($subscriptions) {
                return $subscriptions->number_of_product_allowed;
            })
            ->editColumn('validity_in_days', function ($subscriptions) {
                return $subscriptions->validity_in_days;
            })
            ->editColumn('price', function ($subscriptions) {
                return $subscriptions->price;
            })
            ->addColumn('status', function($subscriptions){
				if($subscriptions->status=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $status = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$subscriptions->id.'"  '.$checked.' action="admin/subscriptions-change-status" class="cb-value toggleSubscriptions" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($subscriptions){
				$button = ' <a href="edit-subscriptions/'.$subscriptions->id.'" class="btn-link">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeleteSubs'.$subscriptions->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
 
        $subscriptions = Subscription::get();
        return view('admin.subscriptions', compact('subscriptions'));
    }
    public function add_subscriptions()
    {
        return view('admin.add-subs');
    }
    public function post_subscription(SubscriptionRequest $subscription)
    {
        // dd($subscription->all());
        $validated=$subscription->validated();
        // dd($validated);
        $added=Subscription::create($validated);
        if($added)
        {
            return back()->with('msg','Plan has been added');
        }
        else{
            return back()->withErrors($validated);
        }
    }

    public function edit_subscription($subscription)
    {   
       
        $subscription=Subscription::where('id',$subscription)->first();
        return view('admin.edit-subs', compact('subscription'));
    }
    public function delete_subscription($subscription)
    {
        $deleted=Subscription::destroy($subscription);
        if($deleted)
        {
            return back()->with('msg', 'Your Plan has been deleted');
        }
    }
    public function update_subscriptions(SubscriptionRequest $subrequest, $subscription)
    {
        // dd($subscription);
         $validated=$subrequest->validated();
        //  dd($validated);
        //  $validated=$subrequest->validated();
         // dd($validated);
         $added=Subscription::find($subscription)->update($validated);
         if($added)
         {
             return redirect('admin/subcriptions')->with('success','Plan has been updated');
         }
         else{
             return back()->withErrors($validated);
         }
    }

    public function ChangeStatus(Request $request)
    {
        DB::table('subscriptions')->where('id',$request->id)->update([
            'status' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }

}
