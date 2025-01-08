<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <style></style>
    <title>regist</title>
  </head>
  <body class="bg-white vh-100 overflow-hidden">
    <div class="container-fluid">
      <h1 class="fw-bold fs-3 ms-5 mt-2">Irpan Company</h1>
      <div class="container">
        <div class="row">
          <div class="col-12 my-5">
            <div class="row">
              <div class="col-6">
                <h1 class="fs-2" style="font-weight: 600">Registrasi</h1>
                <p class="text-black-50">Create your account!!</p>
                <form class="mt-5" id="loginForm">
                <!-- nama -->
                <div>
                    <label for="nama" class="fw-bold d-block">Nama*</label>
                    <input type="text" id="nama" required class="w-100 border-0 mb-4 ps-3" style="background-color: #d9d9d9; height: 40px; border-radius: 10px" />
                </div>
                <!-- akhir nama -->
                <!-- Username -->
                <div>
                    <label for="Username" class="fw-bold d-block">Username*</label>
                    <input type="text" id="Username" required class="w-100 border-0 mb-4 ps-3" style="background-color: #d9d9d9; height: 40px; border-radius: 10px" />
                </div>
                <!-- akhir username -->
                  <!-- confirm password -->
                  <div>
                    <label for="password" class="fw-bold d-block">Password*</label>
                    <input type="password" id="password" required class="w-100 border-0 mb-4 ps-3" style="background-color: #d9d9d9; height: 40px; border-radius: 10px" />
                  </div>

                  <div>
                    <label for="cnfrmPassword" class="fw-bold d-block">Confirm password*</label>
                    <input type="password" id="cnfrmPPassword" required class="w-100 border-0 mb-4 ps-3" style="background-color: #d9d9d9; height: 40px; border-radius: 10px" />
                  </div>
                  <!-- akhir confirm password -->
                  <!-- button -->
                  
                    <button onclick="regist()" class="d-block border-0 w-100 mt-2 text-white fw-bold" style="background-color: #6d66ff; height: 40px; border-radius: 10px">Registrasi</button>
                  
                  <!-- akhir button -->
                </form>
                <div class="row">
                  <p class="mt-5 fs-6 text-black-50">@Copyright by 22552011284_IrpanMaulana_Kelas_222w</p>
                </div>
              </div>
              <div class="col-6 mt-5">
                <img src="../asset/./3d-render-secure-login-password-illustration-removebg-preview.png" class="d-block w-100 ms-5 mt-5" alt="Image security" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    
        function regist() {
          event.preventDefault();  
        // Ambil nilai dari input
        const username = document.getElementById('Username').value;
        const password = document.getElementById('password').value;
        const nama = document.getElementById('nama').value;
        const confirm = document.getElementById('cnfrmPPassword').value;

        if(username != confirm){
          console.log("konfirmasi password salah");
        }

        console.log(username,password,nama);
        

        // Buat FormData untuk dikirim ke server
        const formData = new FormData();
        formData.append("Username", username);
        formData.append("password", password);
        formData.append("nama", nama);

        // Kirim data menggunakan Axios
        axios.post("http://localhost/IrpanMaulana/backend/registrasi.php", formData)
            .then(response => {
                // Tampilkan hasil respon server
                console.log(response.data);
                if (response.data.status === 'success') {
                    alert('Registrasi berhasil!');
                    window.location.href = './login.php'
                } else {
                    alert('Registrasi gagal: ' + response.data.message);
                }
            })
            .catch(error => {
                // Tampilkan error jika request gagal
                console.error('Error:', error);
                alert('Terjadi kesalahan, coba lagi nanti.');
            });
       }
</script>
