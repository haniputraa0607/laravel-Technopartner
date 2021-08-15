<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class RangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function range(Request $request)
    {
        $tanggal_awal = $request->date1;
        $tanggal_akhir = $request->date2;
        $bulan = "kosong";
        $transactions = Transaction::join('categories', 'transactions.id_kategori', '=', 'categories.id_kategori')
        ->whereBetween('date', [$tanggal_awal, $tanggal_akhir])->orWhere('date',$tanggal_awal)->get(['transactions.*', 'categories.nama_kategori', 'categories.jenis_kategori']);
        $tanggal_awal = Carbon::parse($tanggal_awal)->isoFormat('D MMMM Y');
        $tanggal_akhir = Carbon::parse($tanggal_akhir)->isoFormat('D MMMM Y');
        return view('transactions.index', [
            "transactions" => $transactions,
            "request"=>$request,
            "bulan"=>$bulan,
            "awal" => $tanggal_awal,
            "akhir" => $tanggal_akhir,
        ]);
    }
}
