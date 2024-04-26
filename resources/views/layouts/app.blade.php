<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>
            @isset($title)
                {{ $title }} | Sudes
            @else
                {{config('app.name', 'Sudes')}}
            @endisset
        </title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{asset('vendors/images/apple-touch-icon.png')}}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{asset('vendors/images/favicon-32x32.png')}}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{asset('vendors/images/favicon-16x16.png')}}"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="{{url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap')}}"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/core.css')}}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{asset('vendors/styles/icon-font.min.css')}}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}"
		/>
		<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/style.css')}}" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="{{url('https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85')}}"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "{{url('https://www.googletagmanager.com/gtm.js?id=')}}" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>
        {{-- <x-loader /> --}}
        <x-header />
        <x-sidebar.right-sidebar />
        <x-sidebar.left-sidebar />
        <div class="mobile-menu-overlay"></div>
        <div class="main-container">
            {{ $slot }}
            <x-footer />
        </div>
		<!-- js -->
		<script src="{{asset('vendors/scripts/core.js')}}"></script>
		<script src="{{asset('vendors/scripts/script.min.js')}}"></script>
		<script src="{{asset('vendors/scripts/process.js')}}"></script>
		<script src="{{asset('vendors/scripts/layout-settings.js')}}"></script>
		<script src="{{asset('src/plugins/apexcharts/apexcharts.min.js')}}"></script>
		<script src="{{asset('src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
		<script src="{{asset('vendors/scripts/dashboard.js')}}"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="{{url('https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS')}}"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
