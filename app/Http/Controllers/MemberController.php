<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index()
    {
        $Member = Member::all();
        return view('member.index', [
            'Member' => $Member
        ]);
    }

    public function create()
    {
        return view('Member.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Lengkap' => 'required',
            'Alamat' => 'required',
            'No_Telepon' => 'required',
            'Status' => 'required',
        ]);
        $requestCodeMember = '2022' . rand(0, 9999);
        try {
            Member::create([
                'Kode_Member' => $requestCodeMember,
                'Nama_Lengkap' => $request->Nama_Lengkap,
                'Alamat' => $request->Alamat,
                'No_Telepon' => $request->No_Telepon,
                'Status' => $request->Status,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return view('member.create')->with('error_message', 'Gagal menambah data Member');
        }



        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil menambah data Member');
    }

    public function edit($Kode_Member)
    {
        $Member = Member::where('Kode_Member', $Kode_Member)->first();
        if (!$Member) return redirect()->route('member.index')
            ->with('error_message', 'Member dengan id ' . $Kode_Member . ' tidak ditemukan');
        return view('member.edit', [
            'member' => $Member
        ]);
    }

    public function destroy($Kode_Member)
    {
        $Member = Member::findOrFail($Kode_Member);
        $Member->delete();
        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil menghapus data Member');
    }

    public function update(Request $request, $Kode_Member)
    {
        $request->validate([
            'Nama_Lengkap' => 'required',
        ]);
        $array = $request->only([
            'Nama_Lengkap'
        ]);
        $Member = Member::where('Kode_Member', $Kode_Member)->first();
        $Member->update($array);
        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil mengubah data Member');
    }
}
