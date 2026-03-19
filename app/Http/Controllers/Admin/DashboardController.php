<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use App\Models\PengajuanLayanan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengunjung = BukuTamu::count();
        $totalPengajuan = PengajuanLayanan::count();
        $totalPengaduan = Pengaduan::count();
        $pendingPengajuan = PengajuanLayanan::where('status', 'pending')->count();
        $pengaduanBaru = Pengaduan::where('status', 'baru')->count();

        // Monthly stats for chart (last 6 months)
        $monthlyPengunjung = BukuTamu::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->whereYear('tanggal', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        $monthlyPengajuan = PengajuanLayanan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $chartLabels = [];
        $chartPengunjung = [];
        $chartPengajuan = [];

        for ($i = 1; $i <= 12; $i++) {
            $chartLabels[] = $months[$i - 1];
            $chartPengunjung[] = $monthlyPengunjung[$i] ?? 0;
            $chartPengajuan[] = $monthlyPengajuan[$i] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalPengunjung',
            'totalPengajuan',
            'totalPengaduan',
            'pendingPengajuan',
            'pengaduanBaru',
            'chartLabels',
            'chartPengunjung',
            'chartPengajuan'
        ));
    }
}
