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
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Browsershot\Browsershot;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailSurat = DetailSurat::get();
        return view('warga.surat.index', compact('detailSurat'));
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
        $pengajuan = PengajuanSurat::create(
            [
                'users_id' => Auth::user()->id,
                'tanggal_pengajuan' => date('Y-m-d'),
                'status' => 'Diproses',
            ]);

            if($request->jenis_surat == 'skd'){
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
                    'jenis_surat' => 'Surat Keterangan Domisili',
                    'kode_surat' => 'skd',
                    'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'tujuan' => $request->tujuan,
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
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                ]);
            }

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
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                ]);
            }

            if($request->jenis_surat == 'sku'){
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
                    'jenis_surat' => 'Surat Keterangan Usaha',
                    'kode_surat' => 'sku',
                    'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'nama_instansi' => $request->nama_instansi,
                    'mulai_usaha' => $request->mulai_usaha,
                    'alamat_usaha' => $request->alamat_usaha,
                ]);
            }
        Alert::success('Sukses!', 'Surat Berhasil Dibuat');
        return redirect()->route('warga.surat.riwayat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        return view('warga.surat.edit', compact('detailSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $detailSurat = DetailSurat::where('id', $id)->first();
    $get_berkas = $detailSurat->berkas;
    // dd($get_berkas);
            if(isset($request->berkas)){
                $data = 'storage/'.$get_berkas;
                if (File::exists($data)) {
                    File::delete($data);
                } else {
                    File::delete('storage/app/public/'.$get_berkas);
                }
            }

            if($request->jenis_surat == 'skd'){
                DetailSurat::where('id', $id)->update([
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
                    'jenis_surat' => 'Surat Keterangan Domisili',
                    'kode_surat' => 'skd',
                    'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                ]);
            }

            if($request->jenis_surat == 'skk'){
                DetailSurat::where('id', $id)->update([
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
                    'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                ]);
            }

            if($request->jenis_surat == 'sktm'){
                DetailSurat::where('id', $id)->update([
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
                    'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                ]);
            }

            if($request->jenis_surat == 'sku'){
                DetailSurat::where('id', $id)->update([
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
                    'jenis_surat' => 'Surat Keterangan Usaha',
                    'kode_surat' => 'sku',
                    'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                    'dusun' => $request->dusun,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'nama_instansi' => $request->nama_instansi,
                    'mulai_usaha' => $request->mulai_usaha,
                    'alamat_usaha' => $request->alamat_usaha,
                ]);
            }

        Alert::success('Sukses!', 'Surat Berhasil DiEdit');
        return redirect()->route('warga.surat.riwayat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
        $detailSurat = DetailSurat::where('pengajuan_surat_id', $id)->first();
        $get_berkas = $detailSurat->berkas;
        $data = 'storage/'.$get_berkas;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/'.$get_berkas);
        }
        $pengajuanSurat->delete();
        $detailSurat->delete();
        Alert::success('Sukses!', 'Surat Berhasil Dihapus');
        return redirect()->route('warga.surat.riwayat');
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

    public function riwayat()
    {
        $pengajuanSurat = PengajuanSurat::where('users_id', Auth::user()->id)->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak'])->with('detail_surats')->latest()->get();
        return view('warga.surat.riwayat', compact( 'pengajuanSurat'));
    }

    public function draft()
    {
        $pengajuanSurat = PengajuanSurat::where('users_id', Auth::user()->id)->where('status', 'Draft')->with('detail_surats')->get();
        return view('warga.surat.draft', compact( 'pengajuanSurat'));
    }

    public function berkas($id)
    {
        $berkas = DetailSurat::where('id', $id)->first();
        // dd($berkas);
        return response()->download(storage_path("app/public/$berkas->berkas"));
    }

    public function send($id)
    {
        $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
        $pengajuanSurat->update([
            'status' => 'Diproses',
        ]);
        Alert::success('Sukses!', 'Surat Berhasil Dikirim');
        return redirect()->route('warga.surat.riwayat');
    }
}
