@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Transaksi') }}</div>
                <div class="card-body">
                    
                      <a class="btn btn-light mb-2" href="/transactions/create" role="button">Tambah Transaksi</a>
                    
                    
                        <form action="/range" method="post">
                          @csrf
                          <div class="form-group row">
                            <label for="inputCompanyName" class="ml-3 col-form-label">Dari</label>
                            <div class="col-sm-3 px-0 mx-3">
                              <input type="datetime-local" class="form-control" id="company_name" name="date1">
                            </div>
                            <label for="inputCompanyName" class="ml-1 col-form-label">Sampai</label>
                            <div class="col-sm-3 px-0 mx-3">
                              <input type="datetime-local" class="form-control" id="company_name" name="date2">
                            </div>
                            <button type="submit" class="btn btn-primary ml-1">Submit</button>
                          </div>
                        </form>
                      
                  @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                  @endif
                  <table class="table text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Transaksi</th>
                            <th scope="col">Jenis Transaksi</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($transactions as $transaction)
                          <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $transaction->nama_kategori }}</td>
                            <td>{{ $transaction->jenis_kategori }}</td>
                            <td>{{ $transaction->nominal_trans }}</td>
                            <td>
                                <a href="/transactions/{{$transaction->id_transaksi}}" class="badge badge-primary">Edit</a>
                            </td>
                            <td>
                              <form action="/transactions/{{$transaction->id_transaksi}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="button_a badge badge-danger">Delete</button>
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
@endsection
