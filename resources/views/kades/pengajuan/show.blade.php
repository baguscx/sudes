<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
        @include('sweetalert::alert')
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-8 mb-30">
                <div class="card-box height-100-p pd-20">
                    <div style="width: 100%; height: 100vh">
                        <iframe src="data:application/pdf;base64,{{ base64_encode($pdfContent) }}" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Aksi</h2>
                    <form action="{{route('kades.pengajuan.acc', $list->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        @if ($ps->status == 'Selesai')
                            <small>
                                Surat ini sudah selesai
                            </small>
                        @else
                            <x-button.primary-button >SETUJUI</x-button.primary-button>
                        @endif
                    </form>
                    <br>
                    <form action="{{route('kades.pengajuan.rej', $list->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        @if ($ps->status == 'Selesai')
                            <small>
                                Surat ini sudah selesai
                            </small>
                        @else
                            <x-button.primary-button width="100%">TOLAK</x-button.primary-button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
   function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("note").style.display = "none";

        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "Ditolak") {
            document.getElementById("note").style.display = "block";
        }
    }

</script>
