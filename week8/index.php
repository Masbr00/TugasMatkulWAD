<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <!-- koneksi db -->
    <?php
        include ('config.php');
        $result = $conn->query('SELECT keluarga.nama, status_keluarga.status FROM keluarga, status_keluarga WHERE keluarga.id_status = status_keluarga.id');
    ?>
    <!-- end of koneksi db -->
    <title>Keluarga</title>
</head>
<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Keluarga <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <a class="nav-link disabled" href="#">@MasBr00</a>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- content -->
    <div class="container mt-3 mx-auto bg-white border rounded">

        <!-- button -->
        <a class="btn btn-primary mt-3" href="#" role="button">Tambah Data</a>
        <!-- end of button -->

        <div class="my-3 table-responsive">
            <table class="table table-sm table-bordered table-hover" style="text-align:center">
                <thead class="thead-dark"> <!-- head table -->
                    <tr>
                        <th scope="col">No</th> 
                        <th scope="col">Nama</th> 
                        <th scope="col">Status</th> 
                        <th scope="col">Action</th> 
                    </tr>
                </thead> <!-- end of head table -->
                <tbody>
                <?php
                    $i = 0;
                    try {

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<th scope="row">';
                            echo $i=$i+1;
                            echo '</th>';
                            
                            echo '<td>';
                            echo $row['nama'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['status'];
                            echo '</td>';

                            echo '<td>';
                            ?> <!-- POTONG DISINI BUAT LINK AKSI -->
                            <a href="hapus.php?name=<?php echo $row['nama']; ?>">Delete</a>
                            <?php // SAMBUNG DISNI UNTUK LANJUT PHP
                            echo '</td>';
                            echo '</tr>';
                        }
                    } catch (PDOException $e) {
                        echo "Gagal: " . $e->getMessage();
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end of content -->
</body>
</html>