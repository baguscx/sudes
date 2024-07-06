<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Daftar surat sudah dikonfirmasi</h4>
        </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Pengaju Surat</th>
                        <th>NIK Pengaju</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Aksi</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @if($pengajuanSurat->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Tidak ada pengajuan.
                        </div>
                    @else
                        @foreach($pengajuanSurat as $pengajuan)
                            <tr>
                                <td class="table-plus">{{$loop->iteration}}</td>
                                <td>{{$pengajuan->users->name}}</td>
                                <!-- Mengakses data user -->
                                @foreach($pengajuan->detail_surats as $detailSurat)
                                    <td>{{$pengajuan->users->detail_users->nik}}</td>
                                    <td>{{$detailSurat->jenis_surat}}</td>
                                    @if ($pengajuan->status == 'Selesai')
                                        <td class="text-success">
                                            <span class="badge badge-success">Selesai</span>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="dropdown" >
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown" >
                                                <i class="dw dw-more"></i>
                                            </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" >
                                            <a class="dropdown-item" href="{{route('kades.pengajuan.show', $detailSurat->id)}}" >
                                                <i class="dw dw-eye"></i> Cek
                                            </a>
                                            @if($pengajuan->status == 'Selesai')
                                                <a class="dropdown-item" href="{{route('unduh.surat', $detailSurat->id)}}">
                                                    <i class="dw dw-download"></i> Download
                                                </a>
                                            @else
                                                <a class="dropdown-item">
                                                    <i class="dw dw-download"></i> Download❎
                                                </a>
                                            @endif
                                        </div>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Simple Datatable End -->
</x-app-layout>
