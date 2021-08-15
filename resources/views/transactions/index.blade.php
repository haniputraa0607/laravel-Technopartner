@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Transaksi') }}</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 mt-0">
                      <a class="btn btn-light mb-2" href="/transactions/create" role="button">Tambah Transaksi</a>
                    </div>
                    <div class="col">
                      <div>
                        <form action="" method="get">
                          @csrf
                          <div class="form-group row">
                            <label for="inputCompanyName" class="ml-3 col-form-label">Dari</label>
                            <div class="col-sm-3 px-0 mx-1">
                              <input type="date" class="form-control" id="company_name" name="company_name">
                            </div>
                            <label for="inputCompanyName" class="ml-1 col-form-label">Sampai</label>
                            <div class="col-sm-3 px-0 mx-1">
                              <input type="date" class="form-control" id="company_name" name="company_name">
                            </div>
                            <button type="submit" class="btn btn-primary ml-4">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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
