<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MdDistrictprices;

class CNPosController extends Controller
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
        // return view('pos.create', compact('statuses', 'roles', 'multipleRole', 'timezones', 'branches'));
        return view('pos.create');
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

    public function getprice(Request $request)
    {
        $user = auth()->user();
        $price = 0;

        $data = MdDistrictprices::where([
            'branch_code' => $user->user_branch_code,
            'district_dest_code' => $request->cn_destcity,
            'service_code' => $request->cn_service,
            'goods_type_code' => $request->cn_goods_type,
            'weight' => 1,
        ])->first();
        
        if (!$data) {
            $price = 0;
        }
        else if ($request->cn_weight > 1) {
            $price = $data['price'] * (int) $request->cn_weight;
        }else{
            $price = $data['price'];
        }

        echo json_encode($price);
    }
}
