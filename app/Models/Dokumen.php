<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $fillable = ['permohonan_id', 'nama_fail', 'lokasi_fail'];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'no_rujukan', 'no_rujukan');
    }
}
