<h2 class="h4 mb-20">Detail - {{$detailSurat->jenis_surat}}</h2>

<table>
    <tr>
        <td width="20%">Pengaju </td>
        <td width="1%">:</td>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <td width="20%">Nik </td>
        <td width="1%">:</td>
        <td>{{ $user->detail_users->nik }}</td>
    </tr>
</table>
<br>
<table class="table table-bordered">
    <tr>
        <td width="30%">Nama </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">NIK </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat, Tanggal Lahir </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->tempat_lahir .', '. \Carbon\Carbon::parse($detailSurat->tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Jenis Kelamin </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->gender ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Agama </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->agama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Warganegara </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->warganegara ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat </td>
        <td width="1%">:</td>
        <td>{{'Dusun '. $detailSurat->dusun .', RT.'. $detailSurat->rt .', RW.'. $detailSurat->rw ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Keperluan </td>
        <td width="1%">:</td>
        <td>{{$detailSurat->tujuan ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Berkas </td>
        <td width="1%">:</td>
        <td><a href="{{ route('staff.pengajuan.berkas', ['id' => $detailSurat->id]) }}"><x-button.primary-button>Unduh Berkas</x-button.primary-button></a></td>
    </tr>
</table>
