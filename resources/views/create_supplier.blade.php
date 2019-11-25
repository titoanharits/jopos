@extends('layouts.main')
@section('title','Tambah Supplier')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-hd">
          <div class="main-sparkline12-hd">
            <h1>Tambah Supplier</h1>
          </div>
        </div>
        <div class="sparkline12-graph">
          <div class="basic-login-form-ad">
            <div class="row">
              <div class="col-lg-12">
                <div class="all-form-element">
                  <form method="POST" action="{{route('storesupplier')}}">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label class="login2 pull-right pull-right-pro">Nama
                            Perusahaan</label>
                          </div>
                          <div class="col-lg-9">
                            <input id="nama"
                            type="text" class="form-control" name="nama"
                            placeholder="Nama Perusahaan" value="{{old('nama')}}"
                            required/>
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
                            <label class="login2 pull-right pull-right-pro">Telepon
                              Perusahaan</label>
                            </div>
                            <div class="col-lg-9">
                              <input type="number" class="form-control" name="telepon"
                              placeholder="Telepon Perusahaan"
                              value="{{old('telepon')}}" required/>
                              @if($errors->has('telepon'))
                              <p>{{$errors->first('telepon')}}</p>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-3">
                              <label class="login2 pull-right pull-right-pro">Fax
                                Perusahaan</label>
                              </div>
                              <div class="col-lg-9">
                                <input type="number" class="form-control" name="fax"
                                placeholder="Fax Perusahaan" value="{{old('fax')}}"
                                required/>
                                @if($errors->has('fax'))
                                <p>{{$errors->first('fax')}}</p>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Website
                                  Perusahaan</label>
                                </div>
                                <div class="col-lg-9">
                                  <input type="url" class="form-control" name="website"
                                  placeholder="Website Perusahaan"
                                  value="{{old('website')}}" required/>
                                  @if($errors->has('website'))
                                  <p>{{$errors->first('website')}}</p>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-lg-3">
                                  <label class="login2 pull-right pull-right-pro">Nama
                                    CP</label>
                                  </div>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" name="nama_cp"
                                    placeholder="Nama CP" value="{{old('nama_cp')}}"
                                    required/>
                                    @if($errors->has('nama_cp'))
                                    <p>{{$errors->first('nama_cp')}}</p>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-lg-3">
                                    <label class="login2 pull-right pull-right-pro">Telepon
                                      CP</label>
                                    </div>
                                    <div class="col-lg-9">
                                      <input type="number" class="form-control" name="telepon_cp"
                                      placeholder="Telepon CP"
                                      value="{{old('telepon_cp')}}" required/>
                                      @if($errors->has('telepon_cp'))
                                      <p>{{$errors->first('telepon_cp')}}</p>
                                      @endif
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

          @endsection
