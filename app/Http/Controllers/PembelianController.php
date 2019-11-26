<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPembelian;
use App\Pembelian;
use App\Supplier;
use App\Barang;
use Cart;
use Session;

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
        $pembelian = substr($id->id_pembelian, -4) .+ 1;
    }
    if (session()->has('id_supplier')) {
      $supplier = Supplier::where('id', session('id_supplier'))
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
  public function create($id)
  {
    $barang = Barang::where('id_supplier', $id)->get();
    return view('create_pembelian', compact('barang', 'id'));
  }

  public function barang($id)
  {
    $data = Barang::where('id_barang', $id)
    ->first();
    $harga = $data->harga_beli;
    $output = '<div class="form-group">
    <div class="row">
    <div class="col-lg-3">
    <label class="login2 pull-right pull-right-pro">Harga Beli</label>
    </div>
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="input-group">
    <span class="input-group-addon">Rp.</span>
    <input type="number" id="harga" class="form-control diskon" name="harga_beli"
    placeholder="Harga Beli"
    value="' . $harga . '" required/>
    </div>
    </div>
    </div>
    </div>
    <div class="form-group">
    <div class="row">
    <div class="col-lg-3">
    <label class="login2 pull-right pull-right-pro">Satuan</label>
    </div>
    <div class="col-lg-9">
    <select id="satuan" class="form-control custom-select-value"
    name="satuan">
    <option>' . $data->satuan_satu . '</option>
    <option>' . $data->satuan_dua . '</option>
    <option>' . $data->satuan_tiga . '</option>
    <option>' . $data->satuan_empat . '</option>
    </select>
    <input type="hidden" id="satuan_satu" value="'.$data->satuan_satu.'">
    <input type="hidden" id="satuan_dua" value="'.$data->satuan_dua.'">
    <input type="hidden" id="satuan_tiga" value="'.$data->satuan_tiga.'">
    <input type="hidden" id="satuan_empat" value="'.$data->satuan_empat.'">
    <input type="hidden" id="stok_dua" value="'.$data->stok_dua.'">
    <input type="hidden" id="stok_tiga" value="'.$data->stok_tiga.'">
    <input type="hidden" id="stok_empat" value="'.$data->stok_empat.'">
    <input type="hidden" id="satuan_turunan_dua" value="'.$data->satuan_turunan_dua.'">
    <input type="hidden" id="satuan_turunan_tiga" value="'.$data->satuan_turunan_tiga.'">
    <input type="hidden" id="satuan_turunan_empat" value="'.$data->satuan_turunan_empat.'">
    </div>
    </div>
    </div>';
    echo $output;
  }

  public function tambahBarang(Request $request)
  {
    $barang = Barang::where('id_barang', $request->id_barang)
    ->first();
    $satuan_satu = $barang->satuan_satu;
    $satuan_dua = $barang->satuan_dua;
    $satuan_tiga = $barang->satuan_tiga;
    $satuan_empat = $barang->satuan_empat;
    $satuan_terakhir_dua = $barang->satuan_turunan_dua;
    $satuan_terakhir_tiga = $barang->satuan_turunan_tiga;
    $satuan_terakhir_empat = $barang->satuan_turunan_empat;
    $stok_dua = $barang->stok_dua;
    $stok_tiga = $barang->stok_tiga;
    $stok_empat = $barang->stok_empat;
    $diskon = $request->diskon_satu / 100 * $request->harga_beli;
    if ($request->satuan == $satuan_satu) {
      $stokbaru = $request->jumlah;
      $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
    } else if ($request->satuan == $satuan_dua) {
      $stokbaru = $request->jumlah * $stok_dua;
      $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
    } else if ($request->satuan == $satuan_tiga) {
      if ($satuan_terakhir_tiga == $satuan_satu) {
        $stokbaru = $request->jumlah * $stok_tiga;
        $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
      } else {
        $stokbaru = $request->jumlah * $stok_dua * $stok_tiga;
        $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
      }
    } else if ($request->satuan == $satuan_empat) {
      if ($satuan_terakhir_empat == $satuan_satu) {
        $stokbaru = $request->jumlah * $stok_empat;
        $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
      } else if ($satuan_terakhir_empat == $satuan_dua) {
        $stokbaru = $request->jumlah * $stok_dua * $stok_empat;
        $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
      } else if ($satuan_terakhir_tiga == $satuan_satu) {
        $stokbaru = $request->jumlah * $stok_tiga * $stok_empat;
        $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
      } else {
        $stokbaru = $request->jumlah * $stok_dua * $stok_tiga * $stok_empat;
        $total = ($request->harga_beli * $stokbaru) - ($diskon + $request->diskon_dua);
      }
    }
    Session::put('id_supplier', $request->id_supplier);
    $add = Cart::add([
      'id' => $request->id_barang,
      'price' => $request->harga_beli,
      'name' => $barang->nama_barang,
      'quantity' => $stokbaru,
      'attributes' => [
        'satuan' => $satuan_satu,
        // 'diskon_satu' => $request->diskon_satu,
        // 'diskon_dua' => $request->diskon_dua,
        'total' => $total
      ]
    ]);
    if ($add) {
      return redirect('pembelian');
    }
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $pembelian = Pembelian::create([
      'id_pembelian' => $request->id_pembelian,
      'id_supplier' => $request->id_supplier,
      'no_bukti' => $request->no_bukti,
      'tanggal' => $request->tanggal,
      'biaya_kirim' => $request->biaya_kirim,
      'diskon_satu' => $request->diskon_satu,
      'diskon_dua' => $request->diskon_dua,
      'jenis_transaksi' => $request->jenis_transaksi,
      'neto' => $request->neto,
      'uang_muka' => $request->uang_muka,
      'sisa_piutang' => $request->sisa_piutang,
      'total' => $request->total,
    ]);

    $idpembelian = Pembelian::where('id_supplier', $request->id_supplier)
    ->orderBy('created_at', 'DESC')
    ->take(1)
    ->first();

    $data = Cart::getContent();
    foreach ($data as $item) {
      $stok = Barang::where("id_barang", $item->id)
      ->first();

      $laba = (($stok->harga_jual - $item->price) / $item->price) * 100;

      $barang = Barang::where('id_barang', $item->id)
      ->update([
        'laba' => $laba,
        'stok' => $stok->stok + $item->quantity,
        'harga_beli' => $item->price
      ]);

      $detail = DetailPembelian::create([
        'id_pembelian' => $idpembelian->id_pembelian,
        'id_barang' => $item->id,
        'jumlah' => $item->quantity,
        'satuan' => $item->attributes['satuan'],
        // 'diskon_satu' => $item->attributes['diskon_satu'],
        // 'diskon_dua' => $item->attributes['diskon_dua'],
        'total_harga' => $item->attributes['total'],
        'saldo' => $item->quantity + $stok->stok,
      ]);

    }
    Cart::clear();
    Session::flush();
    return redirect('detail_pembelian');
  }

  public function clear()
  {
      Cart::clear();
      Session::flush();
      return redirect('pembelian');
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

  public function detail_barang($id)
  {
    $pembelians = DetailPembelian::with('Barang')
    ->where('id_pembelian', $id)
    ->get();
    $pembelian = DetailPembelian::with('Supplier','Pembelian')
    ->where('id_pembelian', $id)
    ->first();
    return view('detail_pembelian_barang', compact('pembelians', 'pembelian'));
  }


}
