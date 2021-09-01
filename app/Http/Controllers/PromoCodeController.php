<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoRequest;
use App\Models\AdminPromoCode;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
// use Yajra\DataTables\Contracts\DataTable;
// use DataTables;
use Yajra\DataTables\DataTables;

class PromoCodeController extends Controller
{
    public function index()
    {
        return view('admin.promocode');
    }
    public function promos(Request $request)
    {
        if ($request->ajax())
        {
            $promos=AdminPromoCode::all();
            return DataTables::of($promos)
            ->editColumn('id', function ($promos) {
                return $promos->id;
            })
            ->editColumn('name', function ($promos) {
                return $promos->promo_code;
            })
            ->editColumn('validate', function ($promos) {
                return $promos->valid_until;
            })
            ->addColumn('status', function($promos){
				if($promos->status=='1'){
				    $checked = "checked";
                    $active = "active";

				}else{
					$checked = " ";
                    $active = "";
				}
				return $status = '
                <div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$promos->id.'"  '.$checked.' action="admin/status-change" class="cb-value togglePromo" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($promos){
				$button = ' <a href="/admin/edit-promo-code/'.$promos->id.'" class="btn-link">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
				$button .= ' <button class="btn-link" data-toggle="modal" data-target="#DeleteBlog'.$promos->id.'">
                <i class="fa fa-trash" aria-hidden="true"></i></button>';
				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
        $promos=AdminPromoCode::all();
        return view('admin.promocode', compact('promos'));
    }
    public function add_promo_code(PromoRequest $request)
    {   
        $validated=$request->validated();
        if($validated)
        {
            try{

                $success=AdminPromoCode::create([
                    "promo_code"=>$request->promocode,
                    "actual_discount"=>$request->discount,
                    "discount_type"=>$request->discount_type,
                    "is_specific"=>$request->is_specific,
                    "product_category_id"=>$request->product_or_category,
                    "no_of_times"=>$request->no_of_times,
                    'valid_until'=>$request->valid_until
                ]);
                if($success)
                {
                    return redirect()->back()->with('success', 'Promo Code has been added');
                }
            }
            catch(Exception $e)
            {
                // return redirect()->back()->with('msg', 'There is some error');
                return redirect()->back()->with('error', $e->getMessage());
            }

        }

    }
    public function promo_code()
    {
        return view('admin.addpromocode');
    }
    public function promo_code_edit($id)
    {
        $promocode=AdminPromoCode::find($id);
        return view('admin.edit-promo-code', compact('promocode'));
    }
    public function promo_code_delete($id)
    {
        try{

            AdminPromoCode::find($id)->delete();
        }
        catch(Exception $e)
        {
            // return redirect()->back()->with('msg', 'There is some error');
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect('admin/promo-code')->with('success', 'Promo Code has been deleted');
    }
    public function update_promo_code(PromoRequest $request)
    {
        // dd($request->all());
        $validated=$request->validated();
        if($request->deactivate=="on")
        {
            $status="false";
        }
        elseif($request->activate=="on")
        {
             $status="true";
        }
        else{
            $status=AdminPromoCode::find($request->id)->is_active;
        }
        if($validated)
        {
            try{

                AdminPromoCode::find($request->id)->update([
                    "promo_code"=>$request->promocode,
                    "actual_discount"=>$request->discount,
                    "discount_type"=>$request->discount_type,
                    "is_specific"=>$request->is_specific,
                    "product_category_id"=>$request->product_or_category,
                    "no_of_times"=>$request->no_of_times
                ]);
            }
            catch(Exception $e)
            {
                // return redirect()->back()->with('msg', 'There is some error');
                return redirect()->back()->with('error', $e->getMessage());
            }
            return redirect('admin/promo-code')->with('success', 'Promo Code has been udpated');

        }
    }
    public function ChangeStatus(Request $request)
    {
        AdminPromoCode::where('id',$request->id)->update([
            'status' => $request->status
        ]);
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }
}
