<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesyuarat extends Model
{
    protected $table = 'mesyuarat';
    protected $fillable = [
        'permohonan_id',
        'nama_mesyuarat',
        'nilai_projek',
        'kelulusan',
        'tarikh_masa',
        'no_sijil'
    ];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
}
