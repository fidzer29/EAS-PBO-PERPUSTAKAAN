<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Member extends Model
{
    use LogsActivity;
    use HasFactory;

    protected $primaryKey = 'Kode_Member';
    protected $table = "member";
    protected $fillable = [
        'Nama_Lengkap',
        'Alamat',
        'No_Telepon',
        'Status',

    ];
    protected $guarded = ['Kode_Member'];
    protected static $logName = 'member';
    protected static $logUnguarded = 'true';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
