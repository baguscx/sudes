<?php

namespace App\Http\Controllers;

use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FrontController extends Controller
{
    public function cek($id){
        $list = DetailSurat::where('id', $id)->first();
        $user = User::where('id', $list->users_id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        return view('front.cek', compact('list', 'user', 'ps'));
    }

    public function unduh($id){
        $list = DetailSurat::where('id', $id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        if($ps->status == 'Selesai'){
            $user = User::where('id', $list->users_id)->first();
            // $qr = QrCode::size(100)->generate('bagus');
            $pdf = Pdf::loadView('front.unduh', compact('list', 'user', 'qr'))->setPaper('a4', 'potrait');
            if($list->jenis_surat == 'Surat Keterangan Usaha'){
                return $pdf->download('Surat Keterangan Usaha - '.$list->nama.'.pdf');
            } else if($list->jenis_surat == 'Surat Keterangan Domisili'){
                return $pdf->download('Surat Keterangan Domisili - '.$list->nama.'.pdf');
            } else if($list->jenis_surat == 'Surat Keterangan Kematian'){
                return $pdf->download('Surat Keterangan Kematian - '.$list->nama.'.pdf');
            } else if($list->jenis_surat == 'Surat Keterangan Tidak Mampu'){
                return $pdf->download('Surat Keterangan Tidak Mampu - '.$list->nama.'.pdf');
            }
        } else {
            return "belom cok";
        }
    }

    public function qr(){
        phpinfo();
        $image = QrCode::format('png')
                         ->merge(public_path('logo.png'), 0.5, true)
                         ->size(500)
                         ->errorCorrection('H')
                         ->generate('A simple example of QR code!');

        return response($image)->header('Content-type','image/png');
    }
}
