<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KontenController extends Controller
{
    public function index()
    {
        $konten = Konten::latest()->get();
        return view('admin.konten.index', compact('konten'));
    }

    public function create()
    {
        return view('admin.konten.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'tipe'  => 'required|in:profil,berita',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('konten', 'public');
        }

        Konten::create($validated);

        return redirect()->route('admin.konten.index')
            ->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit(Konten $konten)
    {
        return view('admin.konten.edit', compact('konten'));
    }

    public function update(Request $request, Konten $konten)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'tipe'  => 'required|in:profil,berita',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('konten', 'public');
        }

        $konten->update($validated);

        return redirect()->route('admin.konten.index')
            ->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy(Konten $konten)
    {
        $konten->delete();

        return redirect()->route('admin.konten.index')
            ->with('success', 'Konten berhasil dihapus.');
    }
}
