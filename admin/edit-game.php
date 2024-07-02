<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">


    <?php
    $current_page = basename(__FILE__);
    $page_title = "Manajemen Pengguna - CRPShop";
    ?>
    <title><?php echo $page_title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include './component/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include "./component/topbar.php"; ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Data Games</h1>
                    <?php
                    include '../koneksi.php'; // Pastikan Anda sudah menghubungkan ke database

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT games.names AS game_name, games.id, games.image, games.created_at, games.updated_at, currencies.name AS currency_name, currencies.symbol 
                                FROM games 
                                INNER JOIN currencies ON games.id = currencies.game_id 
                                WHERE games.id = $id";
                        $result = $koneksi->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $game_name = $row['game_name'];
                            $image = $row['image'];
                            $currency_name = $row['currency_name'];
                            $symbol = $row['symbol'];
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <form action="component/proses_edit_game.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                <div class="mb-3">
                                    <label for="FormGameName">Nama Game</label>
                                    <input class="form-control" name="game_name" id="FormGameName" type="text" value="<?php echo $game_name; ?>" placeholder="Nama Game" required />
                                </div>
                                <div class="mb-3">
                                    <label for="FormImage">Gambar</label>
                                    <input class="form-control" name="image" id="FormImage" type="file" onchange="previewImage(event)" />
                                    <img id="preview" src="../image/<?php echo $image; ?>" alt="Preview Gambar" style="max-width: 200px; margin-top: 10px;" />
                                </div>
                                <div class="mb-3">
                                    <label for="FormCurrencyName">Nama Mata Uang</label>
                                    <input class="form-control" name="currency_name" id="FormCurrencyName" type="text" value="<?php echo $currency_name; ?>" placeholder="Nama Mata Uang" required />
                                </div>
                                <div class="mb-3">
                                    <label for="FormSymbol">Simbol</label>
                                    <input class="form-control" name="symbol" id="FormSymbol" type="text" value="<?php echo $symbol; ?>" placeholder="Simbol Mata Uang" required />
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include './component/logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>