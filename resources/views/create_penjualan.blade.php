@extends('layouts.main')
@section('title','POS')

@section('content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Tambah Barang Kasir</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form method="POST" action="{{route('tambahbarangkasir')}}">
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
                                                                    <option></option>
                                                                    @foreach($barang as $item)
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
                                                                    Jual</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Rp.</span>
                                                                    <input type="number" class="form-control diskon"
                                                                           id="harga" name="harga_jual"
                                                                           placeholder="Harga Jual"
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
                                                            <input type="number" class="form-control" name="jumlah"
                                                                   placeholder="Jumlah" value="{{old('email')}}"
                                                                   required/>
                                                            @if($errors->has('email'))
                                                                <p>{{$errors->first('email')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    <button class="btn btn-white" type="submit">Cancel
                                                                    </button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        function pilihBarang() {
            var xmlhttp = new XMLHttpRequest();
            var value = document.getElementById("barang").value;
            if (value != "") {
                xmlhttp.open("GET", "http://g.pbf.ilkom.unej.ac.id/162410101073/jopos/public/penjualan/barang/" + value, false);
                xmlhttp.send(null);
                document.getElementById("detail_barang").innerHTML = xmlhttp.responseText;
            } else {
                alert('barang Kosong')
            }
        }
    </script>
@endsection
