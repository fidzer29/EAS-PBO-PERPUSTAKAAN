<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primary = 'Kode_Member';
    protected $table = "Member";
    protected $fillable = [
        'Kode_Member',
        'Nama_Lengkap',
        'Alamat',
        'No_Telepon',
        'Status',

    ];
}
