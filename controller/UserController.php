<?php
$dbHost = "127.0.0.1";
$user = "root";
$password = "";
$dbName = "db_pw_2022";

$connect = new mysqli($dbHost, $user, $password, $dbName);

class UserController {
    function register($data) {
        global $connect;
        $nama = $data["nama"];
        $gender = $data["gender"];
        $birthday = $data["birthday"];
        $email = $data["email"];
        $telpon = $data["telepon"];
        $password = md5($data["password"]);

        $insert = "INSERT INTO user(nama, gender, birthday, email, telepon, password)  VALUES ('$nama', '$gender', '$birthday', '$email', '$telpon', '$password')";
        $connect->query($insert);
        return $connect->affected_rows;
    }

    function login($data) {
        global $connect;
        $email = $data["email"];
        $password = md5($data["password"]);
        $query = $connect->query("SELECT * FROM user WHERE email='".$email."' and password='".$password."' limit 1");
        $data = $query->num_rows;

        if($data > 0) {
            $key = mysqli_fetch_assoc($query);
            $_SESSION["id"] = $key["id"];
            $_SESSION["nama"] = $key["nama"];
            $_SESSION["gender"] = $key["gender"];
            $_SESSION["email"] = $key["email"];
            $_SESSION["birthday"] = $key["birthday"];
            $_SESSION["telepon"] = $key["telepon"];
            header("Location: index.php");
        }
    }

    function auth() {
        return [
            "id" => $_SESSION["id"],
            "nama" => $_SESSION["nama"],
            "email" => $_SESSION["email"],
            "birthday" => $_SESSION["birthday"],
            "telepon" => $_SESSION["telepon"],
            "gender" => $_SESSION["gender"]
        ];
    }
}
?>