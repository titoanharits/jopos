@extends('layouts.main')
@section('title','POS')
@section('fitur','Customer')
@section('content')
<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">



        <h1>Edit Supplier</h1>



        <div class="basic-login-form-ad">
          <div class="row">
            <div class="col-lg-12">
              <div class="all-form-element">
                <form method="POST" action="{{route('updatesupplier', ['id' => $supplier])}}">
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-3">
                        <label class="login2 pull-right pull-right-pro">Nama
                          Perusahaan</label>
                        </div>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="nama" placeholder="Nama Perusahaan" value="{{$supplier->nama}}" required/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group-inner">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Alamat</label>
                        </div>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{$supplier->alamat}}" required/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group-inner">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Email</label>
                        </div>
                        <div class="col-lg-9">
                          <input type="email" class="form-control" name="email" placeholder="Email" value="{{$supplier->email}}" required/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group-inner">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Telepon
                            Perusahaan</label>
                          </div>
                          <div class="col-lg-9">
                            <input type="number" class="form-control" name="telepon" placeholder="Telepon Perusahaan" value="{{$supplier->telepon}}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-inner">
                        <div class="row">
                          <div class="col-lg-3">
                            <label class="login2 pull-right pull-right-pro">Fax
                              Perusahaan</label>
                            </div>
                            <div class="col-lg-9">
                              <input type="number" class="form-control" name="fax" placeholder="Fax Perusahaan" value="{{$supplier->fax}}" required/>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-inner">
                          <div class="row">
                            <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Website Perusahaan</label>
                            </div>
                            <div class="col-lg-9">
                              <input type="url" class="form-control" name="website" placeholder="Website Perusahaan" value="{{$supplier->website}}" required/>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-inner">
                          <div class="row">
                            <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Nama
                                CP</label>
                              </div>
                              <div class="col-lg-9">
                                <input type="text" class="form-control" name="nama_cp" placeholder="Nama CP" value="{{$supplier->nama_cp}}" required/>
                              </div>
                            </div>
                          </div>
                          <div class="form-group-inner">
                            <div class="row">
                              <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Telepon CP</label>
                              </div>
                              <div class="col-lg-9">
                                <input type="number" class="form-control" name="telepon_cp" placeholder="Telepon CP" value="{{$supplier->telepon_cp}}" required/>
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
      @endsection
