<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
  exit;  
}

require("controller/AbsenController.php");
require("controller/UserController.php");
$userController = new UserController;
$absenController = new AbsenController;
$userAuth = $userController->auth();
$notes = $absenController->getAbsenUser($userAuth["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
</head>
<body class="w-fullflex flex-col overflow-x-hidden">
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
          <a href="absen.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Absen</a>
        </li>
        <li>
          <a href="" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Mata kuliah</a>
        </li>
        <li>
          <a href="notes.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent">Catatan</a>
        </li>
        <li>
          <a href="logout.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar -->

<div class="w-full h-[85vh] py-10 grid grid-cols-2 gap-10 px-7 text-slate-500">
  <div class="w-full h-auto flex justify-center items-center">
    <img src="images/illustration-5.webp" alt="" class="w-4/5">
  </div>
  <div class="w-full h-auto flex flex-col">
    <div class="w-full h-24">
      <p class="text-center font-extrabold text-3xl">Riwayat Absen</p>
    </div>
    <div class="w-full flex-1 flex justify-center">   
    <div class="w-full h-max relative overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left  text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Jam Masuk
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($notes as $note): ?>
            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $note["nama"] ?>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $note["jam_masuk"] ?>
                </td>
                <td class="px-6 py-4">
                <?= $note["tanggal"] ?>
                </td>
                <td class="px-6 py-4 flex justify-center">
                  <?php if($note["status_absen"] === '1'): ?>
                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Hadir</span>
                  <?php else: ?>
                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Terlambat</span>
                  <?php endif ?>
                </td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
</div>
	  </div>
</div>
    </div>
  </div>
</div>
</body>
</html>