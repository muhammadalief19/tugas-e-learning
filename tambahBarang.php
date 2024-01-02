<?php 
include_once('controller/createBarang.php');
$barang = new barang;
if ( isset($_POST["submit"]) ) {

    if($_POST["stok_barang"] > 0) {
      $_POST["status_barang"] = '1';
    } else {
      $_POST["status_barang"] = '2';
    }

    // cek apakah data berhasil atau tidak 
    if( $barang->create($_POST) > 0 ){
        echo "<script>
                alert ('Data Berhasil Ditambahkan');
                document.location.href = 'barang.php';
              </script>";
    } else {
        echo "<script>
                alert ('Data Gagal Ditambahkan');
                document.location.href = 'barang.php';
              </script>";
    }
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang</title>
    <style>
        body {
        font-family: "inter";
        }
        </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
  </head>
  <body class="overflow-x-hidden">

  <!-- header -->
  <nav class="px-2 bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 py-5">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="index.php" class="flex items-center">
      <img src="images/logo-pens.png" class="h-8 mr-3 sm:h-16" alt="Flowbite Logo" />
        <p class="self-center text-xl font-bold whitespace-nowrap dark:text-white">E-Learning</p>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="index.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</a>
        </li>
        <li>
          <a href="barang.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent">Barang</a>
        </li>
        <li>
          <a href="users.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Users</a>
        </li>
        <li>
          <a href="" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Absen</a>
        </li>
        <li>
          <a href="logout.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- header -->
<!-- component -->
<div class="flex justify-center items-center w-screen h-screen bg-white">
	<!-- COMPONENT CODE -->
	<div class="container mx-auto my-4 px-4 lg:px-20">

		<form method="post" action="" class="w-full p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl shadow-2xl">
			<div class="flex">
				<h1 class="font-bold uppercase text-5xl">Tambah <br /> Barang</h1>
			</div>
			<div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
				<input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
        type="text" name="nama_barang" placeholder="Nama Barang*" />
				<input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
            type="text" name="stok_barang" placeholder="Stok Barang*" />
				<input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline col-span-2" type="text" name="harga_barang" placeholder="Harga Barang*" />
				<div class="my-2 w-max lg:w-max">
					<button class="uppercase text-sm font-bold tracking-wide bg-blue-900 text-gray-100 p-3 rounded-lg w-full 
          focus:outline-none focus:shadow-outline" name="submit">
            Tambah
          </button>
				</div>
			</form>
    </div>
    <!-- COMPONENT CODE -->
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>