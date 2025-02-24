<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jadwal</title>

    <!-- Custom fonts for this template-->
    <link href={{ asset("vendor/fontawesome-free/css/all.min.css") }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset("css/sb-admin-2.min.css") }} rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .loading {    
            background-color: #ffffff;
            background-image: url("{{ asset('img/spinner.gif') }}");
            background-size: 25px 25px;
            background-position:center center;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="siswa.dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="siswa.dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Siswa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="karyawan.karyawan">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Karyawan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <li class="nav-item active">
                <a class="nav-link" href="jadwal.jadwal">
                    <i class="fas fa-book-open"></i>
                    <span>Jadwal</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="pembayaran.pembayaran">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pembayaran</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="siswa.chatUser">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Chat User</span></a>
            </li>

            <hr class="sidebar-divider">
            
            <li class="nav-item">
                <a class="nav-link" href="status.status">
                    <i class="fas fa-book-open"></i>
                    <span>Status</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- START FORM -->
                     @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ url('/add') }}" method="POST">
                        @csrf
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <label for="siswa" class="col-sm-2 col-form-label">Siswa</label>
                                    <input type="text" class="form-control" name='siswa' id="siswa">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <label for="karyawan" class="col-sm-2 col-form-label">Guru</label>
                                    {{-- <input type="text" class="form-control" name='karyawan' id="karyawan"> --}}
                                    <select class="form-control" id="karyawan" name="karyawan">
                                    <script
                                            src="https://code.jquery.com/jquery-3.7.1.min.js"
                                            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                                            crossorigin="anonymous"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                        <script>
                                            $(document).ready(function (){
                                                var karyawan = $('#karyawan');
                                                $.ajax({
                                                    url: "{{ url('get-karyawan') }}",
                                                    type: "GET",
                                                    beforeSend: function () {
                                                        karyawan.addClass('loading');
                                                    },
                                                    success: function (data) {
                                                        karyawan.removeClass('loading');
                                                        karyawan.empty();
                                                        data.forEach(function(value) {
                                                            console.log('a');
                                                            karyawan.append($("<option></option>").attr("value", value.name).text(value.name));
                                                        });
                                                        karyawan.select2();
                                                    },
                                                    complete: function () {
                                                        karyawan.removeClass('loading');
                                                    },
                                                });
                                            });
                                        </script>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <label for="mata_pelajaran" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                    <input type="text" class="form-control" name='mata_pelajaran' id="mata_pelajaran">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </form>
                </div>
                <!-- AKHIR FORM -->
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src={{ asset("vendor/jquery/jquery.min.js") }}></script>
    <script src={{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ asset("vendor/jquery-easing/jquery.easing.min.js") }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ asset("js/sb-admin-2.min.js") }}></script>

    <!-- Page level plugins -->
    <script src={{ asset("vendor/chart.js/Chart.min.js") }}></script>

    <!-- Page level custom scripts -->
    <script src={{ asset("js/demo/chart-area-demo.js") }}></script>
    <script src={{ asset("js/demo/chart-pie-demo.js") }}></script>
</body>
</html>