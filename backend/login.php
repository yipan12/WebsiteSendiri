<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include '../backend/config/koneksi.php';

$username = $_POST['user'] ?? null;
$password = $_POST['pwd'] ?? null;

if (isset($username) && isset($password)) {
    // Mengambil data pengguna dari database berdasarkan username
    $statement = $db->prepare("SELECT id, username, password FROM user WHERE username = ?");
    $statement->execute([$username]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Verifikasi kata sandi dengan menggunakan password_verify() jika password di-hash menggunakan password_hash()
    if ($user && password_verify($password, $user['password'])) {
        // Jika verifikasi berhasil, buat token sesi baru
        $session_token = bin2hex(random_bytes(16));

        // Perbarui token sesi di database
        $updateStatement = $db->prepare("UPDATE user SET session_token = ? WHERE id = ?");
        $updateStatement->execute([$session_token, $user['id']]);

        // Mengembalikan respons JSON sukses dengan token sesi
        echo json_encode(['status' => 'success', 'session_token' => $session_token]);
    } else {
        // Jika verifikasi gagal, kirim pesan kesalahan
        echo json_encode(['status' => 'error', 'message' => 'Kredensial tidak valid']);
    }
} else {
    // Jika permintaan tidak valid, kirim pesan kesalahan
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
}
?>