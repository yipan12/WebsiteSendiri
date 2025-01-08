<?php
// Include file koneksi database
include '../backend/config/koneksi.php';

try {
    // Query untuk mengambil semua data dari tabel news_catalog
    $sql = "SELECT * FROM news_catalog";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Tambahkan nomor urut ke data
    foreach ($data as $index => &$row) {
        $row['no'] = $index + 1;
        // Pastikan path img benar
        $row['img'] = !empty($row['img']) ? 'backend/' . $row['img'] : null;
    }

    // Kembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    // Tangani kesalahan
    echo json_encode(["error" => "Query gagal: " . $e->getMessage()]);
}
?>
