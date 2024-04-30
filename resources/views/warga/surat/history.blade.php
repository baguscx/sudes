<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Data Table Simple</h4>
            <p class="mb-0">
                you can find more options
                <a
                    class="text-primary"
                    href="https://datatables.net/"
                    target="_blank"
                    >Click Here</a
                >
            </p>
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
                                <td>{{$pengajuan->status}}</td>
                                @if ($pengajuan->status == 'Diajukan')
                                    <td>
                                        <i>Sedang ditinjau</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Diproses')
                                    <td>
                                        <i>Pengajuan Diproses</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Ditolak')
                                    <td>
                                        <i>Pengajuan Ditolak</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Selesai')
                                    <td>
                                        <div class="dropdown" >
                                            <a
                                                class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#"
                                                role="button"
                                                data-toggle="dropdown"
                                            >
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div
                                                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                            >
                                                <a class="dropdown-item" href="#"
                                                    ><i class="dw dw-eye"></i> View</a
                                                >
                                                <a class="dropdown-item" href="{{route('warga.surat.pdf', $detailSurat->id)}}" ><i class="dw dw-edit2"></i> Download</a >
                                                <a class="dropdown-item" href="#"
                                                    ><i class="dw dw-delete-3"></i> Delete</a
                                                >
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
