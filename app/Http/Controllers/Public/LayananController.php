<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\PengajuanLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layananList = Layanan::all();
        return view('public.layanan-online.index', compact('layananList'));
    }

    public function create()
    {
        $layananList = Layanan::all();
        return view('public.layanan-online.create', compact('layananList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'no_hp'       => 'required|string|regex:/^[0-9]+$/|max:20',
            'layanan_id'  => 'required|exists:layanan,id',
            'deskripsi'   => 'nullable|string',
            'file'        => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('pengajuan', 'public');
        }

        $validated['status'] = 'pending';

        PengajuanLayanan::create($validated);

        return redirect()->route('layanan-online.index')
            ->with('success', 'Pengajuan layanan berhasil dikirim. Status: Pending.');
    }
}
