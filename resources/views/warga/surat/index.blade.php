<x-app-layout>
    <x-slot name="title">Buat Surat</x-slot>
    <!-- Select-2 Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Buat Surat</h4>
            </div>
        </div>
        <form>
            <div class="form-group row">
                <div class="col-md-12">
                    <select
                        class="custom-select2 form-control"
                        name="state"
                        style="width: 100%; height: 38px"
                        onchange="showCard(this.value)"
                    >
                        <option value="">Pilih Surat</option>
                        <option value="skk">Surat Keterangan Kematian (SKK)</option>
                        <option value="sktm">Surat Keterangan Tidak Mampu (SKTM)</option>
                        <!-- Tambahkan opsi untuk negara bagian lain di sini -->
                    </select>
                </div>
            </div>
        </form>
    </div>
    <!-- Select-2 end -->

    <x-form-surat.sktm id="sktm" />

    <x-form-surat.skk id="skk" />

</x-app-layout>

<script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("sktm").style.display = "none";
        document.getElementById("skk").style.display = "none";
        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "sktm") {
            document.getElementById("sktm").style.display = "block";
        } else if (selectedValue === "skk") {
            document.getElementById("skk").style.display = "block";
        }
        // Tambahkan else if untuk negara bagian lain di sini
    }
</script>
