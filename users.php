<?php 
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
  exit;  
}

$koneksi = mysqli_connect("localhost","root","","db_pw_2022");
$result  = mysqli_query($koneksi,"SELECT * FROM user");
$users = [];
while($user = mysqli_fetch_assoc($result)){
        $users[] = $user ;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="">
  <nav class="navbar navbar-dark navbar-expand-lg bg-dark py-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Muhammad Alief</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="barang.php">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="logout.php" class="text-style-none">Logout</a>
      </span>
    </div>
  </div>
</nav>

    <div class="container py-5">
        <a href="register.php" class="btn btn-info mb-3 text-white">
            Tambah Data
        </a>
        <table class="table table-dark table-striped-column">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthday</th>
                <th scope="col">Email</th>
                <th scope="col">Telepon</th>
            </tr>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user["nama"];?></td>
                <td><?php echo $user["gender"];?></td>
                <td><?php echo $user["birthday"];?></td>
                <td><?php echo $user["email"];?></td>
                <td><?php echo $user["telepon"];?></td>
            </tr>
            <?php endforeach ?>
        </thead>
        </table>
        <?php
          echo $_SESSION["nama"];
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>