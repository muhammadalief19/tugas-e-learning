<?php 
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
  exit;  
}

include_once('controller/createBarang.php');
$barang = new barang;

$barangs = $barang->selectBarang();
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

  <!-- table barang -->
  <div class="w-full flex justify-center py-10">
    <div class="w-3/4">
     <a href="tambahBarang.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Tambah Barang
     </a> 
<div class="relative overflow-x-auto py-8">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Nama Barang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Stok Barang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Harga Barang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Status Barang
                </th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($barangs as $barang): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $barang["nama_barang"] ?>
                </th>
                <td class="px-6 py-4 text-center">
                    <?= $barang["stok_barang"] ?>
                </td>
                <td class="px-6 py-4 text-center">
                <?= $barang["harga_barang"] ?>
                </td>
                <td class="px-6 py-4 flex w-full justify-center">
                <?php if($barang["status_barang"] == 1): ?>
                  <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Tersedia</span>
                <?php else:?>
                <?php endif ?>
                </td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
</div>

    </div>
  </div>
  <!-- table barang -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>