<?php

namespace App\Http\Controllers\WargaDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $suratmu = Auth::user()->pengajuan_surats()->with('detail_surats')->latest()->first();
        return view('warga.dashboard', compact('suratmu'));
    }
}
