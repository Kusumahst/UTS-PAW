<?php
session_start();
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM items WHERE id=$id");

if ($result->num_rows > 0) {
    $item = $result->fetch_assoc();
    $target_file = $item['image'];
} else {
    echo "Item tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Detail Item</h2>
    <p><b>Nama      :</b> <?= htmlspecialchars($item['name']) ?></p>
    <p><b>Deskripsi :</b> <?= htmlspecialchars($item['description']) ?></p>
    <p><b>Harga     :</b> <?= htmlspecialchars($item['price']) ?></p>

    <?php if ($item['image']): ?>
        <img src="<?= htmlspecialchars($target_file); ?>" alt="Item Image" width="300px"class="img">
    <?php else: ?>
        <p>Gambar tidak tersedia.</p>
    <?php endif; ?>

    <p></P>
    <a href="main.php">Kembali</a>
</body>
</html>