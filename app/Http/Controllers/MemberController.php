<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //kode member auto generate

        // $array = $request->only([
        //     'Kode_Member',
        //     'Nama_Lengkap',
        //     'Alamat',
        //     'No_Telepon',
        //     'Status',
        //     'Kode_Pinjam',
        // ]);
        $requestCodeMember = '2022' . rand(0, 9999);
        Member::create([
            'Kode_Member' => $requestCodeMember,
            'Nama_Lengkap' => $request->Nama_Lengkap,
            'Alamat' => $request->Alamat,
            'No_Telepon' => $request->No_Telepon,
            'Status' => $request->Status,


        ]);

        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil menambah data Member');
    }

    public function edit($id)
    {
        $Member = Member::findOrFail($id);
        return view('member.edit', [
            'Member' => $Member
        ]);
    }

    public function destroy($id)
    {
        $Member = Member::findOrFail($id);
        $Member->delete();
        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil menghapus data Member');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Lengkap' => 'required',
        ]);
        $array = $request->only([
            'Nama_Lengkap'
        ]);
        $Member = Member::findOrFail($id);
        $Member->update($array);
        return redirect()->route('member.index')
            ->with('success_message', 'Berhasil mengubah data Member');
    }
}
