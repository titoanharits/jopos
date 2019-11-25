<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $supplier = Supplier::all();
    return view('supplier', compact('supplier'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('create_supplier');
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
      'nama' => 'required|string|max:255',
      'alamat' => 'required|string|max:255',
      'email' => 'required|email|string|max:255',
      'telepon' => 'required|string|max:13',
      'fax' => 'required|string|max:11',
      'website' => 'required|string|max:255',
      'nama_cp' => 'required|string|max:255',
      'telepon_cp' => 'required|string|max:13'
    ]);

    Supplier::create([
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'email' => $request->email,
      'telepon' => $request->telepon,
      'fax' => $request->fax,
      'website' => $request->website,
      'nama_cp' => $request->nama_cp,
      'telepon_cp' => $request->telepon_cp,
    ]);
    return redirect()->route('supplier');
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
      $supplier = Supplier::find($id);
      return view('edit_supplier', compact('supplier'));
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
    $supplier = Supplier::find($id);

    $supplier -> update([
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'email' => $request->email,
      'telepon' => $request->telepon,
      'fax' => $request->fax,
      'website' => $request->website,
      'nama_cp' => $request->nama_cp,
      'telepon_cp' => $request->telepon_cp,
    ]);
    return redirect()->route('supplier');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $supplier = Supplier::find($id);
    $supplier->delete();
    return redirect('supplier');
  }
}
