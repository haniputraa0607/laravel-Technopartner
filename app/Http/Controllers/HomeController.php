<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemasukan = Transaction::join('categories', 'transactions.id_kategori', '=', 'categories.id_kategori')
        ->where('categories.jenis_kategori','Pemasukan')->get(['transactions.*', 'categories.nama_kategori', 'categories.jenis_kategori']);     
        $pengeluaran = Transaction::join('categories', 'transactions.id_kategori', '=', 'categories.id_kategori')
        ->where('categories.jenis_kategori','Pengeluaran')->get(['transactions.*', 'categories.nama_kategori', 'categories.jenis_kategori']);
        $total_pemasukan = 0;     
        $total_pengeluaran = 0;
        $saldo_sekarang = 0;
        foreach($pemasukan as $masuk){
            $total_pemasukan = $total_pemasukan + $masuk->nominal_trans;
        }
        foreach($pengeluaran as $keluar){
            $total_pengeluaran = $total_pengeluaran + $keluar->nominal_trans;
        }
        if($total_pemasukan==0){
            $pemasukan = 'Tidak ada pemasukan';
        } else {
            $pemasukan = $total_pemasukan;
        }
        if($total_pengeluaran==0){
            $pengeluaran = 'Tidak ada pengeluaran';
        } else {
            $pengeluaran = $total_pengeluaran;
        }
        $saldo_sekarang = $total_pemasukan - $total_pengeluaran;
        if($saldo_sekarang<0){
            $utang = $saldo_sekarang*-1;
            $saldo = 'Hutang '.$utang.'';
        } else if($saldo_sekarang==0) {
            $saldo = 'Saldo kosong';
        } else {
            $saldo = $saldo_sekarang;
        }
        $data = [
            "pemasukan" => $pemasukan,
            "pengeluaran" => $pengeluaran,
            "saldo" => $saldo,
        ];   
        // dd($data);
        return view('home', compact('data'));
    }
}
