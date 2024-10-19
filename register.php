<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $sql->bind_param("ss", $username, $password);

    if ($sql->execute()) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: " . $sql->error;
    }
    
    $sql->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Register</h2>
    <p><b>Silakan masukkan username dan password untuk membuat akun</b></p>

    <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" required> <br><br>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required> <br><br>

        <input type="submit" value="Daftar">
    </form>
    <p>Sudah punya akun?</p>
    <a href="login.php">Masuk</a>
</body>
</html>