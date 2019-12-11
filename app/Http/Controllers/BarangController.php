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

  public function __construct()
  {
    $this->middleware('auth');
  }

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
    ->first();
    if (count((array)$id) == 0) {
      $barang = 1;

    } else {
      $barang = substr($id->id_barang, -4) + 1;

    }

    $supplier = Supplier::all();
    $kategori = Kategori::all();
    return view('create_barang', compact('barang','supplier', 'kategori'));
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
      'satuan_terakhir' => $request->satuan_satu,
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

    return redirect()->route('barang');

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
    $supplier = Supplier::all();
    $kategori = Kategori::all();
    $barang = Barang::with('Supplier','Kategori')->
    where('id_barang', $id)->first();
    $stok = $barang->stok;
    return view('edit_barang', compact('supplier','kategori','barang','kategori','stok'));
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
    $laba = (($request->harga_jual - $request->harga_beli) / $request->harga_beli) * 100;
    $stokbaru = $request->stok;
    if ($request->satuan_terakhir == $request->satuan_satu) {
        $stokbaru = $request->stok;
    } else if ($request->satuan_terakhir == $request->satuan_dua) {
        $stokbaru = $request->stok * $request->stok_dua;
    } else if ($request->satuan_terakhir == $request->satuan_tiga) {
        if ($request->satuan_turunan_tiga == $request->satuan_satu) {
            $stokbaru = $request->stok * $request->stok_tiga;
        } else {
            $stokbaru = $request->stok * $request->stok_dua * $request->stok_tiga;
        }
    } else if ($request->satuan_terakhir == $request->satuan_empat) {
        if ($request->satuan_turunan_empat == $request->satuan_satu) {
            $stokbaru = $request->stok * $request->stok_empat;
        } else if ($request->satuan_turunan_empat == $request->satuan_dua) {
            $stokbaru = $request->stok * $request->stok_dua * $request->stok_empat;
        } else if ($request->satuan_turunan_tiga == $request->satuan_satu) {
            $stokbaru = $request->stok * $request->stok_tiga * $request->stok_empat;
        } else {
            $stokbaru = $request->stok * $request->stok_dua * $request->stok_tiga * $request->stok_empat;
        }

    }
    $barang = Barang::where('id_barang', $id)
    ->update([
      'nama_barang' => $request->nama_barang,
      'id_kategori' => $request->id_kategori,
      'id_supplier' => $request->id_supplier,
      'harga_beli' => $request->harga_beli,
      'harga_jual' => $request->harga_jual,
      'laba' => $laba,
      'stok' => $stokbaru,
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
      'satuan_terakhir' => $request ->satuan_satu,
    ]);

    return redirect()->route('barang');

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
