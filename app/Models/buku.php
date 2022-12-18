<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class buku extends Model
{
    use LogsActivity;
    use HasFactory;

    protected $table = "buku";

    // protected $primaryKey = 'kode_buku';
    // public $incrementing = false;
    protected $fillable = [
        'id',
        'kode_buku',
        'nama_buku',
        'jumlah'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
