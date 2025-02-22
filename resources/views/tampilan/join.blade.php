<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Fun Course</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="tampilan.home" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Fun Course</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="tampilan.home" class="nav-item nav-link">Home</a>
                <a href="tampilan.about" class="nav-item nav-link">About</a>
                <a href="tampilan.course" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="tampilan.team" class="dropdown-item">Our Team</a>
                        <a href="tampilan.testimonial" class="dropdown-item">Testimonial</a>
                        <a href="belajar.view" class="dropdown-item">Pembelajaran</a>
                    </div>
                </div>
                <a href="tampilan.contact" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">JOIN RIGHT NOW</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="tampilan.home">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="tampilan.about">About</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="tampilan.contact">Contact</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Join -->

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ url('/insertdata') }}" method="POST" id="joinForm">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <label for="grade" class="col-sm-2 col-form-label">Grade</label>
                    <input type="number" class="form-control" name='grade' id="grade">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <input type="email" class="form-control" name='email' id="email">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <label for="school" class="col-sm-2 col-form-label">School</l<abel>
                    <input type="text" class="form-control" name='school' id="school">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
        {{-- 
            <script>
                document.getElementById('joinForm').addEventListener('submit', function(event) {
                    // Menghentikan submit form agar tidak langsung di-submit secara default
                    event.preventDefault();
                    
                    // Lakukan AJAX request atau operasi lain jika diperlukan
                
                    // Setelah operasi selesai, redirect ke halaman utama
                    window.location.href = '{{ url('tampilan.home') }}';,
                });
            </script> --}}
        </div>
    </form>
    <!-- Join -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>