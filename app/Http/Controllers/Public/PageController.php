<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() { return view('public.landing'); }
    public function profil() { return view('public.profil'); }
    public function layanan() { return view('public.layanan'); }
    public function kontak() { return view('public.kontak'); }
}
