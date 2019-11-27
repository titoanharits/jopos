<?php

namespace App\Http\Controllers;

use App\Detail_Penjualan;
use App\Penjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::with('customer')
            ->orderBy('penjualans.created_at','DESC')
            ->get();
        return view('detail_penjualan', compact('penjualan'));
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
     * @param  \App\Detail_Penjualan  $detail_Penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_Penjualan $detail_Penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail_Penjualan  $detail_Penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_Penjualan $detail_Penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail_Penjualan  $detail_Penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_Penjualan $detail_Penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_Penjualan  $detail_Penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_Penjualan $detail_Penjualan)
    {
        //
    }
}
