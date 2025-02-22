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

    <title>Customer Chat</title>

    <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"></script>
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
                <a href="tampilan.about" class="nav-item nav-link active">About</a>
                <a href="tampilan.course" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="tampilan.team" class="dropdown-item">Our Team</a>
                        <a href="tampilan.testimonial" class="dropdown-item">Testimonial</a>
                        <a href="belajar.view" class="dropdown-item">Pembelajaran</a>
                    </div>
                </div>
                <a href="tampilan.contact" class="nav-item nav-link">Contact</a>
            </div>
            <a href="tampilan.join" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Chat Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div id="chat-box">
                        <input type="text" id="message-input" placeholder="Type your message here">
                        <button onclick="sendMessage()">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chat End -->

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
    <script>
        const socket = io('http://103.127.138.139:3000');
        let sessionId = null;

        // Mendapatkan session ID dari server
        socket.on('session-id', (id) => {
            sessionId = id;
            console.log('Your session ID:', sessionId);
        });

        // Menerima pesan
        socket.on('receive-message', (data) => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML += `<p><strong>${data.sender}:</strong> ${data.message}</p>`;
        });

        // Mengirim pesan ke server
        function sendMessage() {
            const message = document.getElementById('message-input').value;
            if (sessionId) {
                socket.emit('send-message', { sessionId, message });
                document.getElementById('message-input').value = ''; // Reset input
            } else {
                console.error('No session ID available.');
            }
        }
    </script>
</body>

</html>