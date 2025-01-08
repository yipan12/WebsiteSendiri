<?php
$database_hostname = 'localhost';
$database_password = '';
$database_username = 'root';
$database_name = 'latihan9';
$database_port = 3306;

try {
    $db = new PDO("mysql:host=$database_hostname;port=$database_port;dbname=$database_name", $database_username, $database_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mengaktifkan mode error exception
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage()); // Berhenti dan tampilkan pesan error
}
?>
