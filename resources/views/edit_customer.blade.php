@extends('layouts.main')
@section('title','POS')
@section('fitur','Customer')
@section('content')
<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="sparkline12-list shadow-reset mg-t-30">
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
                    <form method="POST" action="/customer/{{$customer->id_customer}}/edit">
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Nama Toko / Orang</label>
                          </div>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Toko / Orang" value="{{$customer->nama}}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Alamat</label>
                          </div>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{$customer->alamat}}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Email</label>
                          </div>
                          <div class="col-lg-9">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$customer->email}}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Telepon</label>
                          </div>
                          <div class="col-lg-9">
                            <input type="number" class="form-control" name="telepon" placeholder="Telepon" value="{{$customer->telepon}}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Kategori</label>
                          </div>
                          <div class="col-lg-9">
                            <div class="form-select-list">
                              <select class="form-control custom-select-value"
                              name="keterangan">
                              <option>{{$customer->keterangan}}</option>
                              <option>Perorangan</option>
                              <option>Grosiran</option>
                              <option>Kelontong</option>
                              <option>Perusahaan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group-inner">
                      <div class="login-btn-inner">
                        <div class="row">
                          <div class="col-lg-3"></div>
                          <div class="col-lg-9">
                            <div class="login-horizental cancel-wp pull-left">
                              <button class="btn btn-white" type="submit">Cancel
                              </button>
                              <button class="btn btn-sm btn-primary login-submit-cs"
                              type="submit">Edit
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
</div>
</div>
@endsection
