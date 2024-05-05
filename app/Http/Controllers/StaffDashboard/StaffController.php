<?php

namespace App\Http\Controllers\StaffDashboard;

use App\Http\Controllers\Controller;
use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                    ->whereIn('status', ['Diajukan'])
                    ->get();
        // $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])->get();

        return view('staff.pengajuan.index', compact('pengajuanSurat'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuanSurat = PengajuanSurat::where('id', $id)->with(['users', 'detail_surats'])->first();
        return view('staff.pengajuan.show', compact('pengajuanSurat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        return view('staff.pengajuan.edit', compact('detailSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function konfirmasi(Request $request, $id)
    {
        if($request->status == 'disetujui')
        {
            $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
            $pengajuanSurat->status = 'Diproses';
            $pengajuanSurat->save();
        } else {
            $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
            $pengajuanSurat->status = 'Ditolak';
            $pengajuanSurat->save();
        }

        return redirect(route('staff.pengajuan.index'));
    }

    public function unduhberkas($id){
        $pengajuanSurat = PengajuanSurat::where('id', $id)->with(['users', 'detail_surats'])->first();
        foreach($pengajuanSurat->detail_surats as $detailSurat):
            $berkas = $detailSurat->berkas;
        endforeach;
        return response()->download(storage_path("app/public/$berkas"));
    }

        public function list()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
                            ->whereIn('status', ['DiProses', 'Ditolak', 'Selesai'])
                            ->get();

        return view('staff.pengajuan.list', compact('pengajuanSurat'));
    }
}
