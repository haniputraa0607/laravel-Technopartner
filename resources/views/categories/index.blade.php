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
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category)
                          <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $category->nama_kategori }}</td>
                            <td>{{ $category->jenis_kategori }}</td>
                            <td>
                              <a href="/categories/{{$category->id_kategori}}" class="badge badge-primary">Edit</a>
                            </td>
                            <td>
                              <form action="/categories/{{$category->id_kategori}}" method="post" class="d-inline">
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
