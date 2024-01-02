<?php
class AbsenController {
    function create($id) {
        global $connect;
        date_default_timezone_set("ASIA/JAKARTA");
        $time = date('H:i:s');
        $date = date('Y/m/d');
        $status = "";
        if ($time < '08:30:00') {
            $status = '1';
        } else {
            $status = '0';
        }
        
        $query = "INSERT INTO absen(id_user, jam_masuk, tanggal, status_absen) VALUES ('$id', '$time', '$date', '$status')";
        $connect->query($query);

        return $connect->affected_rows;
    }

    function absenCheck($id) {
        global $connect;
        date_default_timezone_set("ASIA/JAKARTA");
        $date = date('Y/m/d');
        $query = "SELECT * FROM absen WHERE id_user='$id' && tanggal='$date'";
        $result = $connect->query($query);
        $absens = [];
        while($absen = mysqli_fetch_assoc($result)){
            $absens[] = $absen ;
        }
        if (count($absens) > 0 ) {
            return true;
        } else {
            return false;
        }
    }


    function setGoHome($id) {
        global $connect;
        date_default_timezone_set("ASIA/JAKARTA");
        $date = date('Y/m/d');
        $time = date('H:i:s');
        $query = "UPDATE absen SET jam_keluar='$time' WHERE id_user='$id' && tanggal='$date'";
        $connect->query($query);

        return $connect->affected_rows;
    }

    function getAbsenUser($id) {
        global $connect;
        $query = "SELECT * FROM absen INNER JOIN user ON absen.id_user=user.id WHERE id_user='$id'";
        $result = $connect->query($query);
        $absensUser = [];
        while($absenUser = $result->fetch_assoc()){
            $absensUser[] = $absenUser;
        }
        return $absensUser;
    }
}
?> 