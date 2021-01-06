
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
     <div class="col-md-8">
          <div class="card">
               <div class="card-header">
                    <h4>Barang</h4>
               </div>
               <div class="card-body">
                    <form action="{{ route('produk.update',$produk->id) }}" method="POST">
                         @csrf
                         @method('PUT')
                         <div class="form-group">
                              <label>Nama Produk</label>
                              <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}">
                         </div>
                         <div class="form-group">
                              <label>Keterangan</label>
                              <textarea type="text" name="keterangan" class="form-control" value="{{ $produk->keterangan }}"></textarea>
                         </div>
                         <div class="form-group">
                              <label>Harga</label>
                              <input type="number" name="harga" class="form-control" value="{{ $produk->harga }}">
                         </div>
                         <div class="form-group">
                              <label>Jumlah</label>
                              <input type="number" name="jumlah" class="form-control" value="{{ $produk->jumlah }}">
                         </div>
                         <div class="form-group">
                              <button type="submit"class="btn btn-sm btn-primary float-right">Simpan</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

@endsection