<?php
session_start();
include 'db.php';
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM items WHERE id=$id");
$item = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $conn->query("UPDATE items SET name='$name', description='$description', price='$price' WHERE id=$id");
    header('Location: main.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Item</h2>
    <p>Silakan melakukan perubahan pada item</p>
    <form method="POST" action="">
        <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" placeholder="Nama Item" required>
        <input type="text" name="description" value="<?= htmlspecialchars($item['description']) ?>" placeholder="Deskripsi Item" required> 
        <input type="text" name="price" value="<?= htmlspecialchars($item['price']) ?>" placeholder="Harga"required>
        <input type="submit" value="Update">
    </form>

    <p></P>
    <a href="main.php">Kembali</a>
</body>
</html>