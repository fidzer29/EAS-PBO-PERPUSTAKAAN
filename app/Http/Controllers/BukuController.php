<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BukuController extends Controller
{
    public function index()
    {

        // $buku = DB::table('buku')->select("nama_buku")->get();
        $buku = buku::all();
        // dd($buku);
        return view('buku.index', [
            'buku' => $buku,
        ]);
    }

    public function create()
    {
        return view('buku.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required',
            'jumlah' => 'required',
        ]);
        $requestCodeBuku = 'BP-2022' . rand(0, 99);
        buku::create([
            'kode_buku' => $requestCodeBuku,
            'nama_buku' => $request->nama_buku,
            'jumlah' => $request->jumlah,

        ]);
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil menambah buku baru');
    }

    public function edit($kode_buku)
    {
        // dd($kode_buku);
        // $buku = buku::where('nama_buku', '=', $kode_buku)->firstOrFail();
        // $buku = buku::find($kode_buku);
        // dd($kode_buku);
        $buku = DB::table('buku')->where('kode_buku', $kode_buku)->first();
        // dd($buku);
        return view('buku.edit', [
            'buku' => $buku,

        ]);
    }

    public function destroy($kode_buku)
    {
        //hapus kode buku by kode_buku

        // dd($kode_buku);
        // $buku = buku::findOrFail($kode_buku);
        $buku = buku::where('kode_buku', '=', $kode_buku)->first();
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil menghapus buku');
    }

    public function update(Request $request, $kode_buku)
    {
        $request->validate([
            'nama_buku' => 'required',
            'jumlah' => 'required',
        ]);
        // dd($kode_buku);
        $buku = buku::where('kode_buku', '=', $kode_buku)->first();
        // dd($buku);
        $buku->update([
            'nama_buku' => $request->nama_buku,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil mengubah data buku');
    }
}
