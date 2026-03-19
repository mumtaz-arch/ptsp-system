<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function index(Request $request)
    {
        $query = BukuTamu::query()->latest();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        $bukuTamu = $query->get();

        return view('admin.buku-tamu.index', compact('bukuTamu'));
    }

    public function exportPdf(Request $request)
    {
        $query = BukuTamu::query()->latest();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        $bukuTamu = $query->get();
        $pdf = Pdf::loadView('admin.buku-tamu.pdf', compact('bukuTamu'));

        return $pdf->download('laporan-buku-tamu.pdf');
    }
}
