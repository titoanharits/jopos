@extends('layouts.main')
@section('title','POS')
@section('fitur','Detail Penjualan')
@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Penjualan</span></h1>
                            </div>
                        </div>
                        <table id="table" data-toggle="table" data-toolbar="#toolbar"
                        class="table table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0;
                            $total = 0;?>
                            @foreach($penjualan as $item)
                                <?php
                                $total += $item->total_harga;
                                $no++;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$item->id_barang}}</td>
                                    <td>{{$item->Barang->nama_barang}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>Rp. {{number_format($item->total_harga,0,".",".")}}</td>
                                </tr>
                            @endforeach
                            <tr>


                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total :</b></td>
                                <td>Rp. {{number_format($total,0,".",".")}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-11">

                            </div>
                            <div class="col-lg-1" style="margin-top: 10px;">
                                <a href="#"
                                   class="btn btn-sm btn-primary login-submit-cs">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
