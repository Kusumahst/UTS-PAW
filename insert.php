<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price']; 
    
    $direktori = "uploads/";

    $target_file = $direktori . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $conn->query("INSERT INTO items (name, description, price, image) VALUES ('$name', '$description', '$price', '$target_file')");
        header('Location: main.php');
        exit;
    } else {
        echo "Terjadi kesalahan dalam proses pengunggahan gambar";
    }   

}
?>

<html>
<head>
    <title>Detail</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Upload</h2>
    <p>Silakan masukkan item yang ingin ditambahkan</p>

    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nama Item" required>
        <input type="text" name="description" placeholder="Deskripsi Item" required>
        <input type="text" name="price" placeholder="Harga"required>
        <input type="file" name="image" required>
        <input type="submit" value="unggah">
    </form>

    <p></P>
    <a href="main.php">Kembali</a>
</body>
</html>