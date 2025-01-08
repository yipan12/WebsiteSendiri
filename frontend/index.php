<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Cek session token
        document.addEventListener('DOMContentLoaded', function () {
            const sessionToken = localStorage.getItem('session_token');
            if (!sessionToken) {
                window.location.href = 'login.php'; // Redirect ke login jika token tidak ada
            } else {
                const formData = new FormData();
                formData.append('session_token', sessionToken);

                axios.post('http://localhost/IrpanMaulana/backend/sesion.php', formData)
                    .then(response => {
                        if (response.data.status === 'success') {
                            localStorage.setItem('name', response.data.hasil.name);
                            window.location.href = 'dashboard.php'; // Redirect ke dashboard
                        } else {
                            localStorage.removeItem('session_token');
                            window.location.href = 'login.php'; // Token invalid
                        }
                    })
                    .catch(() => {
                        alert('Error checking session');
                    });
            }
        });
    </script>
</head>

<body>
</body>

</html>