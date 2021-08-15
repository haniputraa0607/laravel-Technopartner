<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class RangeController extends Controller
{
    public function range(Request $request)
    {
        $tanggal_awal = $request->date1;
        $tanggal_akhir = $request->date2;
        dd($tanggal_awal);
        $data = Transaction::join('categories', 'transactions.id_kategori', '=', 'categories.id_kategori')
        ->wherewhereBetween('categories.created_at',[$tanggal_awal,$tanggal_akhir])->get(['transactions.*', 'categories.nama_kategori', 'categories.jenis_kategori']); 
        dd($data);
    }
}
