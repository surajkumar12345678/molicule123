<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreDetail;
use App\Models\ShippingInfo;
use Illuminate\Support\Facades\Auth;

class MerchantShipping_InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $index = $request->index;
        if($request->is_freeshipping == "on")
        {
            $is_freeshipping = 1;
        }
        else
        {
            $is_freeshipping = 0;
        }
        $store_detail_id = StoreDetail::select('id')
                                    ->where('user_id', Auth::id())
                                    ->get()->first();
        $data = ShippingInfo::create([
            'country' => $request->input("country"),
            'state' => $request->input("state"),
            'location' => $request->input("location"),
            'rate' => $request->input("rate"),
            'maximum_weight' => $request->input("max_weight"),
            'is_freeshipping' => $is_freeshipping,
            'weight' => $request->input("weight"),
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id->id
        ]);

        for($i=1; $i<$index; $i++)
        {
            $data = ShippingInfo::create([
                'country' => $request->input("country$i"),
                'state' => $request->input("state$i"),
                'location' => $request->input("location$i"),
                'rate' => $request->input("rate$i"),
                'maximum_weight' => $request->input("max_weight$i"),
                'is_freeshipping' => $is_freeshipping,
                'weight' => $request->input("weight"),
                'user_id' => Auth::id(),
                'store_detail_id' => $store_detail_id->id
            ]);
        }
        if($data)
        {
            return redirect("/accepting_payments");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
