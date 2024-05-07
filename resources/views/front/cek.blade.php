<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

		<!-- Site favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{asset('vendors/images/apple-touch-icon.png')}}" />
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('vendors/images/favicon-32x32.png')}}" />
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('vendors/images/favicon-16x16.png')}}" />

		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/core.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/icon-font.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/style.css')}}" />
	</head>
	<body>

		<div class="main-container ">

			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card-box pd-30 height-100-p">
                        @if($ps)
                            <h2 class="mb-30 h4">Tanda Tangan Valid ✅</h2>
                            Ditanda tangani Oleh : {{$ps->ttd}} <br>
                			Dibuat tanggal : {{ \Carbon\Carbon::parse($ps->created_at)->translatedFormat('l, j F Y \p\u\k\u\l H:i') }} <br>
                			Expired tanggal : {{\Carbon\Carbon::parse($ps->created_at)->copy()->addMonths(1)->translatedFormat('l, j F Y \p\u\k\u\l H:i')}}
                        @else
                            <h2 class="h4">{{$kosong}}</h2>
                        @endif
					</div>
				</div>
			</div>

		</div>

		<!-- js -->
		<script src="{{asset('vendors/scripts/core.js')}}"></script>
		<script src="{{asset('vendors/scripts/script.min.js')}}"></script>
		<script src="{{asset('vendors/scripts/process.js')}}"></script>
		<script src="{{asset('vendors/scripts/layout-settings.js')}}"></script>
		<script src="{{asset('src/plugins/jQuery-Knob-master/jquery.knob.min.js')}}"></script>
		<script src="{{asset('src/plugins/highcharts-6.0.7/code/highcharts.js')}}"></script>
		<script src="{{asset('src/plugins/highcharts-6.0.7/code/highcharts-more.js')}}"></script>
		<script src="{{asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
		<script src="{{asset('src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
		<script src="{{asset('vendors/scripts/dashboard2.js')}}"></script>

	</body>
</html>
