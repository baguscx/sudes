<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Detail User</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <center>
                                @if (isset($detailuser->photo))
                                    <img src="{{ asset('storage/' . $detailuser->photo) }}" alt="photo" class="img-thumbnail" style="width: 150px; height: 150px;">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="photo" class="img-thumbnail" style="width: 150px; height: 150px;">
                                @endif
                            </center>
                            <tbody>
                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $detailuser->nik ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $user->name ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>TTL</td>
                                    <td>{{ $detailuser->born_place ?? 'Belum Diisi' }}, {{ $detailuser->born_date ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $detailuser->address ?? 'Belum Diisi' }}, RT {{ $detailuser->rt ?? 'Belum Diisi' }}, RW {{ $detailuser->rw ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $detailuser->gender ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $detailuser->religion ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pernikahan</td>
                                    <td>{{ $detailuser->status_perkawinan ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>{{ $detailuser->pekerjaan ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan</td>
                                    <td>{{ $detailuser->kewarganegaraan ?? 'Belum Diisi' }}</td>
                                </tr>
                                <tr>
                                    <td>KTP</td>
                                    <td>
                                        @if (isset($detailuser->ktp))
                                            <a href="{{ asset('storage/' . $detailuser->ktp) }}" download>Download KTP</a>
                                        @else
                                            Belum Diisi
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <form action="{{route('pengguna-baru.konfirmasi', $detailuser->id)}}" method="post">
                            @csrf
                            <button class="btn btn-success align-item-center"> Setujui Pendaftaran </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
