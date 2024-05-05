<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-8 mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Detail</h2>
                    <p>Yang mengajukan : <b>{{$pengajuanSurat->users->name}} ( {{$pengajuanSurat->users->detail_users->nik}} )</b></p>
                    @foreach($pengajuanSurat->detail_surats as $detailSurat)
                        <p>Jenis Surat : <b>{{$detailSurat->jenis_surat}} ( {{$detailSurat->kode_surat}} )</b></p>
                        @if($detailSurat->kode_surat == 'skk')
                            <x-detail-surat.skk :pengajuanSurat="$pengajuanSurat"/>
                        @elseif($detailSurat->kode_surat == 'sktm')
                            <x-detail-surat.sktm :pengajuanSurat="$pengajuanSurat"/>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Aksi</h2>
                    <a href="{{route('staff.pengajuan.edit', $detailSurat->id)}}" class="col-md-12 mb-3 btn btn-primary"> <i class="dw dw-edit2"></i> Edit</a>
                    <hr>
                    <form action="{{route('staff.pengajuan.confirm', $pengajuanSurat->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-12">
                                <select
                                    class="custom-select2 form-control"
                                    name="status"
                                    style="width: 100%; height: 38px"
                                    onchange="showCard(this.value)"
                                >
                                    <option value="">Pilih Konfirmasi</option>
                                    <option value="disetujui">Setujui</option>
                                    <option value="ditolak">Tolak</option>
                                    <!-- Tambahkan opsi untuk negara bagian lain di sini -->
                                </select>
                                <div class="mt-3" id="ket" style="display: none;">
                                    <small>keterangan:</small>
                                    <textarea name="alamat" class="form-control"></textarea>
                                </div>
                                    <x-button.primary-button class="mt-3 col-md-12">Submit</x-button.primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("ket").style.display = "none";
        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "tolak") {
            document.getElementById("ket").style.display = "block";
        }
        // Tambahkan else if untuk negara bagian lain di sini
    }
</script>
