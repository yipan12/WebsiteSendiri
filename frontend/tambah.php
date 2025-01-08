<?php

include("../frontend/header.php");
include("check_session.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .font {
        font-family: 'Roboto', sans-serif;
    }
    </style>
</head>
<body>
    <div class="container mt-md-3">
        <h2 class="mb-md-3 fs-3 font fw-light " >Tambah Berita <i class="material-icons">feed</i></h2>
        <form id="addNewsForm">
            <!-- title -->
            <div class="form-grup my-md-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control " id="title" name="title" required>
            </div>
            <!-- akhir title -->
            <!-- description -->
            <div class="form-grup my-md-3">
                <label for="desc">Deskripsi:</label>
                <textarea class="form-control " id="desc" name="desc" required></textarea> 
            </div>
            <!--akhir description -->
            <!-- up iamge -->
            <div class="form-grup my-md-3" >
                <label for="desc">Image:</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <!-- akhir up image -->
            <!-- button -->
             <button type="button" class="btn btn-primary w-25" onclick="addNews()"> kirim</button>
            <!--akhir button  -->
        </form>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function addNews (){
        const title = document.getElementById('title').value;
        const desc = document.getElementById('desc').value;
        const urlImageinput = document.getElementById('image');
        const url_image = urlImageinput.files[0];
        const tanggal = new Date().toISOString().split('T')[0];
        console.log(tanggal);

        let formData = new FormData();
        formData.append('title' , title);
        formData.append('desc' , desc);
        formData.append('url_image' , url_image);
        formData.append('tanggal' , tanggal);

        axios.post("http://localhost/IrpanMaulana/backend/addNews.php", formData, {
            Headers: {
                'Content-Type': 'Multipart/form-data',
            }
        })
        .then (function(response){
            console.log(response.data);
            console.log(formData);
            alert(response.data);
            window.location.href = "./kelola.php";
            document.getElementById('addNewsForm').reset();
        })
        .catch (function(eror){
            console.log(eror);
            alert('eror adding news');
        })
    }
</script>



