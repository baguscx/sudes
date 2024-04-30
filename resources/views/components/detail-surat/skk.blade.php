<table class="table table-bordered">
    @foreach($pengajuanSurat->detail_surats as $detailSurat)
        <tr>
            <th scope="col" colspan="2" style="text-align: center;">Informasi</th>
        </tr>
        <tr>
            <td >Nama</td>
            <td>{{$detailSurat->nama ?? ''}}</td>
        </tr>
        <tr>
            <td>Bin/Binti</td>
            <td>{{$detailSurat->bin ?? ''}}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>{{$detailSurat->nik ?? ''}}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>{{$detailSurat->tempat_lahir .', '. \Carbon\Carbon::parse($detailSurat->tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{{$detailSurat->gender ?? ''}}</td>
        </tr>
        <tr>
            <td>Warganegara / Agama</td>
            <td>{{$detailSurat->warganegara .' / '. $detailSurat->agama ?? ''}}</td>
        </tr>
        <tr>
            <td>Status Pernikahan</td>
            <td>{{$detailSurat->status_pernikahan ?? ''}}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>{{$detailSurat->pekerjaan ?? ''}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{$detailSurat->alamat ?? ''}}</td>
        </tr>
        <tr>
            <th scope="col" colspan="2" style="text-align: center;">Informasi Kematian</th>
        </tr>
        <tr>
            <td>Jam & Tanggal Meninggal</td>
            <td>{{\Carbon\Carbon::parse($detailSurat->jam_meninggal)->format('H:i') .', '. \Carbon\Carbon::parse($detailSurat->tanggal_meninggal)->isoFormat('D MMMM YYYY') ?? ''}}</td>
        </tr>
        <tr>
            <td>Tempat Meninggal</td>
            <td>{{$detailSurat->tempat_meninggal}}</td>
        </tr>
        <tr>
            <td>Sebab Meninggal</td>
            <td>{{$detailSurat->sebab_meninggal}}</td>
        </tr>
        <tr>
            <td>Berkas</td>
            <td><a href="{{ route('unduh.berkas', ['id' => $detailSurat->id]) }}"><x-button.primary-button>Unduh Berkas</x-button.primary-button></a></td>
        </tr>
    @endforeach
        {{-- <td>{{$pengajuanSurat->status}}</td> --}}
</table>
