

    <!DOCTYPE html>
    <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.css" />
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <title>Login</title>
  </head>
  <body class="bg-white vh-100 overflow-hidden">
    <div class="container-fluid">
      <h1 class="fw-bold fs-3 ms-5 mt-5">Irpan Maulana</h1>
      <div class="container">
        <div class="row">
          <div class="col-12 my-5">
            <div class="row">
              <div class="col-6">
                <h1 class="fs-2" style="font-weight: 600">Login</h1>
                <p class="text-black-50">Login to access my website :D</p>
                <form id="loginForm" class="mt-5">
                  <div>
                    <label for="user" class="fw-bold d-block">Username*</label>
                    <input type="text" id="user" required class="w-75 border-0 mb-4 ps-3" style="background-color: #d9d9d9; height: 40px; border-radius: 10px" />
                  </div>
                  <div>
                    <label for="pwd" class="fw-bold d-block">Password*</label>
                    <input type="password" id="pwd" required class="w-75 border-0 mb-4 ps-3" style="background-color: #d9d9d9; height: 40px; border-radius: 10px" />
                  </div>
                  <button onclick="login()" type="submit" class="d-block border-0 w-75 mt-2 text-white fw-bold" style="background-color: #6d66ff; height: 40px; border-radius: 10px">Login</button>
                  <a href="../frontend/registrasi.php" class="my-3 d-block">Belum punya akun?</a>
                </form>
                <div class="row mt-5">
                  <p class="mt-5 fs-6 text-black-50">@Copyright by 22552011284_IrpanMaulana_Kelas_222w</p>
                </div>
              </div>
              <div class="col-6">
                <img src="../asset/3d-render-secure-login-password-illustration-removebg-preview.png" class="d-block w-100" alt="Login image" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); 
            login();
        });

        function login() {

            const username = document.getElementById('user').value; 
            const password = document.getElementById('pwd').value;

            const formData = new FormData();
            formData.append('user', username);
            formData.append('pwd', password);
            console.log(formData.get('user'));
            console.log(formData.get('pwd'));


            axios.post('http://localhost/IrpanMaulana/backend/login.php', formData)
                .then(response => {
                    if (response.data.status === 'success') {
                        const sessionToken = response.data.session_token;
                        localStorage.setItem('session_token', sessionToken);
                        window.location.href = './index.php';
                    } else {
                        throw new Error(response.data.message || 'Login failed');
                    }
                })
                .catch(error => {
                    console.error(error);

                    const alert = document.createElement('div');
                    alert.className = 'alert alert-danger mt-3';
                    alert.innerHTML = `<i class="fas fa-exclamation-circle me-2"></i>${error.message}`;
                    document.getElementById('loginForm').appendChild(alert);
                });
        }

    </script>
  </body>
</html>
