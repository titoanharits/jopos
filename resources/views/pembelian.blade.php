@extends('layouts.main')
@section('title','Pembelian')

@section('content')
<form method="post" action="{{route('storepembelian')}}">
  <div class="static-table-area mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="sparkline8-list shadow-reset">
            <div class="sparkline8-hd">
              <div class="main-sparkline8-hd">
                <h1>Faktur Pembelian</h1>
              </div>
            </div>
            <div class="sparkline8-graph">
              <div class="static-table-list">
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-3">
                      <label class="login2 pull-right pull-right-pro">No Entry</label>
                    </div>
                    <div class="col-lg-9">
                      <input id="id_pembelian" type="text" class="form-control"
                      name="id_pembelian"
                      placeholder="No Faktur"
                      value="{{substr(date("Ymd"), 2)}}POS000{{$id}}"/>
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
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-3">
                      <label class="login2 pull-right pull-right-pro">No Bukti</label>
                    </div>
                    <div class="col-lg-9">
                      <input id="no_bukti"
                      type="text" class="form-control" name="no_bukti"
                      placeholder="No Bukti"
                      required/>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-3">
                      <label class="login2 pull-right pull-right-pro">Jenis Bayar</label>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-select-list">
                        <select id="jenis_transaksi"
                        class="form-control custom-select-value"
                        name="jenis_transaksi" onchange="pilihBayar();">
                        <option value="Tunai">Tunai</option>

                      </select>
                    </div>
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
                  <h1>Supplier</h1>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-4">
                  <select id="supplier" class="form-control" name="id_supplier"
                  onchange="pilihSupplier()">
                  @if(count((array)$supplier) > 1)
                  <option value="{{$supplier->id}}">{{$supplier->nama}}</option>
                  @else
                  <option></option>
                  @foreach($supplier as $item)
                  <option value="{{$item->id}}">{{$item->nama}}</option>
                  @endforeach
                  @endif
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
                  <td>Telepon Perusahaan</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nama CP</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Telepon CP</td>
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
              <h1>Tabel <span class="table-project-n">Pembelian</span></h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">
              <div class="row">
                <div class="col-lg-1">
                  <a href="#" class="btn btn-sm btn-primary login-submit-cs" id="myHref"
                  onclick="onClick();">
                  Tambah
                </a>
              </div>
              <div class="col-lg-4"></div>
              <div class="col-lg-6">

              </div>
            </div>
            <table id="table" data-toggle="table" data-pagination="true"
            data-toolbar="#toolbar" class="table table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th></th>
                <th></th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              $totalBayar = 0;
              ?>
              @foreach($data as $item)
              <?php
              $totalBayar += $item->attributes['total'];
              $no++?>
              <tr>
                <td>{{$no}}</td>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>Rp. {{number_format($item->price,0,".",".")}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->attributes['satuan']}}</td>
                <td></td>
                <td>
                  </td>
                  <td>
                    Rp. {{number_format(($item->attributes['total']),0,".",".")}}
                  </td>
                  <?php

                  ?>
                </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    Biaya Kirim
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group">
                          <input onkeyup="biayaKirim()"
                          type="number" id="biaya_kirim"
                          class="form-control kirim" name="biaya_kirim"
                          placeholder="Biaya Kirim"/>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Total
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group">
                          <input type="number" id="total"
                          class="form-control kirim" name="total"
                          placeholder="Total"
                          value="<?=$totalBayar?>"/>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    Diskon (%)
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group">
                          <input onkeyup="diskonSatu()"
                          type="number" id="diskon_satu"
                          class="form-control uang" name="diskon_satu"
                          placeholder="Diskon (%)"
                          required/>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Diskon (Rp.)
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-lg-8">
                        <input id="diskon_dua" type="number" class="form-control"
                        placeholder="Diskon (Rp)" name="diskon_dua">
                      </div>
                      <div class="col-lg-4">
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    Netto
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-lg-8">
                        <input id="netto" type="number" name="neto" class="form-control"
                        placeholder="Netto">
                      </div>
                      <div class="col-lg-4">
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="row">
              <div class="col-lg-10">

              </div>
              <div class="col-lg-2" style="margin-top: 10px;">
                <a href="/pembelian/clear" class="btn btn-sm btn-danger login-submit-cs">
                  Cancel
                </a>
                {{--<button type="submit"--}}
                {{--class="btn btn-sm btn-primary login-submit-cs">--}}
                {{--Masukkan--}}
                {{--</button>--}}
                <input type="submit" onclick="cekSupplier()" name="submit" value="Masukkan"
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
    xmlhttp.open("GET", "/pembelian/fetch/" + value, false);
    xmlhttp.send(null);
    document.getElementById("detail_sup").innerHTML = xmlhttp.responseText;
  } else {
    alert('Supplier Kosong')
  }
}

function onClick() {
  var value = document.getElementById("supplier").value;
  if (value != "") {
    window.location.href = "/pembelian/create/" + value;
  } else {
    alert('Supplier Kosong');
  }
}


function biayaKirim() {
  var kirim = +document.getElementById("biaya_kirim").value;
  var total = +'<?=$totalBayar?>';
  var totall = document.getElementById("total").value = parseInt(total + kirim);
}

function diskonSatu() {
  var diskon_satu = +document.getElementById("diskon_satu").value;
  var kirim = +document.getElementById("biaya_kirim").value;
  var total = +'<?=$totalBayar?>' + kirim;
  var diskon_dua = document.getElementById("diskon_dua").value = parseFloat((total / 100) * diskon_satu);
  var netto = document.getElementById("netto").value = parseFloat(total - diskon_dua);

}

function uangMuka() {
  var uang = +document.getElementById("uang").value;
  var netto = +document.getElementById("netto").value;
  document.getElementById("sisa").value = parseFloat(netto - uang);
}

function cekSupplier() {
  var value = document.getElementById("supplier").value;
  if (value == "") {
    alert("Supplier Kosong");
    window.location.href = "/pembelian";
  }
}

function jatuhTempo() {
  var date = new Date();
  var jumlah = +document.getElementById("jumlahJatuh").value;
  date.setDate(date.getDate() + jumlah);
  var finalDate = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
  document.getElementById("tanggalJatuh").value = finalDate;
}
</script>

@endsection
