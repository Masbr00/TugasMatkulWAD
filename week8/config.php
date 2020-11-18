<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "keluarga";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Berhasil Terhubung ke Database";
    } catch (PDOException $e) {
        echo "Gagal Terhubung ke Database: ". $e->getMessage();
    }
?>