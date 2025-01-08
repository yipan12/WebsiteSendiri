<head>
<!-- DataTables CSS (latest version) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- jQuery (latest version) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JavaScript (latest version) -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap 4 (latest version) -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


</head>
<body>
    

<nav class="navbar navbar-dark sticky-top" style="background-color: #EFEFEF;">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-dark fw-bold" href="#"> <!-- Menambahkan kelas text-dark dan fw-bold -->
            IrpanMaulana
        </a>
        <div>
        <button onclick="Dashboard()" class="btn btn-outline-secondary">Dashboard</button>
        <button class="btn btn-outline-success" onclick="Tambah()">
            Tambah
        </button>
        <button onclick="Kelola()" class="btn btn-outline-info">
            kelola
        </button>
        <button class="btn btn-outline-dark" id="logoutButton" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
        </div>
    </div>
</nav>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glassmorphism">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="logoutModalLabel">
                    <i class="fas fa-exclamation-circle"></i> Confirm Logout
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-0 fs-5">Yakin mau keluar dari halaman?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger px-4" id="confirmLogoutButton">Logout</button>
            </div>
        </div>
    </div>
</div>
</body>

<style>
    .glassmorphism {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
</style>



<script>
    document.getElementById('confirmLogoutButton').addEventListener('click', function () {
        const sessionToken = localStorage.getItem('session_token');
        const formData = new FormData();
        formData.append('session_token', sessionToken);

        axios.post('http://localhost/IrpanMaulana/backend/logout.php', formData)
            .then(response => {
                if (response.data.status === 'success') {
                    localStorage.removeItem('session_token');
                    localStorage.removeItem('name');
                    window.location.href = 'login.php'; // Redirect to login after logout
                } else {
                    alert('Logout failed: ' + response.data.message);
                }
            })
            .catch(() => {
                alert('Error connecting to the server');
            });
    });

   function Tambah() {
        window.location.href = "./tambah.php";
    }
   function Dashboard() {
        window.location.href = "./dashboard.php";
    }
   function Kelola() {
        window.location.href = "./kelola.php";
    }
</script>