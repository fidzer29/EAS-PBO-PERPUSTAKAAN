<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = 'Kode_Member';
    protected $table = "member";
    protected $fillable = [
        'Kode_Member',
        'Nama_Lengkap',
        'Alamat',
        'No_Telepon',
        'Status',

    ];
}
