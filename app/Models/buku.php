<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $table = "buku";
    protected $primaryKey = 'kode_buku';
    public $incrementing = false;
    protected $fillable = [
        'kode_buku',
        'nama_buku',
        'jumlah'
    ];
}