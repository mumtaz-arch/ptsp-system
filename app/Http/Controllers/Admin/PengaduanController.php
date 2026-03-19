<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $pengaduan->update($validated);

        return redirect()->route('admin.pengaduan.index')
            ->with('success', 'Status pengaduan diperbarui.');
    }

    public function exportPdf()
    {
        $pengaduan = Pengaduan::latest()->get();
        $pdf = Pdf::loadView('admin.pengaduan.pdf', compact('pengaduan'));
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
