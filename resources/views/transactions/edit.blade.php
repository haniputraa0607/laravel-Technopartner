@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Kategori') }}</div>
                <div class="card-body">
                  <h1 class="h4 mb-4 text-gray-800">Edit Transaksi</h1>
                      <form action="/transactions/{{$transaction->id_transaksi}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                          <label for="inputTransaksi" class="col-sm-3 col-form-label">Pilih Transaksi</label>
                          <div class="col-sm-9">
                            <select class="custom-select mr-sm-2 @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                              <?php 
                                if(old('id_kategori')){
                                  echo'<option value="">Pilih Transaksi</option>';
                                  foreach($categories as $category){
                                    if($category->id_kategori==old('id_kategori')){
                                      echo '
                                      <option value="'.$category->id_kategori.'" selected>'.$category->nama_kategori.'</option>'
                                      ;
                                    }else{
                                      echo '
                                      <option value="'.$category->id_kategori.'">'.$category->nama_kategori.'</option>'
                                      ;
                                    }
                                  }
                                }else{
                                  echo'<option value="">Pilih Transaksi</option>';
                                  foreach($categories as $category){
                                    if($category->id_kategori==$transaction->id_kategori){
                                      echo '
                                      <option value="'.$category->id_kategori.'" selected>'.$category->nama_kategori.'</option>'
                                      ;
                                    }else{
                                      echo '
                                      <option value="'.$category->id_kategori.'">'.$category->nama_kategori.'</option>'
                                      ;
                                    }
                                  }
                                }
                              ?>
                            </select>
                            @error('id_kategori')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNominal" class="col-sm-3 col-form-label">Nominal Transaksi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control @error('nominal_trans') is-invalid @enderror" id="nominal_trans" name="nominal_trans" placeholder="Nominal Transaksi" value="{{old('nominal_trans')?old('nominal_trans') : $transaction->nominal_trans}}">
                            @error('nominal_trans')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tanggal" class="col-sm-3 col-form-label">Pada Tanggal</label>
                          <div class="col-sm-9">
                            <input type="datetime-local" placeholder="time" value="{{old('date')?old('date') : $transaction->date}}" class="form-control" id="date" name="date">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputDeskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi')?old('deskripsi') : $transaction->deskripsi}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
