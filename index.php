<?php
session_start();

require_once 'db.php';
if(!isset($_SESSION['email'])|| empty($_SESSION['email'])){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <title>Ana Sayfa</title>
</head>
<body class="bg-white">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card card-body bg-white mt-5">
          <h2>Kontrol Paneli <small class="text-success"><?php echo $_SESSION['email']; ?></small></h2>
          <p>Kontrol Paneline hoş geldiniz <?php echo $_SESSION['name']; ?></p>
          <p><a href="logout.php" class="btn btn-success">Çıkış Yap</a></p>
        </div>
      </div>    
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>        
</html>