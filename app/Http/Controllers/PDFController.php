<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Member;
use Illuminate\Http\Request;

use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'member' => Member::ALL(),
            'title' => 'LAPORAN MEMBER PERPUSTAKAAN 2022',
            'date' => date('m/d/Y')
        ];
        // dd($buku);

        // $data = [
        //     'title' => 'Daftar Data Buku',
        //     'date' => date('m/d/Y')
        // ];

        $pdf = PDF::loadView('cetak/cetakPDF', $data);

        return $pdf->download('Laporan Member Perpustakaan.pdf');
    }
}
