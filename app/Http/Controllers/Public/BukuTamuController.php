<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function create()
    {
        return view('public.buku-tamu');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'instansi'  => 'nullable|string|max:255',
            'no_hp'     => 'required|string|regex:/^[0-9]+$/|max:20',
            'keperluan' => 'required|string|min:10',
            'tujuan'    => 'required|string|max:255',
        ]);

        $validated['tanggal'] = now()->toDateString();
        $validated['jam'] = now()->format('H:i');

        BukuTamu::create($validated);

        return redirect()->route('buku-tamu.create')
            ->with('success', 'Terima kasih! Data kunjungan Anda telah dicatat.');
    }
}
