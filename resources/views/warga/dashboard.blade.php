<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('vendors/images/banner-img.png')}}" alt="" />
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Halo,
                        <div class="weight-600 font-30 text-blue">{{ Auth::user()->name }}</div>
                    </h4>
                    <p class="font-18 max-width-600">
                        Selamat datang! Mudahkan urusan administrasi desa Anda di sini.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><i class="bi bi-envelope-paper" style="font-size: 50px;"></i> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">4</div>
                            <div class="weight-600 font-14">Layanan Surat</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><i class="icon-copy bi bi-envelope-plus" style="font-size: 50px;"></i></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{Auth::user()->pengajuan_surats->count()}}</div>
                            <div class="weight-600 font-14">Surat yang dibuat   </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><i class="icon-copy bi bi-envelope-dash" style="font-size: 50px;"></i></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{Auth::user()->pengajuan_surats->whereIn('status', ['Diproses', 'Dikonfirmasi'])->count()}}</div>
                            <div class="weight-600 font-14">Surat Diproses</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><i class="icon-copy bi bi-envelope-check" style="font-size: 50px;"></i></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{Auth::user()->pengajuan_surats->whereIn('status', ['Selesai'])->count()}}</div>
                            <div class="weight-600 font-14">Surat Selesai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
