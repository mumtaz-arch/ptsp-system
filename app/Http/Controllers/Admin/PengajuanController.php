<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanLayanan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = PengajuanLayanan::with('layanan')->latest()->get();
        return view('admin.pengajuan.index', compact('pengajuan'));
    }

    public function show(PengajuanLayanan $pengajuan)
    {
        $pengajuan->load('layanan');
        return view('admin.pengajuan.show', compact('pengajuan'));
    }

    public function update(Request $request, PengajuanLayanan $pengajuan)
    {
        $validated = $request->validate([
            'status'        => 'required|in:pending,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $pengajuan->update($validated);

        return redirect()->route('admin.pengajuan.index')
            ->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
