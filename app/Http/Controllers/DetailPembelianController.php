<?php

namespace App\Http\Controllers;

use App\Detail_Pembelian;
use App\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class DetailPembelianController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function index()
  {
    $pembelian = Pembelian::with('Supplier')
    ->orderBy('created_at', 'DESC')
    ->get();
    return view('detail_pembelian', compact('pembelian'));
  }

  public function pdf($id)
  {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->
    convert_barang($id));
    return $pdf->stream();
  }


  public function destroy(Detail_Pembelian $detail_Pembelian)
  {
    //
  }
}
