<?php

namespace App\Observers;

use App\Models\Permohonan;

class PermohonanObserver
{
    public function creating(Permohonan $permohonan)
    {
        if (empty($permohonan->no_rujukan)) {
            $permohonan->no_rujukan = Permohonan::generateNoRujukan($permohonan->skop);
        }
    }
}
