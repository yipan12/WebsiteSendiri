<nav class="navbar navbar-dark sticky-top" style="background-color: #EFEFEF;">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-dark fw-bold" href="#"> <!-- Menambahkan kelas text-dark dan fw-bold -->
            IrpanMaulana
        </a>
        <button class="btn btn-outline-dark" id="logoutButton" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
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
</script>