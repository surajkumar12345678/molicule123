<?php

namespace App\Http\Controllers;

use App\Models\StoreDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class MerchentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchents=User::where('role', 'merchent')->get();
        return view('admin.merchent', compact('merchents'));
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
        //
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
        $merchent=User::find($id);
        if ($merchent->is_varified=='0') {
            $merchent->is_varified=1;
            $merchent->save();
            return back()->withConfirm('Merchent has been activated');
        } else {
            $merchent->is_varified=0;
            $merchent->save();
            return back()->withConfirm('Merchent has been inactivated');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($merchent)
    {
        $deleted=User::destroy($merchent);
        if($deleted)
        {
            return back()->withConfirm('Merchent has been deleted');
        }
    }
}
