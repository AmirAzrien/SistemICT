<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permohonan;
use App\Models\Mesyuarat;

class MesyuaratController extends Controller
{
    public function index()
    {
        $permohonanList = Permohonan::where('status_sekretariat', 'Disyorkan')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('mesyuarat.index', compact('permohonanList'));
    }

    // Mesyuarat 1
    public function showStep1Form($permohonanId)
    {
        $permohonan = Permohonan::findOrFail($permohonanId);
        return view('mesyuarat.step1', compact('permohonan'));
    }

    public function submitStep1(Request $request, $permohonanId)
    {
        $request->validate([
            'nama_mesyuarat' => 'required|string',
            'nilai_projek' => 'required|numeric',
            'kelulusan' => 'required|string',
            'tarikh_masa' => 'required|date',
        ]);

        Mesyuarat::create([
            'permohonan_id' => $permohonanId,
            'nama_mesyuarat' => $request->nama_mesyuarat,
            'nilai_projek' => $request->nilai_projek,
            'kelulusan' => $request->kelulusan,
            'tarikh_masa' => $request->tarikh_masa,
        ]);

        $permohonan = Permohonan::findOrFail($permohonanId);
        $permohonan->status_sekretariat = 'Mesyuarat Pertama';
        $permohonan->save();

        return redirect()->route('mesyuarat.index')->with('success', 'Maklumat mesyuarat pertama disimpan.');
    }

    //Mesyuarat 2
    public function showStep2Form($permohonanId)
    {
        $permohonan = Permohonan::findOrFail($permohonanId);
        return view('mesyuarat.step2', compact('permohonan'));
    }

    public function submitStep2(Request $request, $permohonanId)
    {
        $request->validate([
            'nama_mesyuarat' => 'required|string',
            'nilai_projek' => 'required|numeric',
            'kelulusan' => 'required|string',
            'tarikh_masa' => 'required|date',
            'no_sijil' => 'required|string',
        ]);

        Mesyuarat::create([
            'permohonan_id' => $permohonanId,
            'nama_mesyuarat' => $request->nama_mesyuarat,
            'nilai_projek' => $request->nilai_projek,
            'kelulusan' => $request->kelulusan,
            'tarikh_masa' => $request->tarikh_masa,
            'no_sijil' => $request->no_sijil,
        ]);

        // Kemaskini status permohonan
        $permohonan = Permohonan::findOrFail($permohonanId);
        $permohonan->status_sekretariat = $request->kelulusan;
        $permohonan->save();

        return redirect()->route('mesyuarat.index')->with('success', 'Maklumat Mesyuarat 2 telah disimpan.');
    }
}
