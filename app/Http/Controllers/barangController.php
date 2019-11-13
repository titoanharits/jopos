<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use App\Supplier;


class barangController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $barang = Barang::with('Supplier','Kategori')->get();
    return view('barang', compact('barang'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {

    $id = Barang::orderBy('created_at', 'DESC')
        ->take(1)
        ->first();
    if (count((array)$id) == 0) {
        $barang = 1;
    } else {
        $barang = substr($id->id_barang, -4) + 1;
    }
    $supplier = Supplier::all();
    $kategori = Kategori::all();
    return view('create_barang', compact('id','supplier', 'kategori'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $request->validate([
      'id_barang' => 'required|unique:barangs|max:6',
      'nama_barang' => 'required|string|max:255',
      'id_supplier' => 'required|integer',
      'id_kategori' => 'required|integer',
      'harga_beli' => 'required|integer',
      'harga_jual' => 'required|integer',
      'satuan_satu' => 'required|string',

    ]);

 $laba=(($request->harga_jual - $request->harga_beli) / $request->harga_beli) * 100;
    Barang::create([
      'id_barang' => $request->id_barang,
      'nama_barang' => $request->nama_barang,
      'id_supplier' => $request->id_supplier,
      'id_kategori' => $request->id_kategori,
      'harga_beli' => $request->harga_beli,
      'harga_jual' => $request->harga_jual,
      'laba' => $laba,
      'stok' => 0,
      'satuan_satu' => $request->satuan_satu,
      'satuan_dua' => $request->satuan_dua,
      'stok_dua' => $request->stok_dua,
      'satuan_turunan_dua' => $request->satuan_turunan_dua,
      'satuan_tiga' => $request->satuan_tiga,
      'stok_tiga' => $request->stok_tiga,
      'satuan_turunan_tiga' => $request->satuan_turunan_tiga,
      'satuan_empat' => $request->satuan_empat,
      'stok_empat' => $request->stok_empat,
      'satuan_turunan_empat' => $request->satuan_turunan_empat,
    ]);

 return redirect('barang');

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
