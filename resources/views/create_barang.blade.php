@extends('layouts.main')
@section('title','Tambah Barang')

@section('content')

<div class="container-fluid">
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
              <div class="all-form-element-inner">
                <!-- form -->
                <form action="/barang" method="POST">

                  <!-- input kode barang + nama barang -->
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">Kode Barang </label>
                      </div>
                      <div class="col-lg-8">
                        <label class="login2 pull-right pull-right-pro">Nama Barang</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <input type="number" class="form-control" name="id_barang"
                        placeholder="Kode Barang"
                        value="0000{{$id}}"/>
                        @if($errors->has('id_barang'))
                        <p>{{$errors->first('id_barang')}}</p>
                        @endif
                      </div>
                      <div class="col-lg-5">
                        <input id="nama_barang" type="text" class="form-control" name="nama_barang"
                        placeholder="Nama Barang"
                        value="{{old('nama_barang')}}"/>
                        @if($errors->has('nama_barang'))
                        <p>{{$errors->first('nama_barang')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>

                  <br>
                  <!-- form supplier -->
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-2">
                        <label class="login2 pull-right pull-right-pro">Nama Supplier</label>
                      </div>
                      <div class="col-lg-7">
                        <div class="form-select-list">
                          <select class="form-control custom-select-value"
                          name="id_supplier">
                          @foreach($supplier as $item)
                          <option value="{{$item->id}}">{{$item->nama}}</option>
                          @endforeach
                        </select>
                        @if($errors->has('id_supplier'))
                        <p>{{$errors->first('id_supplier')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <!-- form jenis barang -->
                <div class="form-group-inner">
                  <div class="row">
                    <div class="col-lg-2">
                      <label class="login2 pull-right pull-right-pro">Kategori</label>
                    </div>
                    <div class="col-lg-7">
                      <div class="form-select-list">
                        <select class="form-control custom-select-value"
                        name="id_kategori">
                        @foreach($kategori as $item)
                        <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('id_kategori'))
                      <p>{{$errors->first('id_kategori')}}</p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <hr>
              <div class="form-group-inner">
                <div class="row">
                  <div class="col-lg-4">
                    <label class="login2 pull-right pull-right-pro">Harga Beli
                      (Rp.)</label>
                    </div>
                    <div class="col-lg-4">
                      <label class="login2 pull-right pull-right-pro">Harga Jual
                        (Rp.)</label>
                      </div>
                      <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">Laba
                          (%)</label>
                        </div>
                      </div>

                      <!-- input harga -->
                      <div class="row" style="margin-top:5px">
                        <div class="col-lg-4">
                          <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="beli" placeholder="Harga Beli"
                            class="form-control harga" name="harga_beli"
                            value="{{old('harga_beli')}}">
                            @if($errors->has('harga_beli'))
                            <p>{{$errors->first('harga_beli')}}</p>
                            @endif
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="jual" placeholder="Harga Jual"
                            class="form-control harga" name="harga_jual"
                            value="{{old('harga_jual')}}">
                            @if($errors->has('harga_jual'))
                            <p>{{$errors->first('harga_jual')}}</p>
                            @endif
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                          <div class="input-group">
                            <input type="number" id="laba" name="laba"
                            placeholder="0"
                            class="form-control" disabled
                            value="{{old('laba')}}">
                            @if($errors->has('laba'))
                            <p>{{$errors->first('laba')}}</p>
                            @endif
                            <span class="input-group-text">%</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <hr>
                    <!-- input satuan -->
                    <div class="form-group-inner">
                      <div class="row">
                        <div class="col-lg-2">
                          <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-select-list">
                            <select id="ddSatuan_satu"
                            class="form-control custom-select-value"
                            name="satuan_satu"
                            onchange="satuanDua();">
                            <option></option>
                            <option value="PCS">pcs</option>
                            <option value="Gr">gr</option>
                          </select>
                          @if($errors->has('satuan_satu'))
                          <p>{{$errors->first('satuan_satu')}}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
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
                            value="">
                          </div>
                        </div>
                        <div class="col-lg-1">
                          <h1>=</h1>
                        </div>
                        <div class="col-lg-1">
                          <div class="input-group">
                            <input type="text" id="beli" placeholder="Stok"
                            class="form-control harga" name="stok_dua"
                            value="">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-select-list">
                            <select id="ddSatuan_dua"
                            class="form-control custom-select-value"
                            name="satuan_turunan_dua">
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
                            value="">
                          </div>
                        </div>
                        <div class="col-lg-1">
                          <h1>=</h1>
                        </div>
                        <div class="col-lg-1">
                          <div class="input-group">
                            <input type="text" id="beli" placeholder="Stok"
                            class="form-control harga" name="stok_tiga"
                            value="">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-select-list">
                            <select id="ddSatuan_tiga"
                            class="form-control custom-select-value"
                            name="satuan_turunan_tiga">
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
                            value="">
                          </div>
                        </div>
                        <div class="col-lg-1">
                          <h1>=</h1>
                        </div>
                        <div class="col-lg-1">
                          <div class="input-group">
                            <input type="text" id="beli" placeholder="Stok"
                            class="form-control harga" name="stok_empat"
                            value="">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-select-list">
                            <select id="ddSatuan_empat"
                            class="form-control custom-select-value"
                            name="satuan_turunan_empat">
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group-inner">
                    <div class="login-btn-inner">
                      <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-9">
                          <button class="btn btn-success btn-icon-split"type="submit">
                            <span class="icon text-white-50">
                              <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Simpan</span>
                          </button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

// document.addEventListener("keydown", e => {
//   if (e.key == "F5") {
//     e.preventDefault()
//   }
//   ;
// });
// window.addEventListener("keyup", checkKey, false);
//
// function checkKey(key) {
//   if (key.keyCode == "116") {
//     document.getElementById("nama_barang").focus();
//   }
// }
</script>
@endsection
