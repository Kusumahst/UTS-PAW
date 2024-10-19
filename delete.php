<?php
session_start();
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM items WHERE id=$id");
header('Location: main.php');
exit;
?>
