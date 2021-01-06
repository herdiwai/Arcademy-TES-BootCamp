@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row">
          <div class="col-md">
               <div class="card">
                    <div class="card-header">
                    <h3 class="float-left">Table Produk</h3>
                         <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal" >Tambah</button>
                    </div>
                         {{-- alert --}}
                         @if (session('status'))
                              <div class="alert alert-info">
                              <div class="alert-body">
                                   {{ session('status') }}
                              </div>
                              </div>
                         @endif
                    <div class="card-body">
                         <table class="table table-hover">
                              <thead>
                                   <tr>
                                        <th>Nama Produk</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                   </tr>
                              </thead>
                              @foreach($produk as $item)
                                   <tbody>
                                        <tr>
                                             <td>{{ $item->nama_produk }}</td>
                                             <td>{{ $item->keterangan }}</td>
                                             <td>Rp.{{ number_format($item['harga'],0,',','.') }}</td>
                                             <td>{{ $item->jumlah }}</td>
                                             <td>
                                                  <form action="{{ route('produk.destroy', $item->id) }}" method="post">
                                                  @csrf 
                                                  @method('delete')
                                                       <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-primary btn-sm btn-edit">Edit
                                                       </a>
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');" type="submit">Delete</button>
                                                  </form>
                                             </td>
                                        </tr>
                                   </tbody>
                              @endforeach
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <form action="{{ route('produk.store') }}" method="post">
               @csrf
                    <div class="modal-body">
                         <div class="form-group">
                              <label>Nama Produk</label>
                              <input type="text" name="nama_produk" class="form-control">
                         </div>
                         <div class="form-group">
                              <label>Keterangan</label>
                              <textarea type="text" name="keterangan" class="form-control"></textarea>
                         </div>
                         <div class="form-group">
                              <label>Harga</label>
                              <input type="number" name="harga" class="form-control">
                         </div>
                         <div class="form-group">
                              <label>Jumlah</label>
                              <input type="number" name="jumlah" class="form-control">
                         </div>

                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div>

{{-- <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <form action="" method="post">
               @csrf
               @method('put')
                    <div class="modal-body">
                         <div class="form-group">
                              <label>Nama Produk</label>
                              <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}">
                         </div>
                         <div class="form-group">
                              <label>Keterangan</label>
                              <textarea type="text" name="keterangan" class="form-control"></textarea>
                         </div>
                         <div class="form-group">
                              <label>Harga</label>
                              <input type="number" name="harga" class="form-control">
                         </div>
                         <div class="form-group">
                              <label>Jumlah</label>
                              <input type="number" name="jumlah" class="form-control">
                         </div>

                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div> --}}


@endsection

