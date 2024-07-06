<?php

namespace App\Http\Controllers\StaffDashboard;

use App\Http\Controllers\Controller;
use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                    ->whereIn('status', ['Diproses'])
                    ->latest()->get();

        return view('staff.pengajuan.index', compact('pengajuanSurat'));
    }

    public function show(string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
        $user = User::where('id', $pengajuanSurat->users_id)->first();
        return view('staff.pengajuan.show', compact('detailSurat', 'pengajuanSurat', 'user'));
    }

    public function confirm(Request $request,string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();

        if($request->status == 'Dikonfirmasi')
        {
            $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
            $pengajuanSurat->status = 'Dikonfirmasi';
            $pengajuanSurat->save();
            Alert::success('Sukses!', 'Surat Berhasil disetujui');
            return redirect(route('staff.pengajuan.index', $id));
        } elseif ($request->status == 'Ditolak') {
            $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
            $pengajuanSurat->keterangan = $request->keterangan;
            $pengajuanSurat->status = 'Ditolak';
            $pengajuanSurat->save();
            Alert::success('Sukses!', 'Surat Berhasil ditolak');
            return redirect(route('staff.pengajuan.index', $id));

        }

    }

    public function dashboard()
    {
        $ps = PengajuanSurat::get();
        return view('staff.dashboard', compact('ps'));
    }

        public function list()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                            ->whereIn('status', ['Dikonfirmasi', 'Ditolak', 'Selesai'])
                            ->get();

        return view('staff.pengajuan.list', compact('pengajuanSurat'));
    }

    public function berkas($id){
            // Cari detail surat berdasarkan ID
        $detailSurat = DetailSurat::findOrFail($id);

        // Unduh berkas menggunakan response()->download()
        return response()->download(storage_path('app/public/' . $detailSurat->berkas));
    }
}
