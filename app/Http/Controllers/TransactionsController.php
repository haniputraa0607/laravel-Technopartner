<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dump($request);
        $transactions = Transaction::join('categories', 'transactions.id_kategori', '=', 'categories.id_kategori')
               ->get(['transactions.*', 'categories.nama_kategori', 'categories.jenis_kategori']);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('transactions.create', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "id_kategori" => "required",
            "nominal_trans" => "required"
        ]);
        if($request->deskripsi){
            $deskripsi = $request->deskripsi;
        } else{
            $deskripsi = 'Tidak Teriisi';
        }
        if($request->date){
            $date = $request->date;
        } else{
            $date = Carbon::now()->format('Y-m-d');
        }
        Transaction::create([
            "id_kategori" => $request->id_kategori,
            "nominal_trans" => $request->nominal_trans,
            "deskripsi" => $deskripsi,
            "date" => $date,
            "created_at" => Carbon::now()->format('Y-m-d'),
            "updated_at" => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect("/transactions")->with(
            "status",
            "Transaksi baru telah ditambahkan"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $categories = Category::all();
        return view('transactions.edit', ["transaction" => $transaction,"categories"=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            "id_kategori" => "required",
            "nominal_trans" => "required",
        ]);
        if($request->deskripsi){
            $deskripsi = $request->deskripsi;
        } else{
            $deskripsi = 'Tidak Teriisi';
        }
        Transaction::where("id_transaksi", $transaction->id_transaksi)->update([
            "id_kategori" => $request->id_kategori,
            "nominal_trans" => $request->nominal_trans,
            "deskripsi" => $deskripsi,
        ]);
        return redirect("/transactions")->with(
            "status",
            "Sebuah Transaksi telah diubah"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id_transaksi);
        return redirect("/transactions")->with(
            "status",
            "Sebuah Transaksi telah dihapus"
        ); 
    }
}
