<?php

namespace App\Http\Controllers\KadesDashboard;

use App\Http\Controllers\Controller;
use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                    ->whereIn('status', ['Dikonfirmasi'])
                    ->get();

        return view('kades.pengajuan.index', compact('pengajuanSurat'));
    }

    public function show(string $id)
    {
        $pdf = Pdf::loadView('front.pdf');

        return view('kades.pengajuan.show', ['pdfContent' => $pdf->output()]);
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
            return redirect(route('kades.pengajuan.index', $id));
        } elseif ($request->status == 'Ditolak') {
            $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
            $pengajuanSurat->keterangan = $request->keterangan;
            $pengajuanSurat->status = 'Ditolak';
            $pengajuanSurat->save();
            Alert::success('Sukses!', 'Surat Berhasil ditolak');
            return redirect(route('kades.pengajuan.index', $id));

        }

    }

    public function dashboard()
    {
        $ps = PengajuanSurat::get();
        return view('kades.dashboard', compact('ps'));
    }

        public function list()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                            ->whereIn('status', ['Selesai'])
                            ->get();

        return view('kades.pengajuan.list', compact('pengajuanSurat'));
    }

    public function berkas($id){
        // $selesaiStatus = PengajuanSurat::where('status', 'selesai')->orderBy('created_at', 'asc')->get();
        $selesaiStatus = PengajuanSurat::where('status', 'selesai')->orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);

        // Output indeks
        print_r($indeks[14]);
        // dd($selesaiStatus);
        return view('kades.pengajuan.s');
        $list = DetailSurat::where('id', $id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        $user = User::where('id', $list->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://localhost:8000/cek/surat/'.$list->id);
        $pdf = Pdf::loadView('front.unduh', compact('list', 'user', 'qrCodes'))->setPaper('a4', 'portrait');
        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/temp/bubla.pdf', $content);

    }
}
