<x-app-layout>
    <x-slot name="title">Buat Surat Baru</x-slot>
    @include('sweetalert::alert')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Buat Surat Baru</h4>
            </div>
        </div>

        <form>
            <div class="form-group row">
                <div class="col-md-12">

                    <select class="custom-select2 form-control" name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)" >
                        <option value="">Pilih Jenis Surat</option>
                        <option value="skd">Surat Keterangan Domisili (SKD)</option>
                        <option value="skk">Surat Keterangan Kematian (SKK)</option>
                        <option value="sktm">Surat Keterangan Tidak Mampu (SKTM)</option>
                        <option value="sku">Surat Keterangan Usaha (SKU)</option>
                    </select>

                </div>
            </div>
        </form>
    </div>

    <x-form-surat.skd id="skd" :detailSurat="$detailSurat"/>
    <x-form-surat.skk id="skk" :detailSurat="$detailSurat"/>
    <x-form-surat.sktm id="sktm" :detailSurat="$detailSurat"/>
    <x-form-surat.sku id="sku" :detailSurat="$detailSurat"/>

</x-app-layout>

<script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("skd").style.display = "none";
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
</script>
