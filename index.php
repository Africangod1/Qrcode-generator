<?php
require('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Welcome to the African God's Qr_Code and Youtube Downloader</h1>
    <a href="qr_code.php">Generate QR Code</a>
    <a href="logout.php">Logout</a>
</body>
</html>
