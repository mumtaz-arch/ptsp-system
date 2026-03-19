<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('public.pengaduan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'  => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'isi'   => 'required|string|min:10',
        ]);

        Pengaduan::create($validated);

        return redirect()->route('pengaduan.create')
            ->with('success', 'Pengaduan Anda telah dikirim. Terima kasih.');
    }
}
