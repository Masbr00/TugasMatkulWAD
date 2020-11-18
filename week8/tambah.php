<?php
    include ('config.php');
    if (isset($_GET['submit'])) {
        $name = $_GET['nama'];
        $status = $_GET['statusnya'];
        try {
            $sql = "INSERT INTO keluarga (nama, id_status) VALUES ('$name','$status')";
            $conn->exec($sql);
            echo "Berhasil di tambah";
            header("location:index.php");
        } catch (PDOExecption $e) {
            echo 'Gagal';
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn=null;
    }
?>