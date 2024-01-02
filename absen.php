<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
  exit;  
}
require("controller/UserController.php");
$user = new UserController;
$userAuth = $user->auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen</title>
    <style>
    body {
    font-family: "inter";
    }
    </style>
    <link rel="stylesheet" href="dist/output.css" type="text/css" media="screen" title="no title" charset="utf-8" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
</head>
<body class="w-full h-screen flex- flex-col overflow-hidden">
<!-- navbar -->
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
          <a href="absen.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent">Absen</a>
        </li>
        <li>
          <a href="" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Mata kuliah</a>
        </li>
        <li>
          <a href="notes.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Catatan</a>
        </li>
        <li>
          <a href="logout.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar -->

<section class="flex-1 w-full grid grid-cols-2 px-10 py-8 items-center lg:h-[85%] text-slate-600">
  <div class="w-full  flex flex-col justify-center h-auto gap-3">
    <p class="text-4xl font-bold">
        Halo, <?= $userAuth["nama"] ?>
    </p>
    <p class="font-medium">
    Untuk memudahkan proses pembelajaran hari ini, diharapkan kepada mahasiswa / mahasiswi jangan lupa absen terlebih dahulu.
    </p>
  <a href="absensi.php" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-max">

    Yuk Absen
  </a>
  </div>
  <div class="w-full">
    <img src="images/illustration-2.webp" alt="" class="w-full scale-150">
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>