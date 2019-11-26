@extends('layouts.main')
@section('title','Cart Pembelian')

@section('content')
<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="sparkline12-list shadow-reset mg-t-30">
          <div class="sparkline12-hd">
            <div class="main-sparkline12-hd">
              <h1>Tambah Barang</h1>
            </div>
          </div>
          <div class="sparkline12-graph">
            <div class="basic-login-form-ad">
              <div class="row">
                <div class="col-lg-12">
                  <div class="all-form">
                    <form method="POST" action="{{route('tambahbarang')}}">
                      <input type="hidden" name="id_supplier" value="{{$id}}">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Nama
                              Barang</label>
                            </div>
                            <div class="col-lg-9">
                              <div class="form-select-list">
                                <select id="barang"
                                class="form-control custom-select-value"
                                name="id_barang" onchange="pilihBarang();">
                                @foreach($barang as $item)
                                <option></option>
                                <option value="{{$item->id_barang}}">{{$item->nama_barang}}</option>
                                @endforeach
                              </select>
                              @if($errors->has('id_barang'))
                              <p>{{$errors->first('id_barang')}}</p>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="detail_barang">

                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Harga
                                Beli</label>
                              </div>
                              <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp.</span>
                                  <input type="number" class="form-control diskon"
                                  id="harga" name="harga_beli"
                                  placeholder="Harga Beli"
                                  value="{{old('alamat')}}"
                                  required/>
                                  @if($errors->has('alamat'))
                                  <p>{{$errors->first('alamat')}}</p>
                                  @endif
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
                                <select class="form-control custom-select-value"
                                name="satuan">
                                <option></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Jumlah</label>
                          </div>
                          <div class="col-lg-9">
                            <input onkeyup="subTotal()" id="jumlah" type="number"
                            class="form-control" name="jumlah"
                            placeholder="Jumlah"/>
                          </div>
                        </div>
                      </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Sub
                                Total(Rp.)</label>
                              </div>
                              <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp.</span>
                                  <input type="number" id="total"
                                  class="form-control"
                                  name="sub_total"
                                  placeholder="Sub Total (Rp.)"
                                  disabled/>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="login-btn-inner">
                              <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                  <div class="login-horizental cancel-wp pull-left">
                                    <button class="btn btn-sm btn-primary login-submit-cs"
                                    type="submit">Tambah
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{csrf_field()}}
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  function subTotal() {
    var jumlah = +document.getElementById("jumlah").value;
    var satuan_satu = document.getElementById("satuan_satu").value;
    var satuan_dua = document.getElementById("satuan_dua").value;
    var satuan_tiga = document.getElementById("satuan_tiga").value;
    var satuan_empat = document.getElementById("satuan_empat").value;
    var stok_dua = +document.getElementById("stok_dua").value;
    var stok_tiga = +document.getElementById("stok_tiga").value;
    var stok_empat = +document.getElementById("stok_empat").value;
    var satuan_turunan_dua = document.getElementById("satuan_turunan_dua").value;
    var satuan_turunan_tiga = document.getElementById("satuan_turunan_tiga").value;
    var satuan_turunan_empat = document.getElementById("satuan_turunan_empat").value;
    var satuan = document.getElementById("satuan").value;
    var total = document.getElementById("total");
    var harga = +document.getElementById("harga").value;
    if (satuan == satuan_satu) {
      total.value = parseFloat(jumlah * harga);
    } else if (satuan == satuan_dua) {
      total.value = parseFloat(jumlah * stok_dua * harga);
    } else if (satuan == satuan_tiga) {
      if (satuan_turunan_tiga == satuan_satu) {
        total.value = parseFloat(jumlah * stok_tiga * harga);
      } else {
        total.value = parseFloat(jumlah * stok_tiga * stok_dua * harga);
      }
    } else if (satuan == satuan_empat) {
      if (satuan_turunan_empat == satuan_satu) {
        total.value = parseFloat(jumlah * stok_empat * harga);
      } else if (satuan_turunan_empat == satuan_dua) {
        total.value = parseFloat(jumlah * stok_dua * stok_empat * harga);
      } else if (satuan_turunan_tiga == satuan_satu) {
        total.value = parseFloat(jumlah * stok_tiga * stok_empat * harga);
      } else {
        total.value = parseFloat(jumlah * stok_dua * stok_tiga * stok_empat * harga);
      }
    } else {
      alert("satuan Kosong");
    }
  }

  function pilihBarang() {
    var xmlhttp = new XMLHttpRequest();
    var value = document.getElementById("barang").value;
    if (value != "") {
      xmlhttp.open("GET", "/pembelian/barang/" + value, false);
      xmlhttp.send(null);
      document.getElementById("detail_barang").innerHTML = xmlhttp.responseText;
    } else {
      alert('Supplier Kosong')
    }
  }

  function diskonSatu() {
    var diskon_satu = document.getElementById("diskon_satu").value;
    var total = document.getElementById("total").value;
    total.value = parseFloat((diskon_satu / 100) * total);
  }

  function diskonDua() {
    var total = document.getElementById("total").value;
    var diskon_dua = document.getElementById("diskon_dua").value;
    total.value = parseFloat((diskon_dua / 100).value);
  }

  </script>
  @endsection
