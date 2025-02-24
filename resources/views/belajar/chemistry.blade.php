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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Video</title>
    <script src="https://cdn.jsdelivr.net/npm/fuse.js@6.6.2"></script>
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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="tampilan.team" class="dropdown-item">Our Team</a>
                        <a href="tampilan.testimonial" class="dropdown-item">Testimonial</a>
                        <a href="tampilan.chat" class="dropdown-item">Chat</a>
                        <a href="belajar.view" class="dropdown-item active">Pembelajaran</a>
                    </div>
                </div>
                <a href="tampilan.contact" class="nav-item nav-link">Contact</a>
            </div>
            <a href="tampilan.login" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Pilihan Belajar -->
    <input type="text" id="search" placeholder="Cari video..." onkeyup="searchVideo()">
    <div id="video-list"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const videos = [
                { title: "Introduction to Ionic Bonding and Covalent Bonding", url: "https://www.youtube.com/embed/S_k0kr2eZSQ" },
                { title: "Polar and Nonpolar Molecules", url: "https://www.youtube.com/embed/4ykSzYl_4vI" },
                { title: "SPDF orbitals Explained - 4 Quantum Numbers, Electron Configuration, & Orbital Diagrams", url: "https://www.youtube.com/embed/CP35NuspGlk" },
                { title: "The Periodic Table: Atomic Radius, Ionization Energy, and Electronegativity", url: "https://www.youtube.com/embed/hePb00CqvP0" },
                { title: "Introduction to Balancing Chemical Equations", url: "https://www.youtube.com/embed/e_C-V5vJv80" },
                { title: "VSEPR Theory - Basic Introduction", url: "https://www.youtube.com/embed/DBrq31w8vC4" },
                { title: "Sigma and Pi Bonds Explained, Basic Introduction, Chemistry", url: "https://www.youtube.com/embed/pT8nrBrTOm4" },
                { title: "Valence Bond Theory & Hybrid Atomic Orbitals", url: "https://www.youtube.com/embed/Vqx9a2aU99c" },
                { title: "Avogadro's Number, The Mole, Grams, Atoms, Molar Mass Calculations", url: "https://www.youtube.com/embed/74-X94OP2XI" },
                { title: "Oxidation and Reduction Reactions Basic", url: "https://www.youtube.com/embed/dF5lB7gRtcA" },
            ];
https://youtu.be/CP35NuspGlk
            function displayVideos(videoArray) {
                const container = document.getElementById("video-list");
                container.innerHTML = "";
                videoArray.forEach(video => {
                    container.innerHTML += `<div>
                        <p>${video.title}</p>
                        <iframe width="560" height="315" src="${video.url}" frameborder="0" allowfullscreen></iframe>
                    </div>`;
                });
            }

            const fuse = new Fuse(videos, { keys: ['title'], threshold: 0.3 });
            
            window.searchVideo = function() {
                const query = document.getElementById("search").value;                                                             
                const results = query ? fuse.search(query).map(result => result.item) : videos;
                displayVideos(results);
            };
            
            displayVideos(videos); // Tampilkan semua video saat pertama kali dimuat
        });
    </script>
    
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