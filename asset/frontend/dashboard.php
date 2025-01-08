<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Learn Auth Web Apps > Dashboard</title>
    <link href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Lora:wght@400;600&family=Hind+Madurai:wght@400;600&display=swap" rel="stylesheet">

    <style>
       html, body {
    height: 100%; 
    margin: 0; 
}

.music-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

body {
    display: flex;
    flex-direction: column; 
    background-color: #f8f9fa;
}

footer {
    background-color: #343a40;
    color: white;
    padding: 10px 0;
    text-align: center;
    margin-top: auto; 
}

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .font-lora {
            font-family: 'Lora', serif;
        }

        .font-hind-madurai {
            font-family: 'Hind Madurai', sans-serif;
        }

        .image img {
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
        }

        .image img:hover {
            transform: scale(1.1) rotate(2deg);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        }

        .card {
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

      
        .social-icon {
            font-size: 1.8rem;
            margin-right: 20px;
            color: #343a40;
            transition: color 0.3s ease;
        }

        .social-icon:hover {
            color: #007bff;
        }

        .container-fluid {
            padding: 0 15px;
        }

        .container .row {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <?php include 'header.php'; ?>
    <!-- End Header -->

    <div class="container-fluid">
        <div class="container">
            <div class="row my-md-5">
                <div class="col-md-4 image text-center">
                    <img src="../asset/IMG_20241027_192343_263.jpg" alt="Gambar saya" class="d-block rounded-3" style="width: 250px; height: 300px;">
                </div>
                <div class="col-md-5">
                    <h1 class="fs-3 font-montserrat fw-bold text-start">About Me</h1>
                    <p>Saya adalah <strong>Irpan Maulana</strong>, seorang mahasiswa yang penuh semangat dan berkomitmen untuk terus berkembang di bidang <strong>Informatika</strong>. Saat ini, saya menempuh studi di <strong>Universitas Teknologi Bandung</strong>, tempat di mana saya mengasah kemampuan teknis dan keahlian saya dalam dunia teknologi yang terus berkembang.</p>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="font-montserrat fs-5 fw-bold">Connect with Me</h3>
                            <a href="https://github.com/yipan12" target="_blank" class="social-icon"><i class="fab fa-github"></i></a>
                            <a href="https://www.instagram.com/irpaneenyu/" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/irpan-maulana-53ba03231/" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i></a>
                            <a href="https://mail.google.com/mail/u/0/?pli=1#inbox?compose=CllgCJqVxJmnnbZmJcbXMDKptbHRrDjtFDfplMMRmqFNDTstjKwhQlQwZFVGtzqmCcpvdCFPvjB" target="_blank" class="social-icon"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="music-btn" data-bs-toggle="modal" data-bs-target="#musicModal">
        <i class="fas fa-music"></i>
    </button>

    <div class="modal fade" id="musicModal" tabindex="-1" aria-labelledby="musicModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="musicModalLabel">Putar Sekarang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <audio id="audioPlayer" class="audio-player" controls>
                        <source src="../asset/sound/ANGGIS DEVAKI - KISAH TANPA DIRIMU (OFFICIAL MUSIC VIDEO).mp3" type="audio/mp3">
                        
                    </audio>
                    <p>Enjoy the music!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <strong>22552011284_IrpanMaulana_Kelas_222w</strong> | All Rights Reserved</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const name = localStorage.getItem('name');
            if (!name) {
                window.location.href = 'login.php'; // Redirect if name not found
            }

            const currentHour = new Date().getHours();
            let greeting;
            if (currentHour < 12) {
                greeting = 'Good Morning';
            } else if (currentHour < 18) {
                greeting = 'Good Afternoon';
            } else {
                greeting = 'Good Evening';
            }
            document.getElementById('welcomeMessage').textContent = `${greeting}, ${name}!`;

            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const currentDate = new Date().toLocaleDateString(undefined, options);
            document.getElementById('currentDate').textContent = `Today is ${currentDate}`;

            // Feedback form submission
            document.getElementById('feedbackForm').addEventListener('submit', function (event) {
                event.preventDefault();
                const feedback = document.getElementById('feedback').value;

                // Simulate sending feedback
                console.log('Feedback submitted:', feedback);
                alert('Thank you for your feedback!');

                // Clear the feedback form
                document.getElementById('feedback').value = '';
            });
        });
    </script>
</body>
</html>
