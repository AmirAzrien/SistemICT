<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengurusanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortByDate = $request->input('sort_by_date');
        $filterDate = $request->input('filter_date');
        $filterSkop = $request->input('filter_skop');

        $query = Permohonan::query();

        // Search di banyak kolum
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('skop', 'like', '%' . $search . '%')
                    ->orWhere('no_rujukan', 'like', '%' . $search . '%')
                    ->orWhere('jabatan', 'like', '%' . $search . '%')
                    ->orWhere('tajuk', 'like', '%' . $search . '%')
                    ->orWhereDate('created_at', $search);
            });
        }

        if ($filterDate) {
            $query->whereDate('created_at', $filterDate);
        }

        if ($filterSkop) {
            $query->where('skop', $filterSkop);
        }

        if ($sortByDate) {
            $query->orderBy('created_at', $sortByDate);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // $permohonan = $query->get();
        $permohonan = $query->paginate(10);

        return view('pengurusan.index', compact('permohonan', 'search', 'sortByDate', 'filterSkop'));
    }

    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id); // Ambil permohonan berdasarkan id
        return view('pengurusan.show', compact('permohonan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);

        $request->validate([
            // 'status_sekretariat' => 'required|in:Menunggu,Lengkap,Tidak Lengkap,Perlu Semakan Semula','Disyorkan'
            'status_sekretariat' => 'required|string',
        ]);

        $permohonan->status_sekretariat = $request->status_sekretariat;
        $permohonan->save();

        return back()->with('success', 'Status berjaya dikemaskini.');
    }
}
