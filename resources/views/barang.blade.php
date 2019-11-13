@extends('layouts.main')
@section('title','Barang')

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-2">
    <h1>Tabel <span class="table-project-n">Barang</span></h1>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

        <div class="row">
          <div class="col-md-1">
            <a href="/barang/create" class="btn btn-lg btn-primary">Tambah</a>
          </div>

          <div class="col-md-1">
            <a href="/barang/print" class="btn btn-lg btn-primary"> Print</a>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="table" data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Nama Perusahaan</th>
                  <th>Kategori</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Laba</th>
                  <th>Stok</th>
                  <th>Stok Kemasan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0?>
                @foreach($barang as $item)
                <?php
                $no++?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$item->id_barang}}</td>
                  <td>{{$item->nama_barang}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->kategori->kategori}}</td>
                  <td>Rp. {{number_format($item->harga_beli,0,".",".")}}</td>
                  <td>Rp. {{number_format($item->harga_jual,0,".",".")}}</td>
                  <td>{{substr($item->laba,0,5)}} %</td>
                  <td>{{$item->stok." ".$item->satuan_satu}}</td>
                  <td>
                    @if($item->satuan_empat != "")
                    {{
                      floor($item->stok/$item->stok_empat/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_empat
                      ." ".floor(($item->stok % ($item->stok_dua*$item->stok_empat*$item->stok_tiga))/($item->stok_tiga*$item->stok_dua))." ".$item->satuan_tiga
                      ." ".floor((($item->stok % ($item->stok_dua*$item->stok_empat*$item->stok_tiga)) % ($item->stok_tiga*$item->stok_dua))/$item->stok_dua)." ".$item->satuan_dua
                      ." ".(($item->stok % ($item->stok_dua*$item->stok_empat*$item->stok_tiga)) % ($item->stok_tiga*$item->stok_dua))%$item->stok_dua." ".$item->satuan_satu
                    }}
                    @elseif($item->satuan_tiga != "")
                    @if($item->satuan_turunan_tiga == $item->satuan_satu)
                    {{floor($item->stok/$item->stok_tiga)." ".$item->satuan_tiga." ".floor(($item->stok % $item->stok_tiga) / $item->stok_dua)." ".
                    $item->satuan_dua." ".(($item->stok % $item->stok_tiga) % $item->stok_dua)." ".$item->satuan_satu}}
                    @else
                    {{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." ".floor(($item->stok % ($item->stok_tiga*$item->stok_dua)/$item->stok_dua)).
                    " ".$item->satuan_dua." ".($item->stok % ($item->stok_tiga * $item->stok_dua) % $item->stok_dua)." ".$item->satuan_satu}}
                    @endif
                    @elseif($item->satuan_dua != "")
                    {{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." ".($item->stok % $item->stok_dua." ".$item->satuan_satu)}}
                    @else
                    {{$item->stok." ".$item->satuan_satu}}
                    @endif
                  </td>
                  <td>
                    <form action="/barang/edit/{{$item->id_barang}}" method="get"
                      style="display: inline">
                      <button class="btn-circle btn-md btn-primary">
                        <i class="fa fa-edit"></i>
                      </button>
                    </form>
                    <form action="/barang/{{$item->id_barang}}" method="POST"
                      style="display: inline">
                      <button class="btn-circle btn-md btn-danger">
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

<script type="text/javascript">
document.addEventListener("keydown", e => {
  if (e.key == "F5") {
    e.preventDefault()
  }
  ;
});
window.addEventListener("keyup", checkKey, false);

function checkKey(key) {
  if (key.keyCode == "116") {
    window.location.href = "/barang/create";
  }
}
</script>
@endsection
