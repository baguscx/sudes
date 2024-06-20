<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pelayanan Administrasi Surat</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{asset('welcome/styles.css')}}">
        <style>
            .masthead {
                min-height: 30rem;
                position: relative;
                display: table;
                width: 100%;
                height: 100vh;
                padding-top: 8rem;
                padding-bottom: 8rem;
                background: linear-gradient(
                        90deg,
                        rgba(255, 255, 255, 0.1) 0%,
                        rgba(255, 255, 255, 0.1) 100%
                    ),
                    url("http://sudes.test/welcome/img/bg-masthead.jpg");
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->

        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h3 class="mb-1 ">Pelayanan Administrasi Surat</h3>
                <h1 class="mb-1">Desa Kedungringin</h1>
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="btn btn-primary btn-xl"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="btn btn-primary btn-xl"
                    >
                        Masuk / Daftar
                    </a>
                <a class="" href="#about"></a>
                @endauth
            </div>
        </header>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script>
            /*!
            * Start Bootstrap - Stylish Portfolio v6.0.6 (https://startbootstrap.com/theme/stylish-portfolio)
            * Copyright 2013-2023 Start Bootstrap
            * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-stylish-portfolio/blob/master/LICENSE)
            */
            window.addEventListener('DOMContentLoaded', event => {

                const sidebarWrapper = document.getElementById('sidebar-wrapper');
                let scrollToTopVisible = false;
                // Closes the sidebar menu
                const menuToggle = document.body.querySelector('.menu-toggle');
                menuToggle.addEventListener('click', event => {
                    event.preventDefault();
                    sidebarWrapper.classList.toggle('active');
                    _toggleMenuIcon();
                    menuToggle.classList.toggle('active');
                })

                // Closes responsive menu when a scroll trigger link is clicked
                var scrollTriggerList = [].slice.call(document.querySelectorAll('#sidebar-wrapper .js-scroll-trigger'));
                scrollTriggerList.map(scrollTrigger => {
                    scrollTrigger.addEventListener('click', () => {
                        sidebarWrapper.classList.remove('active');
                        menuToggle.classList.remove('active');
                        _toggleMenuIcon();
                    })
                });

                function _toggleMenuIcon() {
                    const menuToggleBars = document.body.querySelector('.menu-toggle > .fa-bars');
                    const menuToggleTimes = document.body.querySelector('.menu-toggle > .fa-xmark');
                    if (menuToggleBars) {
                        menuToggleBars.classList.remove('fa-bars');
                        menuToggleBars.classList.add('fa-xmark');
                    }
                    if (menuToggleTimes) {
                        menuToggleTimes.classList.remove('fa-xmark');
                        menuToggleTimes.classList.add('fa-bars');
                    }
                }

                // Scroll to top button appear
                document.addEventListener('scroll', () => {
                    const scrollToTop = document.body.querySelector('.scroll-to-top');
                    if (document.documentElement.scrollTop > 100) {
                        if (!scrollToTopVisible) {
                            fadeIn(scrollToTop);
                            scrollToTopVisible = true;
                        }
                    } else {
                        if (scrollToTopVisible) {
                            fadeOut(scrollToTop);
                            scrollToTopVisible = false;
                        }
                    }
                })
            })

            function fadeOut(el) {
                el.style.opacity = 1;
                (function fade() {
                    if ((el.style.opacity -= .1) < 0) {
                        el.style.display = "none";
                    } else {
                        requestAnimationFrame(fade);
                    }
                })();
            };

            function fadeIn(el, display) {
                el.style.opacity = 0;
                el.style.display = display || "block";
                (function fade() {
                    var val = parseFloat(el.style.opacity);
                    if (!((val += .1) > 1)) {
                        el.style.opacity = val;
                        requestAnimationFrame(fade);
                    }
                })();
            };
        </script>
    </body>
</html>
