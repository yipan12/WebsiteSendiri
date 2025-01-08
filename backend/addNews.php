<?php
include '../backend/config/koneksi.php';


$title = $_POST['title'];
$desc = $_POST['desc'];
$tanggal = $_POST['tanggal'];
// img
$namaFile = $_FILES["url_image"]['name'];
$tmp_name = $_FILES['url_image']['tmp_name'];


try{
    move_uploaded_file($tmp_name, 'archive/' .$namaFile);
    $statement = $db->prepare("INSERT INTO `news_catalog` (`id`, `title`, `desc`, `img`, `date`) VALUES (NULL, ?, ?, ?, ?)");
$statement->execute([$title, $desc, 'archive/' . $namaFile, $tanggal]);
    echo $pesan = 'data berhasil ditambah';

}catch(PDOException $e) {
    echo 'database eror' . $e->getMessage();
}catch (Exception $e) {

}


?>