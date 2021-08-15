@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Kategori') }}</div>
                <div class="card-body">
                  <h1 class="h4 mb-4 text-gray-800">Tambah Kategori</h1>
                      <form action="/categories/{{$category->id_kategori}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                          <label for="inputNamaKategori" class="col-sm-3 col-form-label">Nama Kategori</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="{{old('nama_kategori')?old('nama_kategori') : $category->nama_kategori}}">
                            @error('nama_kategori')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNamaKategori" class="col-sm-3 col-form-label">Jenis Kategori</label>
                          <div class="col-sm-9">
                            <select class="custom-select mr-sm-2 @error('jenis_kategori') is-invalid @enderror" id="jenis_kategori" name="jenis_kategori">
                            <?php 
                              if(old('jenis_kategori')){
                                echo'<option value="">Pilih Kategori</option>';
                            ?>
                              <option value="Pemasukan" <?php if(old('jenis_kategori') == 'Pemasukan'){ echo 'selected'; } ?>>Pemasukan</option>
                              <option value="Pengeluaran" <?php if(old('jenis_kategori') == 'Pengeluaran'){ echo 'selected'; } ?>>Pengeluaran</option>
                            <?php 
                            }else{ ?>
                              <option value="">Pilih Kategori</option>
                              <option value="Pemasukan" <?php if($category->jenis_kategori == 'Pemasukan'){ echo 'selected'; } ?>>Pemasukan</option>
                              <option value="Pengeluaran" <?php if($category->jenis_kategori == 'Pengeluaran'){ echo 'selected'; } ?>>Pengeluaran</option>
                             <?php }
                            ?>
                            </select>
                            @error('jenis_kategori')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputDeskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi')?old('deskripsi') : $category->deskripsi}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
