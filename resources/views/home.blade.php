@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Total Pemasukan</th>
                            <th scope="col">Total Pengeluaran</th>
                            <th scope="col">Saldo Saat Ini</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th></th>
                            <td>6000000</td>
                            <td>5000000</td>
                            <td>1000000</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
