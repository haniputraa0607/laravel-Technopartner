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
                      <a class="btn btn-light mb-2" href="/categories/create" role="button">Tambah Transaksi</a>
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
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>1</th>
                            <td>Gaji</td>
                            <td>Pemasukan</td>
                            <td>5000000</td>
                            <td>
                                <a href="" class="badge badge-primary">Detail</a>
                            </td>
                          </tr>
                          <tr>
                            <th>2</th>
                            <td>Makan</td>
                            <td>Pengeluaran</td>
                            <td>400000</td>
                            <td>
                                <a href="" class="badge badge-primary">Detail</a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
