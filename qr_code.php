<?php
require('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $url = escapeshellarg($_POST['qr_url']);
    $output = shell_exec("python qr_code_generator.py $url");
    $qr_image = 'qr_downloads/' . trim($output);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate QR Code</title>
    <link rel="stylesheet" href="style.css">
</head>
<>
    <div class="title"><h2>Generate QR Code</h2></div>
    <div class="container3">
    <form method="post" action="qr_code.php">
        <label for="qr_url">Enter URL</label>
        <input type="text" id="qr_url" name="qr_url" required>
        <button type="submit">Generate QR Code</button>
    </form>
    <?php if (isset($qr_image)): ?>
        <img src="<?php echo htmlspecialchars($qr_image); ?>" alt="QR Code">
        <a href="<?php echo htmlspecialchars($qr_image); ?>" download>Download QR Code</a>
    <?php endif; ?>
    <a href="index.php">Back</a>
    </div>
</body>
</html>
