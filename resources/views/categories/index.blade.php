@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Kategori') }}</div>
                <div class="card-body">
                  <a class="btn btn-light mb-2" href="/categories/create" role="button">Tambah Kategori</a>
                  @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                  @endif
                  <table class="table text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Macam</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>1</th>
                            <td>Gaji</td>
                            <td>Pemasukan</td>
                            <td>
                                <a href="" class="badge badge-primary">Detail</a>
                            </td>
                          </tr>
                          <tr>
                            <th>2</th>
                            <td>Makan</td>
                            <td>Pengeluaran</td>
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
