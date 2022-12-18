<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengembalian;
use App\Models\buku;
use App\Models\peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = pengembalian::all();
        return view('pengembalian.index', [
            'pengembalian' => $pengembalian
        ]);
    }

    public function create()
    {
        return view('pengembalian.create');
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
                return redirect()->route('pengembalian.index')
                    ->with('error_message', 'Buku dengan kode ' . $request->Kode_Buku . ' tidak tersedia');
            }

            // destroy(Kode_Pinjam);
            $requestCodePengembalian = 'PM-2022' . rand(0, 99);
            pengembalian::create([
                'Kode_Pinjam' => $requestCodePengembalian,
                'Kode_Member' => $request->Kode_Member,
                'Kode_Buku' => $request->Kode_Buku,
                'Tanggal_Pinjam' => $request->Tanggal_Pinjam,
                'Tanggal_Kembali' => $request->Tanggal_Kembali,
            ]);

            //hapus data peminjaman
            $peminjaman = peminjaman::where('Kode_Member', '=', $request->Kode_Member)->first();
            $peminjaman->delete();

            // update jumlah buku yang dipinjam
            $buku->jumlah = $buku->jumlah + 1;
            $buku->save();
            // $pengembalian->delete();
            return redirect()->route('pengembalian.index')
                ->with('success_message', 'Berhasil menambah pengembalian baru');
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('pengembalian.index')
            ->with('success_message', 'Berhasil menambah pengembalian baru');
    }

    public function edit($id)
    {
        $pengembalian = pengembalian::find($id);
        if (!$pengembalian) return redirect()->route('pengembalian.index')
            ->with('error_message', 'pengembalian dengan id ' . $id . ' tidak ditemukan');
        return view('pengembalian.edit', [
            'pengembalian' => $pengembalian
        ]);
    }
    public function destroy($Kode_Kembali)
    {
        try {
            $pengembalian = peminjaman::where('Kode_Kembali$Kode_Kembali', '=', $Kode_Kembali)->first();
            $pengembalian->delete();
            return redirect()->route('pengembalian.index')
                ->with('success_message', 'Berhasil menghapus pengembalian');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'Kode_Member' => 'required',
            'Kode_Buku' => 'required',
            'Tanggal_Pinjam' => 'required',
            'Tanggal_Kembali' => 'required',
        ]);
        $pengembalian = pengembalian::find($id);
        $pengembalian->Kode_Member = $request->Kode_Member;
        $pengembalian->Kode_Buku = $request->Kode_Buku;
        $pengembalian->Tanggal_Pinjam = $request->Tanggal_Pinjam;
        $pengembalian->Tanggal_Kembali = $request->Tanggal_Kembali;
        $pengembalian->save();
        return redirect()->route('pengembalian.index')
            ->with('success_message', 'Berhasil mengubah pengembalian');
    }

    // public function kembali(Request $request, $id)
    // {
    //     $pengembalian = pengembalian::find($id);
    //     $pengembalian->Tanggal_Kembali = $request->Tanggal_Kembali;
    //     $pengembalian->save();
    //     return redirect()->route('pengembalian.index')
    //         ->with('success_message', 'Berhasil mengubah pengembalian');
    // }
}
