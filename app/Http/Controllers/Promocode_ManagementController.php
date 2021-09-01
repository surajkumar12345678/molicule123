<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StoreDetail;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class Promocode_ManagementController extends Controller
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
                                  ->where('user_id', Auth::id())->first();
            $promocodes = DB::table('promocodes')->where('store_detail_id',$store_detail_id->id)->get();
            return DataTables::of($promocodes)
            ->editColumn('id', function ($promocodes) {
                return $promocodes->id;
            })
            ->editColumn('promocode', function ($promocodes) {
                return $promocodes->promocode;
            })
            ->editColumn('description', function ($promocodes) {
                return $promocodes->description;
            }) 
            ->editColumn('discount_type', function ($promocodes) {
                return $promocodes->discount_type;
            })
            ->editColumn('start_date', function ($promocodes) {
                return $promocodes->start_date;
            })
            ->editColumn('end_date', function ($promocodes) {
                return $promocodes->end_date;
            })
            ->addColumn('status', function($promocodes){
				if($promocodes->status=='1'){ 
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " "; 
                    $active = "";
				}
				return $status = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$promocodes->id.'"  '.$checked.' action="promocode-change-status" class="cb-value togglePromocode" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($promocodes){
				$button = ' <a href="/merchant/PromocodeUpdateForm/'.$promocodes->id.'" class="btn-link">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeletePromocode'.$promocodes->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';	
				return $button;
            })
            ->escapeColumns([])	     
            ->make(true);  
        }
        $store_detail_id = StoreDetail::select('id')
                                    ->where('user_id', Auth::id())->first();
        $promocodes = DB::table('promocodes')->where('store_detail_id',$store_detail_id->id)->get();
        return view("merchant-dashboard.promocode-management",compact(['promocodes']));
    }

    public function promocodeform()
    {
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->first();
        $products = Product::where('store_detail_id',$store_detail_id->id)->get(); 
        return view('merchant-dashboard.promocode-form',compact(['products']));                         
    }

    public function promocodeupdateform($id)
    {
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->first();
        $products = Product::where('store_detail_id',$store_detail_id->id)->get();
        $promocode = DB::table('promocodes')->where('id',$id)->get()->first();
        $specific_product = Product::where('id',$promocode->specific_product)->get()->first();
        return view('merchant-dashboard.promocode-update-form',compact(['products','promocode','specific_product']));                         
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
        $validatedData = $request->validate([
            'promocode' => ['required','unique:promocodes'],
        ]);
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->first();
        $data = DB::table('promocodes')->insert([
            'promocode' => $request->promocode,
            'description' =>$request->description,
            'discount_percentage' => $request->discount_percentage,
            'discount_type' => $request->discount_type,
            'max_amount' => $request->max_amount,
            'fixed_rate_discount' => $request->fixed_rate_discount,
            'specific_product' => $request->specific_product,
            'promocode_mode' => $request->promocode_mode,
            'no_of_time_used' => $request->no_of_time_used,
            'max_time_one_user' => $request->max_time_one_user,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_at' => now(),
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id->id
        ]);
        if($data)
        {
            return redirect()->back()->with('success','Promocode added successfully');
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
    public function update(Request $request, $id)
    {
        $discount_percentage = null;
        $fixed_rate_discount = null;
        $max_amount = null;
        $no_of_time_used = null;
        if($request->discount_percentage != null)
        {
            $discount_percentage = $request->discount_percentage;
            $max_amount = $request->max_amount;
        }
        else
        {
            $fixed_rate_discount = $request->fixed_rate_discount;
        }
        if($request->promocode_mode == 'no of time used')
        {
            $no_of_time_used = $request->no_of_time_used;
        }
        $arr = [
            'promocode' => $request->promocode,
            'description' =>$request->description,
            'discount_percentage' => $discount_percentage,
            'discount_type' => $request->discount_type,
            'max_amount' => $max_amount,
            'fixed_rate_discount' => $fixed_rate_discount,
            'specific_product' => $request->specific_product,
            'promocode_mode' => $request->promocode_mode,
            'no_of_time_used' => $no_of_time_used,
            'max_time_one_user' => $request->max_time_one_user,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'updated_at' => now()
        ];
        $data = DB::table('promocodes')->where('id',$id)->update($arr);
        if($data)
        {
            return redirect('/merchant/promocode-management')->with('success','Promocode updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= DB::table('promocodes')->where('id',$id)->delete();
        return redirect()->back()->with('success','Promocode deleted successfully');
    }

    /**
     * Activate the blog.
     */
    public function activate($id)
    {
        $data=DB::table('promocodes')->where('id',$id)->update([
            'status' => '1'
        ]);
        if($data)
        {
            return redirect()->back()->with('success','status change successfully');
        }
    }

    /**
     * Inctivate the blog.
     */
    public function inactivate($id)
    {
        $data=DB::table('promocodes')->where('id',$id)->update([
            'status' => '0'
        ]);
        if($data)
        {
            return redirect()->back()->with('success','status change successfully');
        }
    }

    public function ChangeStatus(Request $request)
    {
        $promocode = DB::table('promocodes')->where('id',$request->id)->update(['status' => $request->status ]);
        return response()->json(['success'=>'Status Change Successfully.']);
    }
}
