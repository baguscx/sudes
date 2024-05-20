<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Riwayat Pengajuan</h4>
        </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Nama</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Aksi</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @if($pengajuanSurat->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Anda belum pernah mengajukan surat apapun.
                        </div>
                    @else
                        @foreach($pengajuanSurat as $pengajuan)
                        <tr>
                            <td class="table-plus">{{$loop->iteration}}</td>
                            @foreach($pengajuan->detail_surats as $detailSurat)
                                <td>{{$detailSurat->nama}}</td>
                                <td>{{$detailSurat->jenis_surat}}</td>

                                @if ($pengajuan->status == 'Diproses')
                                    <td class="text-primary">{{$pengajuan->status}}</td>
                                    <td>
                                        <i>Pengajuan Diproses</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Ditolak')
                                    <td class="text-danger">{{$pengajuan->status}}</td>
                                    <td>
                                        <i>Pengajuan Ditolak</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Dikonfirmasi')
                                    <td class="text-primary">{{$pengajuan->status}}</td>
                                    <td>
                                        <i>Menunggu Acc Kades</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Selesai')
                                    <td class="text-success">{{$pengajuan->status}}</td>
                                    <td>
                                        <div class="dropdown" >
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown" >
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" >

                                                <a class="dropdown-item" href="{{route('unduh.surat', $detailSurat->id)}}" ><i class="dw dw-download"></i> Download</a >

                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Simple Datatable End -->

</x-app-layout>
