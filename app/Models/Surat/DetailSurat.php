<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSurat extends Model
{
    use HasFactory;

        protected $fillable = [
            'users_id',
            'pengajuan_surat_id',
            'nomor_surat',
            'tanggal_surat',
            'nama',
            'nik',
            'nkk',
            'gender',
            'agama',
            'tempat_lahir',
            'tanggal_lahir',
            'warganegara',
            'pendidikan',
            'pekerjaan',
            'status_pernikahan',
            'alamat',
            'ketua',
            'bin',
            'tanggal_meninggal',
            'jam_meninggal',
            'tempat_meninggal',
            'sebab_meninggal',
            'nama_instansi',
            'jurusan',
            'semester',
            'mulai_usaha',
            'alamat_usaha',
            'tujuan',
            'alasan_pindah',
            'keterangan',
            'jenis_surat',
            'kode_surat',
            'berkas'
        ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
    public function pengajuan_surats(){
        return $this->belongsTo('App\Models\Surat\PengajuanSurat', 'pengajuan_surat_id', 'id');
    }
}
