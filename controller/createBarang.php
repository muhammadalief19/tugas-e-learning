<?php 
$dbHost = "127.0.0.1";
$user = "root";
$password = "";
$dbName = "db_pw_2022";

$connect = new mysqli($dbHost, $user, $password, $dbName);

class barang {

    function create($barang) {
        global $connect;
        $nama_barang = htmlspecialchars($barang["nama_barang"]);
        $stok_barang = htmlspecialchars($barang["stok_barang"]);
        $harga_barang = htmlspecialchars($barang["harga_barang"]);
        $status_barang = htmlspecialchars($barang["status_barang"]);
        $connect->query("INSERT INTO barang(nama_barang, stok_barang, harga_barang, status_barang) VALUES ('$nama_barang', '$stok_barang', '$harga_barang', '$status_barang')");
         return $connect->affected_rows;
    }

    function selectBarang() {
       global $connect;
        $result  = $connect->query("SELECT * FROM barang");
        $users = [];
        while($user = mysqli_fetch_assoc($result)){
        $users[] = $user ;
        }
        return $users;
    }
}
?>