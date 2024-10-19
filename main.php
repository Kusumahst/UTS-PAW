<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$result = $conn->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
<body>
    <h2>Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Silakan tambahkan item dengan klik di bawah ini:</p>
    <a href="insert.php">Tambahkan Item</a>
    <a href="logout.php">Logout</a>

    <h3>Daftar Item:</h3>
    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama Item</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Opsi Pilihan</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                <?php if (!empty($row['image'])): ?>
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Gambar Item" width="100px">
                    <?php else: ?>
                        <p>Gambar tidak tersedia.</p>
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td class="description"><?php echo htmlspecialchars($row['description']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td>
                    <a class="bttn" href="detail.php?id=<?php echo $row['id']; ?>">Detail</a>
                    <a class="bttn" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a class="bttn" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>