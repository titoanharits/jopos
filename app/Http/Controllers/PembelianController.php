<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail_Pembelian;
use App\Pembelian;
use App\Supplier;
use Cart;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Pembelian::orWhere('id_pembelian', 'like', '%' . substr(date("Ymd"), 2) . '%')
          ->orderBy('created_at', 'DESC')
          ->take(1)
          ->first();
      if (count((array)$id) == 0) {
          $pembelian = 1;
      } else {
          $pembelian = substr($id->id_pembelian, -4) + 1;
      }
      if (session()->has('id_supplier')) {
          $supplier = DB::table('suppliers')
              ->where('id', session('id_supplier'))
              ->first();
      } else {
          $supplier = Supplier::all();
      }
      $data = Cart::getContent();
      return view('pembelian', compact('id', 'pembelian', 'supplier', 'data'));
    }

    public function fetch($id)
    {
      $data = Supplier::where('id', $id)
      ->first();
      $output = '<table class="table sparkle-table">
      <tr>
      <td>Alamat</td>
      <td>' . $data->alamat . '</td>
      </tr>
      <tr>
      <td>Telepon Perusahaan</td>
      <td>' . $data->telepon . '</td>
      </tr>
      <tr>
      <td>Nama CP</td>
      <td>' . $data->nama_cp . '</td>
      </tr>
      <tr>
      <td>Telepon CP</td>
      <td>' . $data->telepon_cp . '</td>
      </tr>
      </table>';
      echo $output;
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
