@extends('layouts.main')
@section('title','POS')
@section('fitur','Penjualan')
@section('content')
<form method="post" action="{{route('storepenjualan')}}">
  <div class="static-table-area mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="sparkline8-list shadow-reset">
            <div class="sparkline8-hd">
              <div class="main-sparkline8-hd">
                <h1>Kasir JOPOS</h1>
              </div>
            </div>
            <div class="sparkline8-graph">
              <div class="static-table-list">
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-3">
                      <label class="login2 pull-right pull-right-pro">No Faktur</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="id_penjualan"
                      placeholder="No Faktur"/>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-3">
                      <label class="login2 pull-right pull-right-pro">Tanggal</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="date" class="form-control" name="tanggal"
                      data-date-format="yyyy-MM-dd" value="<?php echo date("Y-m-d");?>"
                      required/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sparkline9-list sparkel-pro-mg-t-30 shadow-reset">
            <div class="sparkline9-hd">
              <div class="main-sparkline9-hd">
                <div class="row">
                  <div class="col-lg-4">
                    <h1>Customer</h1>
                  </div>
                  <div class="col-lg-3"></div>
                  <div class="col-lg-4">
                    <select id="supplier" class="form-control" name="id_customer"
                    onchange="pilihSupplier()">
                    <option></option>
                    @foreach($customer as $item)
                    <option value="{{$item->id_customer}}">{{$item->nama}}</option>
                    @endforeach
                  </select>
                  {{csrf_field()}}
                </div>
              </div>
              <div class="sparkline9-outline-icon">
              </div>
            </div>
          </div>
          <div class="sparkline9-graph">
            <div class="static-table-list">
              <div id="detail_sup">
                <table class="table sparkle-table">
                  <tr>
                    <td>Alamat</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="sparkline13-list shadow-reset">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
              <h1>Tabel <span class="table-project-n">Barang</span></h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">
              <div class="row">
                <div class="col-lg-1">
                  <a href="{{route('createpenjualan')}}" class="btn btn-sm btn-primary login-submit-cs">
                    Tambah
                  </a>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                </div>
              </div>
              <br>
              <table id="table" data-toggle="table" data-pagination="true"
              data-toolbar="#toolbar" class="table table-bordered dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Beli</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                $totalBayar = 0;
                ?>
                @foreach($data as $item)
                <?php
                $total = $item->price * $item->quantity;
                $totalBayar += $total;
                $no++?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>Rp. {{number_format($item->price,0,".",".")}}</td>
                  <td>{{$item->quantity}}</td>
                  <td>
                    Rp. {{number_format(($item->price)*$item->quantity,0,".",".")}}
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total</td>
                  <td>
                    <input type="number" value="<?=$totalBayar?>" name="total" class="form-control">
                  </td>
                </tr>
                @endforeach
                <tr>
                </tbody>
              </table>
              <div class="row">
                <div class="col-lg-10">

                </div>
                <div class="col-lg-2" style="margin-top: 10px;">
                  <a href="penjualan/clear" class="btn btn-sm btn-danger login-submit-cs">
                    Cancel
                  </a>
                  <input type="submit" name="submit" value="Masukkan"
                  class="btn btn-sm btn-primary login-submit-cs">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">
function pilihSupplier() {
  var xmlhttp = new XMLHttpRequest();
  var value = document.getElementById("supplier").value;
  if (value != "") {
    xmlhttp.open("GET", "penjualan/fetch/" + value, false);
    xmlhttp.send(null);
    document.getElementById("detail_sup").innerHTML = xmlhttp.responseText;
  } else {
    alert('Customer Kosong')
  }
}
</script>
@endsection
