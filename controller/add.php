<?php 
include_once("../inc/config.php");
$nama = $_POST["nama"];
$gender = $_POST["gender"];
$birthday = $_POST["birthday"];
$email = $_POST["email"];
$telpon = $_POST["telepon"];
$password = md5($_POST["password"]);

$insert = "INSERT INTO users(nama, gender, birthday, email, telepon, password)  VALUES ('$nama', '$gender', '$birthday', '$email', '$telpon', '$password')";
$result = $connect->query($insert);

if($result) {
    echo "Success";
} else {
    echo "Failed";
}
?>