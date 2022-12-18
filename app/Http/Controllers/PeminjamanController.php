<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjaman;
use App\Models\buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = peminjaman::all();
        return view('peminjaman.index' , [
            'peminjaman' => $peminjaman
        ]);
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'Kode_Buku' => 'required',
            'Tanggal_Pinjam' => 'required',
            'Tanggal_Kembali' => 'required',
        ]);
        // dd("Oke");
       try {
        // cek jumlah buku tersedia jika kurang dari 1 maka tidak bisa dipinjam
        $buku = buku::where('Kode_Buku', '=', $request->Kode_Buku)->first();
        if ($buku->jumlah < 1) {
            return redirect()->route('peminjaman.index')
            ->with('error_message', 'Buku dengan kode ' . $request->Kode_Buku . ' tidak tersedia');
        }
        
        $requestCodePeminjaman = 'PM-2022' . rand(0, 99);
        peminjaman::create([
            'Kode_Pinjam' => $requestCodePeminjaman,
            'Kode_Member' => $request->Kode_Member,
            'Kode_Buku' => $request->Kode_Buku,
            'Tanggal_Pinjam' => $request->Tanggal_Pinjam,
            'Tanggal_Kembali' => $request->Tanggal_Kembali,
        ]);
        
        // update jumlah buku yang dipinjam
        $buku = buku::where('Kode_Buku', '=', $request->Kode_Buku)->first();    
        $buku->jumlah = $buku->jumlah - 1;
        $buku->save();

        return redirect()->route('peminjaman.index')
            ->with('success_message', 'Berhasil menambah peminjaman baru');
       } catch (\Throwable $th) {
        dd($th);
       }
    }

    public function edit($id)
    {
        $peminjaman = peminjaman::find($id);
        if (!$peminjaman) return redirect()->route('peminjaman.index')
            ->with('error_message', 'peminjaman dengan id ' . $id . ' tidak ditemukan');
        return view('peminjaman.edit', [
            'peminjaman' => $peminjaman
        ]);
    }
    public function destroy($Kode_Pinjam)
    {
        $peminjaman = peminjaman::where('Kode_Pinjam', '=', $Kode_Pinjam)->first();
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')
            ->with('success_message', 'Berhasil menghapus peminjaman');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'Kode_Member' => 'required',
            'Kode_Buku' => 'required',
            'Tanggal_Pinjam' => 'required',
            'Tanggal_Kembali' => 'required',
        ]);
        $peminjaman = peminjaman::find($id);
        $peminjaman->Kode_Member = $request->Kode_Member;
        $peminjaman->Kode_Buku = $request->Kode_Buku;
        $peminjaman->Tanggal_Pinjam = $request->Tanggal_Pinjam;
        $peminjaman->Tanggal_Kembali = $request->Tanggal_Kembali;
        $peminjaman->save();
        return redirect()->route('peminjaman.index')
            ->with('success_message', 'Berhasil mengubah peminjaman');
    }

    // public function kembali(Request $request, $id)
    // {
    //     $peminjaman = peminjaman::find($id);
    //     $peminjaman->Tanggal_Kembali = $request->Tanggal_Kembali;
    //     $peminjaman->save();
    //     return redirect()->route('peminjaman.index')
    //         ->with('success_message', 'Berhasil mengubah peminjaman');
    // }
}
