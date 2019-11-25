@extends('layouts.main')
@section('title','POS')
@section('fitur','Customer')
@section('content')
<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">



        <h1>Edit Customer</h1>



        <div class="basic-login-form-ad">
          <div class="row">
            <div class="col-lg-12">
              <div class="all-form-element">
                <form action="{{route('updatebarang', ['id' => $barang ])}}" method="POST">
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-2">
                        <label class="login2 pull-right pull-right-pro">Kode
                          Barang </label>
                        </div>
                        <div class="col-lg-4">
                          <label class="login2 pull-right pull-right-pro">Nama
                            Barang</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3">
                            <input type="number" class="form-control" name="id_barang"
                            placeholder="Kode Barang"
                            value="{{$barang->id_barang}}"/>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" name="nama_barang"
                            placeholder="Nama Barang"
                            value="{{$barang->nama_barang}}"/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-2">
                            <label class="login2 pull-right pull-right-pro">Nama
                              Supplier</label>
                            </div>
                            <div class="col-lg-9">
                              <div class="form-select-list">
                                <select class="form-control custom-select-value"
                                name="id_supplier">
                                <!-- <option value="{{$barang->id_supplier}}">{{$barang->nama}}</option> -->
                                @foreach($supplier as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-2">
                            <label class="login2 pull-right pull-right-pro">Kategori</label>
                          </div>
                          <div class="col-lg-9">
                            <div class="form-select-list">
                              <select class="form-control custom-select-value"
                              name="id_kategori">
                              @foreach($kategori as $item)
                              <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                              @endforeach
                              @if($errors->has('id_kategori'))
                              <p>{{$errors->first('id_kategori')}}</p>
                              @endif
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group-inner">
                      <div class="row">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                          <label class="login2 pull-right pull-right-pro">Harga Beli
                            (Rp.)</label>
                          </div>
                          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Harga Jual
                              (Rp.)</label>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                              <label class="login2 pull-right pull-right-pro">Laba
                                (%)</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp.</span>
                                  <input type="number" id="beli" placeholder="Harga Beli"
                                  class="form-control harga" name="harga_beli"
                                  value="{{$barang->harga_beli}}">
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon">Rp.</span>
                                  <input type="number" id="jual" placeholder="Harga Jual"
                                  class="form-control harga" name="harga_jual"
                                  value="{{$barang->harga_jual}}">
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                  <input type="number" id="laba" name="laba"
                                  placeholder="0"
                                  class="form-control" disabled
                                  value="{{$barang->laba}}">
                                  <span class="input-group-addon">%</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group-inner">
                            <div class="row">
                              <div class="col-lg-2">
                                <label class="login2 pull-right pull-right-pro">Satuan
                                  1</label>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-select-list">
                                    <select id="ddSatuan_satu"
                                    class="form-control custom-select-value"
                                    name="satuan_satu"
                                    onchange="satuanDua();">
                                    <option>{{$barang->satuan_satu}}</option>
                                    <option value="PCS">PCS</option>
                                    <option value="Gr">Gr</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group-inner">
                            <div class="row">
                              <div class="col-lg-2">
                                <label class="login2 pull-right pull-right-pro">Satuan
                                  2</label>
                                </div>
                                <div class="col-lg-2">
                                  <div class="input-group">
                                    <input id="txtSatuan_dua" type="text"
                                    onkeyup="satuanTiga();"
                                    placeholder="Satuan"
                                    class="form-control satuandua" name="satuan_dua"
                                    value="{{$barang->satuan_dua}}">
                                  </div>
                                </div>
                                <div class="col-lg-1">
                                  <h1>=</h1>
                                </div>
                                <div class="col-lg-1">
                                  <div class="input-group">
                                    <input type="text" id="beli" placeholder="Stok"
                                    class="form-control harga" name="stok_dua"
                                    value="{{$barang->stok_dua}}">
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-select-list">
                                    <select id="ddSatuan_dua"
                                    class="form-control custom-select-value"
                                    name="satuan_turunan_dua">
                                    <option>{{$barang->satuan_turunan_dua}}</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group-inner">
                            <div class="row">
                              <div class="col-lg-2">
                                <label class="login2 pull-right pull-right-pro">Satuan
                                  3</label>
                                </div>
                                <div class="col-lg-2">
                                  <div class="input-group">
                                    <input id="txtSatuan_tiga" type="text"
                                    onkeyup="satuanEmpat();" placeholder="Satuan"
                                    class="form-control harga" name="satuan_tiga"
                                    value="{{$barang->satuan_tiga}}">
                                  </div>
                                </div>
                                <div class="col-lg-1">
                                  <h1>=</h1>
                                </div>
                                <div class="col-lg-1">
                                  <div class="input-group">
                                    <input type="text" id="beli" placeholder="Stok"
                                    class="form-control harga" name="stok_tiga"
                                    value="{{$barang->stok_tiga}}">
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-select-list">
                                    <select id="ddSatuan_tiga"
                                    class="form-control custom-select-value"
                                    name="satuan_turunan_tiga">
                                    <option>{{$barang->satuan_turunan_tiga}}</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group-inner">
                            <div class="row">
                              <div class="col-lg-2">
                                <label class="login2 pull-right pull-right-pro">Satuan
                                  4</label>
                                </div>
                                <div class="col-lg-2">
                                  <div class="input-group">
                                    <input id="txtSatuan_empat" type="text"
                                    onkeyup="satuansatuan()" placeholder="Satuan"
                                    class="form-control harga" name="satuan_empat"
                                    value="{{$barang->satuan_empat}}">
                                  </div>
                                </div>
                                <div class="col-lg-1">
                                  <h1>=</h1>
                                </div>
                                <div class="col-lg-1">
                                  <div class="input-group">
                                    <input type="text" id="beli" placeholder="Stok"
                                    class="form-control harga" name="stok_empat"
                                    value="{{$barang->stok_empat}}">
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-select-list">
                                    <select id="ddSatuan_empat"
                                    class="form-control custom-select-value"
                                    name="satuan_turunan_empat">
                                    <option>{{$barang->satuan_turunan_empat}}</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group-inner">
                            <div class="row">
                              <div class="col-lg-2">
                                <label class="login2 pull-right pull-right-pro">Stok</label>
                              </div>
                              <div class="col-lg-2">
                                <input type="number" class="form-control" placeholder="Stok"
                                name="stok" value="{{$barang->stok}}"/>
                              </div>
                              <div class="col-lg-2">
                                <select id="ddStok"
                                class="form-control custom-select-value"
                                name="satuan_terakhir">
                                <option>{{$barang->satuan_terakhir}}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-inner">
                          <div class="login-btn-inner">
                            <div class="row">
                              <div class="col-lg-2"></div>
                              <div class="col-lg-9">
                                <div class="login-horizental cancel-wp pull-left">
                                  <button class="btn btn-white" type="submit">Cancel
                                  </button>
                                  <button class="btn btn-sm btn-primary login-submit-cs"
                                  type="submit">Save Change
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    <script type="text/javascript">
    $('.input-group').on('input', '.harga', function () {
      var laba = 0;
      $('.input-group .harga').each(function () {
        var beli = $('#beli').val();
        var jual = $('#jual').val();
        var input = $(this).val();
        if ($.isNumeric(input)) {
          laba = parseFloat((jual - beli) / beli) * 100;
        }
      })
      $('#laba').val(laba);
    })
    </script>
    <script>
    function satuanDua() {
      var s1 = document.getElementById("ddSatuan_satu").value;
      var s2 = document.getElementById("ddSatuan_dua");
      var stok = document.getElementById("ddStok");
      s2.innerHTML = "";
      if (s1 == "PCS") {
        var optionArray = ["|", "PCS|PCS"];
      } else {
        var optionArray = ["|", "Gr|Gr"];
      }
      for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair [1];
        s2.options.add(newOption);
      }
      stok.innerHTML = "";
      for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair [1];
        stok.options.add(newOption);
      }
    }

    function satuanTiga() {
      var s2 = $('#txtSatuan_dua').val();
      var s1 = document.getElementById("ddSatuan_satu").value;
      var s3 = document.getElementById("ddSatuan_tiga");
      s3.innerHTML = '';
      var optionArray = ["|", s1 + "|" + s1, s2 + "|" + s2];
      for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair [1];
        s3.options.add(newOption);
      }
    }

    function satuanEmpat() {
      var s3 = $('#txtSatuan_tiga').val();
      var s1 = document.getElementById("ddSatuan_satu").value;
      var s2 = document.getElementById("txtSatuan_dua").value;
      var s4 = document.getElementById("ddSatuan_empat");
      s4.innerHTML = '';
      var optionArray = ["|", s1 + "|" + s1, s2 + "|" + s2, s3 + "|" + s3];
      for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair [1];
        s4.options.add(newOption);
      }
    }
    </script>
    @endsection
