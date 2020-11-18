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
        $result = $conn->query('SELECT keluarga.id, keluarga.nama, status_keluarga.status FROM keluarga, status_keluarga WHERE keluarga.id_status = status_keluarga.id');
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
        <button type="button" class="btn btn-primary btn-md mt-3" data-toggle="modal" data-target="#myModal">Tambah Data</button>
        <!-- end of button -->

        <!-- Tabel Data -->
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
                    try {

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<th scope="row">';
                            echo $row['id'];
                            echo '</th>';
                            
                            echo '<td>';
                            echo $row['nama'];
                            echo '</td>';

                            echo '<td>';
                            echo $row['status'];
                            echo '</td>';

                            echo '<td>';
                            ?> <!-- POTONG DISINI BUAT LINK AKSI -->
                            <a href="update.php?name=<?php echo $row['nama']; ?>">Update Data</a> 
                            || <a href="hapus.php?name=<?php echo $row['id']; ?>">Delete</a>
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
        <!-- end of tabel data -->

        <!-- MODAL FOR CREATE-->
        <form action="tambah.php" action="get">
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal -->
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-light">
                            <h5 class="modal-title" style="text-align:left">Tambah Data Keluarga</h5>
                            <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label>No/ID</label>
                                <input type="number" name="id" class="form-control"></input>
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control"></input>
                            </div>

                            <div class="form-group">
                            <label>Status</label>
                            <select name="statusnya" class="form-control">
                                <option value ="1">Orang Tua</option>
                                <option value ="2">Saudara Kandung</option>
                                <option value ="3">Paman / Om</option>
                                <option value ="4">Bibi / Tante</option>
                                <option value ="5">Bude</option>
                                <option value ="6">Pakde</option>
                                <option value ="7">Eyang Putri</option>
                                <option value ="8">Eyang Kangkung</option>
                                <option value ="9">Saudara Sepupu</option>
                                <option value ="10">Anak</option>
                            </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-md" name="submit" value="submit">Tambah</button>
                            <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    <!-- end of konten modal -->
                </div>
            </div>
        </form>
        <!-- end of MODAL FOR CREATE -->
        
    </div>
    <!-- end of content -->
</body>
</html>