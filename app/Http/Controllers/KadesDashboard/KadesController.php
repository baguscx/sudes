<?php

namespace App\Http\Controllers\KadesDashboard;

use App\Http\Controllers\Controller;
use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                    ->latest()->get();

        return view('kades.pengajuan.index', compact('pengajuanSurat'));
    }

    public function show(string $id)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $list = DetailSurat::where('id', $id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        $selesaiStatus = PengajuanSurat::whereIn('status', ['Dikonfirmasi', 'Selesai'])->orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);
        $user = User::where('id', $list->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://localhost:8000/cek/surat/'.$list->id);
        $pdf = Pdf::loadView('front.unduh', compact('list', 'ps', 'user', 'qrCodes', 'indeks'))->setPaper('a4', 'potrait');

        if($list->jenis_surat == 'Surat Keterangan Usaha'){
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if($list->jenis_surat == 'Surat Keterangan Domisili'){
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if($list->jenis_surat == 'Surat Keterangan Kematian'){
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if($list->jenis_surat == 'Surat Keterangan Tidak Mampu'){
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        }

        // return view('kades.pengajuan.show', ['pdfContent' => $pdf->output()]);
    }

    public function acc(Request $request,string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
        $pengajuanSurat->status = 'Selesai';
        $pengajuanSurat->save();
        Alert::success('Sukses!', 'Surat Berhasil disetujui');
        return redirect(route('kades.pengajuan.index', $id));
    }

    public function rej(Request $request,string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
        $pengajuanSurat->keterangan = $request->keterangan;
        $pengajuanSurat->status = 'Ditolak';
        $pengajuanSurat->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('kades.pengajuan.index', $id));

    }

    public function dashboard()
    {
        $ps = PengajuanSurat::get();
        return view('kades.dashboard', compact('ps'));
    }

        public function list()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                            ->whereIn('status', ['Selesai', 'Expired'])
                            ->latest()->get();

        return view('kades.pengajuan.list', compact('pengajuanSurat'));
    }

        public function reject()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                            ->whereIn('status', ['Ditolak'])
                            ->latest()->get();

        return view('kades.pengajuan.reject', compact('pengajuanSurat'));
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


    public function ttd(Request $request, $id){
        if(Hash::check($request->ttd, Auth::user()->password))
        {
            $pengajuan = PengajuanSurat::find($id);
            $pengajuan->status = "Selesai";
            $pengajuan->save();
        } else {
            return "salah";
        }

        Alert::success('Sukses!', 'Surat Berhasil Ditandatangani');
        return redirect()->route('kades.pengajuan.list');
    }

    public function tolak(String $id, Request $request){
        $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
        $pengajuanSurat->keterangan = $request->keterangan;
        $pengajuanSurat->status = 'Ditolak';
        $pengajuanSurat->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('kades.pengajuan.reject'));
    }
}
