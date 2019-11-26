@extends('layout.app')
@section('title','POS')
@section('fitur','Detail Pembelian')
@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Pembelian</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Faktur</th>
                                        <th>Tanggal</th>
                                        <th>No Bukti</th>
                                        <th>Supplier</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Neto</th>
                                        <th>Uang Muka</th>
                                        <th>Sisa Piutang</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0?>
                                    @foreach($pembelian as $item)
                                        <?php
                                        $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id_pembelian}}</td>
                                            <td>{{$item->tanggal}}</td>
                                            <td>{{$item->no_bukti}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->jenis_transaksi}}</td>
                                            <td>{{$item->jatuh_tempo}}</td>
                                            <td>{{$item->neto}}</td>
                                            <td>{{$item->uang_muka}}</td>
                                            <td>{{$item->sisa_piutang}}</td>
                                            <td>
                                                @if($item->jenis_transaksi == "Kredit" && $item->sisa_piutang > 0)
                                                    <form action="/detail_pembelian/hutang/{{$item->id_pembelian}}"
                                                          method="get"
                                                          style="display: inline">
                                                        <button class="btn btn-primary" style="width: 37px;">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="/detail_pembelian/retur/{{$item->id_pembelian}}" method="Get"
                                                      style="display: inline">
                                                    <button class="btn btn-danger">
                                                        <i class="fa big-icon fa-archive"></i>
                                                    </button>
                                                </form>
                                                <form action="/pembelian/detail/{{$item->id_pembelian}}" method="Get"
                                                      style="display: inline">
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
