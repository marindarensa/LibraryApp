<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Rensa Library's</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Libs -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="shortcut icon" href="{{ asset('assets/img/logo.webp') }}" type="image/x-icon">

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .hidden {
            display: none;
        }

        .form-control {
            color: #444 !important;
        }

        .form-control::placeholder {
            color: #999 !important;
        }

        .select2 {
            display: block !important;
            width: 100% !important;
            padding: 0.4375rem 0.255rem !important;
            font-size: 0.9375rem !important;
            font-weight: 400 !important;
            line-height: 1.53 !important;
            color: #444 !important;
            background-color: #fff !important;
            background-clip: padding-box !important;
            border: 1px solid #d9dee3 !important;
            appearance: none !important;
            border-radius: 0.375rem !important;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
        }

        .select2-container--default .select2-selection--single {
            border: none !important
        }

        .select2-selection__placeholder {
            color: #999 !important;
        }
    </style>
</head>

<body>


    @if (isset($layout) && $layout == false)
        @yield('content')
    @else
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('layouts.sidebar')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">

                    {{-- navigation --}}
                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar">

                        <!--  Brand demo (display only for navbar-full and hide on below xl) -->

                        <!-- ! Not required for layout-without-menu -->
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>

                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <h5 class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        @if (isset($title))
                                            {{ $title }}
                                        @endif
                                    </div>
                                </div>
                            </h5>


                            <ul class="navbar-nav flex-row align-items-center ms-auto">

                            </ul>
                        </div>
                    </nav>
                    {{-- navigation --}}

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-fluid mt-3">
                            @yield('content')
                        </div>

                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->
    @endif


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <script>
        // get url index of 2 and add class active
        var url = window.location.href.split("/")[4];
        // check if url has ? remove it and next string
        if (url) {
            url = url.split('?')[0];
            $(`.menu-item.${url}`).addClass('active');
        } else {
            $('.menu-item.dashboard').addClass('active');
        }
    </script>


    @if (session('success') || session('error'))
        @php
            $title = session('success') ? 'success' : 'error';
            $message = session('success') ? session('success') : session('error');
        @endphp

        <script>
            Swal.fire({
                title: '{{ ucfirst($title) }}',
                text: "{{ $message }}",
                icon: '{{ $title }}',
                confirmButtonColor: '#435ebe',
                confirmButtonText: 'Done',
                onConfirm: function() {
                    window.location.href = "{{ url()->current() }}";
                }
            })
        </script>
    @endif


    {{-- get error message from validate and show with sweetaler2 --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'error',
                text: "{{ $errors->first() }}",
                icon: 'error',
                confirmButtonColor: '#435ebe',
                confirmButtonText: 'Done'
            })
        </script>
    @endif

    {{-- if elemet with class delete item on click show alert when true send form --}}
    <script>
        $('.delete-item').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#435ebe',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    $(this).parent().submit();
                }
            })
        })
    </script>

    <script>
        $('.select2').select2();
    </script>
</body>

</html>
