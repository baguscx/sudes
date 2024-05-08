<?php

namespace App\Http\Controllers;

use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
// use PDF;
// use Elibyy\TCPDF\Facades\TCPDF;
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
            $qrCodes = QrCode::size(120)->generate('https://localhost:8000/cek/surat/'.$list->id);
            $pdf = Pdf::loadView('front.unduh', compact('list', 'user', 'qrCodes'))->setPaper('a4', 'potrait');
            if($list->jenis_surat == 'Surat Keterangan Usaha'){
                return $pdf->download('Surat Keterangan Usaha - '.$list->nama.'.pdf');
            } else if($list->jenis_surat == 'Surat Keterangan Domisili'){
                return $pdf->download('Surat Keterangan Domisili - '.$list->nama.'.pdf');
            } else if($list->jenis_surat == 'Surat Keterangan Kematian'){
                return $pdf->download('Surat Keterangan Kematian - '.$list->nama.'.pdf');
            } else if($list->jenis_surat == 'Surat Keterangan Tidak Mampu'){
                return $pdf->download('Surat Keterangan Tidak Mampu - '.$list->nama.'.pdf');
            }   else {
            return "belom cok";
        }
    }
    }

    public function qr(){
        // phpinfo();


        // QRcode::png('https://localhost:8000/cek/surat/', 'qr.png');

        // $qrCodes = [];
        // $qrCodes = QrCode::size(120)->generate('https://www.binaryboxtuts.com/');
        // $qrCodes['changeColor'] = QrCode::size(120)->color(255, 0, 0)->generate('https://www.binaryboxtuts.com/');
        // $qrCodes['changeBgColor'] = QrCode::size(120)->backgroundColor(255, 0, 0)->generate('https://www.binaryboxtuts.com/');

        // $qrCodes['styleDot'] = QrCode::size(120)->style('dot')->generate('https://www.binaryboxtuts.com/');
        // $qrCodes['styleSquare'] = QrCode::size(120)->style('square')->generate('https://www.binaryboxtuts.com/');
        // $qrCodes['styleRound'] = QrCode::size(120)->style('round')->generate('https://www.binaryboxtuts.com/');

        // $qrCodes['withImage'] = QrCode::size(200)->format('png')->merge('/public/logo.png', .4)->generate('https://www.binaryboxtuts.com/');

        // return view('qrcode', compact('qrCodes'));
    }

    public function preview(){
        $dompdf = new Dompdf(['pdfBackend' => 'GD']);
        $dompdf->loadHtml("<h1>asu</h1>");
        $dompdf->render();
        $dompdf->stream("asu.pdf", array("Attachment" => false));
    }

}

// $image = QrCode::format('png')
//                          ->merge(public_path('images/1644463030.png'), 0.5, true)
//                          ->size(500)
//                          ->errorCorrection('H')
//                          ->generate('A simple example of QR code!');

//         return response($image)->header('Content-type','image/png');
