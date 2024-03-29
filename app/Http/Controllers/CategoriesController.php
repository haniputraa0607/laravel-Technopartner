<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoriesController extends Controller
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
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            "nama_kategori" => "required",
            "jenis_kategori" => "required",
        ]);
        if($request->deskripsi){
            $deskripsi = $request->deskripsi;
        } else{
            $deskripsi = 'Tidak Teriisi';
        }
        Category::create([
            "nama_kategori" => $request->nama_kategori,
            "jenis_kategori" => $request->jenis_kategori,
            "deskripsi" => $deskripsi,
            "created_at" => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect("/categories")->with(
            "status",
            "Kategori baru telah ditambahkan"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "nama_kategori" => "required",
            "jenis_kategori" => "required",
        ]);
        if($request->deskripsi){
            $deskripsi = $request->deskripsi;
        } else{
            $deskripsi = 'Tidak Teriisi';
        }
        Category::where("id_kategori", $category->id_kategori)->update([
            "nama_kategori" => $request->nama_kategori,
            "jenis_kategori" => $request->jenis_kategori,
            "deskripsi" => $deskripsi,
        ]);
        return redirect("/categories")->with(
            "status",
            "$category->nama_kategori telah diubah"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id_kategori);
        return redirect("/categories")->with(
            "status",
            "Sebuah Kategori telah dihapus"
        ); 
    }
}
