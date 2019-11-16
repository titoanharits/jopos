@extends('layouts.main')
@section('title','Tambah Customer')

@section('content')


<div class="row">
  <div class="col-lg-12">
    <div class="">
      <div class="sparkline12-hd">
        <div class="main-sparkline12-hd">
          <h1>Tambah Customer</h1>
        </div>
      </div>
      <div class="sparkline12-graph">
        <div class="basic-login-form-ad">
          <div class="row">
            <div class="col-lg-12">
              <div class="all-form-element-inner">
                <form method="POST" action="{{route('storecustomer')}}">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-3">
                        <label class="login2 pull-right pull-right-pro">Nama Toko /
                          Orang</label>
                        </div>
                        <div class="col-lg-9">
                          <input id="nama" type="text" class="form-control"
                          name="nama" placeholder="Nama Toko / Orang"
                          value="{{old('nama')}}" required/>
                          @if($errors->has('nama'))
                          <p>{{$errors->first('nama')}}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Alamat</label>
                        </div>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="alamat"
                          placeholder="Alamat" value="{{old('alamat')}}"
                          required/>
                          @if($errors->has('alamat'))
                          <p>{{$errors->first('alamat')}}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Email</label>
                        </div>
                        <div class="col-lg-9">
                          <input type="email" class="form-control" name="email"
                          placeholder="Email" value="{{old('email')}}"
                          required/>
                          @if($errors->has('email'))
                          <p>{{$errors->first('email')}}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Telepon</label>
                        </div>
                        <div class="col-lg-9">
                          <input type="number" class="form-control" name="telepon"
                          placeholder="Telepon" value="{{old('telepon')}}"
                          required/>
                          @if($errors->has('telepon'))
                          <p>{{$errors->first('telepon')}}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Kategori</label>
                        </div>
                        <div class="col-lg-9">
                          <div class="form-select-list">
                            <select class="form-control custom-select-value"
                            name="keterangan">
                            <option>Perorangan</option>
                            <option>Grosiran</option>
                            <option>Kelontong</option>
                            <option>Perusahaan</option>
                          </select>
                          @if($errors->has('keterangan'))
                          <p>{{$errors->first('keterangan')}}</p>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="login-btn">
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

@endsection
