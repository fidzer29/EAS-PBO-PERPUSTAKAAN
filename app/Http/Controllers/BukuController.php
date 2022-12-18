<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Spatie\Activitylog\Traits\LogsActivity;


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
    public function landing()
    {
        // $buku = DB::table('buku')->select("nama_buku")->get();
        $buku = buku::all();
        return view('landing.landing', [
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

    public function edit($id)
    {

        $buku = buku::find($id);
        if (!$buku) return redirect()->route('buku.index')
            ->with('error_message', 'buku dengan id ' . $id . ' tidak ditemukan');
        return view('buku.edit', [
            'buku' => $buku
        ]);
    }

    public function destroy($kode_buku)
    {
        $buku = buku::find($kode_buku);

        if ($buku) $buku->delete();
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil menghapus buku');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_buku' => 'required',
            'jumlah' => 'required',
        ]);
        $buku = buku::find($id);
        $buku->nama_buku = $request->nama_buku;
        $buku->jumlah = $request->jumlah;
        $buku->save();
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil mengubah buku');
    }
}
