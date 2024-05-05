<x-app-layout>
    <x-slot name="title">Buat Surat Baru</x-slot>

    @if($detailSurat?->kode_surat == 'skd')
        @include('warga.edit.skd')
    @elseif($detailSurat?->kode_surat == 'skk')
        @include('warga.edit.skk')
    @elseif($detailSurat?->kode_surat == 'sktm')
        @include('warga.edit.sktm')
    @elseif($detailSurat?->kode_surat == 'sku')
        @include('warga.edit.sku')
    @endif

</x-app-layout>

{{-- <script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("skk").style.display = "none";
        document.getElementById("sktm").style.display = "none";
        document.getElementById("sku").style.display = "none";

        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "skd") {
            document.getElementById("skd").style.display = "block";
        } else if (selectedValue === "skk") {
            document.getElementById("skk").style.display = "block";
        } else if (selectedValue === "sktm") {
            document.getElementById("sktm").style.display = "block";
        } else if (selectedValue === "sku") {
            document.getElementById("sku").style.display = "block";
        }
    }
</script> --}}
