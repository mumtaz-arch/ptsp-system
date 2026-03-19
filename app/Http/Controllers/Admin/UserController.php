<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function exportPdf()
    {
        $users = User::all();
        $pdf = Pdf::loadView('admin.users.pdf', compact('users'));
        return $pdf->download('users-report.pdf');
    }
}
