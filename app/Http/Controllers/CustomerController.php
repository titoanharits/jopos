<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class customerController extends Controller
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
    $customer = Customer::all();
    return view('customer', compact('customer'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('create_customer');
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
      'keterangan' => 'required|string|max:255'
    ]);

    Customer::create([
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'email' => $request->email,
      'telepon' => $request->telepon,
      'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('customer');
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
    $customer=Customer::all()->where('id_customer', $id)->first();
    return view('edit_customer', compact('customer'));
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

    $customer=Customer::find($id);

    $customer->Update([
      'nama' => $request->nama,
      'email' => $request->email,
      'alamat' => $request->alamat,
      'telepon' => $request->telepon,
      'keterangan' => $request->keterangan
    ]);
    return redirect()->route('customer');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $customer = Customer::where('id_customer', $id);
    $customer->delete();
    return redirect()->route('customer');

  }
}
