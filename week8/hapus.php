<?php 
    include ('config.php');
    
    try {
        $sql = "DELETE FROM keluarga WHERE nama='" . $_GET['name'] . "'";
        $conn->exec($sql);
        echo "Berhasil di hapus";
        header("location:index.php");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>