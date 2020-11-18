<?php
    include ('config.php');
    if (isset($_GET['update'])) {
        $namaasli = $_GET['namaasli'];
        $name = $_GET['nama'];
        $status = $_GET['statusnya'];
        try {
            $sql = "UPDATE keluarga SET nama='$name', id_status='$status' WHERE nama='$namaasli'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " berhasil di-Update";
            header("location:index.php");
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
?>