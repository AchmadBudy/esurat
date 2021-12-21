<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $fillable = [
        'kodeKlasifikasi',
        'user_id',
        'kodeArsip',
        'perihal',
        'nomorRegistrasi',
        'nomorSurat',
        'asalSurat',
        'isiRingkas',
        'fileSurat',
        'tanggalSurat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
