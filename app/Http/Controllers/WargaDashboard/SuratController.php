<?php

namespace App\Http\Controllers\WargaDashboard;

use App\Http\Controllers\Controller;
use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\SuratKematian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
// use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Http\Response;
use Spatie\Browsershot\Browsershot;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('warga.surat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $pengajuan = PengajuanSurat::create(
            [
                'users_id' => Auth::user()->id,
                'tanggal_pengajuan' => date('Y-m-d'),
                'status' => 'Diajukan',
            ]);

            if($request->jenis_surat == 'sktm'){
                DetailSurat::create([
                    'users_id' => Auth::user()->id,
                    'pengajuan_surat_id' => $pengajuan->id,
                    'nama' => $request->nama,
                    'nik' => $request->nik,
                    'gender' => $request->gender,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'warganegara' => $request->warganegara,
                    'agama' => $request->agama,
                    'pekerjaan' => $request->pekerjaan,
                    'status_pernikahan' => $request->status_pernikahan,
                    'tujuan' => $request->tujuan,
                    'alamat' => $request->alamat,
                    'jenis_surat' => 'Surat Keterangan Tidak Mampu',
                    'kode_surat' => 'sktm',
                    'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                ]);
            }

            if($request->jenis_surat == 'skk'){
                DetailSurat::create([
                    'users_id' => Auth::user()->id,
                    'pengajuan_surat_id' => $pengajuan->id,
                    'nama' => $request->nama,
                    'bin' => $request->bin,
                    'nik' => $request->nik,
                    'gender' => $request->gender,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'warganegara' => $request->warganegara,
                    'agama' => $request->agama,
                    'status_pernikahan' => $request->status_pernikahan,
                    'pekerjaan' => $request->pekerjaan,
                    'alamat' => $request->alamat,
                    'tanggal_meninggal' => $request->tanggal_meninggal,
                    'jam_meninggal' => $request->jam_meninggal,
                    'tempat_meninggal' => $request->tempat_meninggal,
                    'sebab_meninggal' => $request->sebab_meninggal,
                    'jenis_surat' => 'Surat Keterangan Kematian',
                    'kode_surat' => 'skk',
                    'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                ]);
            }

        return redirect()->route('warga.surat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pdf(String $id)
    {
        Carbon::setLocale('id');
        $list = DetailSurat::where('id', $id)->first();
        $user = User::where('id', $list->users_id)->first();
        $pdf = Pdf::loadView('warga.surat.pdf', compact('list', 'user'))->setPaper('a4', 'potrait');
        return $pdf->download('surat.pdf');

        // return view('warga.surat.pdf', compact('user'));
    }

    public function history_surat()
    {
        // dd($list);
        $pengajuanSurat = PengajuanSurat::where('users_id', Auth::user()->id)->with('detail_surats')->get();

        return view('warga.surat.history', compact( 'pengajuanSurat'));
    }
}
