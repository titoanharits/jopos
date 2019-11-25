@extends('layouts.main')
@section('title','Menu Customer')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-12">
      <div class="card-header py-2">
        <h1>Tabel <span class="table-project-n">Buyer</span></h1>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

            <div class="row">
              <div class="col-sm-1">
                <a href="{{route('createcustomer')}}" class="btn btn-lg btn-primary">Tambah</a>
              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered dataTable" id="table" data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Kategori</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0?>
                    @foreach($customer as $item)
                    <?php $no++?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->alamat}}</td>
                      <td>{{$item->telepon}}</td>
                      <td>{{$item->keterangan}}</td>
                      <td>
                        <form action="{{ route('editcustomer', $item) }}"
                          style="display: inline">
                          <button class="btn-circle btn-primary" style="width: 37px;">
                            <i class="fa fa-edit"></i>
                          </button>
                        </form>
                        <form action="{{ route('deletecustomer', $item)}}" method="POST"
                          style="display: inline">
                          <button class="btn-circle btn-danger">
                            <i class="fa fa-trash"></i>
                          </button>
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="DELETE">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
