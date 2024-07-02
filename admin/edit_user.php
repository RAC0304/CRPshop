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
    $page_title = "Edit User - CRPShop";
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
                    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
                    <?php
                    include '../koneksi.php';

                    if ($koneksi->connect_error) {
                        die("Koneksi gagal: " . $koneksi->connect_error);
                    }

                    // Ambil data berdasarkan ID yang akan diedit (misalnya dari parameter GET)
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM users WHERE id = $id";
                        $result = $koneksi->query($sql);

                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                        } else {
                            echo "Data tidak ditemukan.";
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <form action="component/proses_edit.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                <div class="mb-3"><label for="FormName">Name</label><input class="form-control" name="name" id="FormName" type="text" value="<?php echo $row['name']; ?>" placeholder="Nama Pengguna" required /></div>

                                <div class="mb-3"><label for="FormEmail">Email address</label><input class="form-control" name="email" id="FormEmail" type="email" value="<?php echo $row['email']; ?>" placeholder="name@example.com" required /></div>
                                <div class="mb-3"><label for="FormName">Username</label><input class="form-control" name="username" id="FormName" type="text" value="<?php echo $row['username']; ?>" placeholder="Username" required /></div>
                                <div class="mb-3"><label for="FormPassword">Password</label><input class="form-control" name="password" id="FormPassword" value="<?php echo $row['password']; ?>" type="password" placeholder="Password" required /></div>
                                <div class="mb-3">
                                    <label for="SelectRole">Select Role</label>
                                    <select class="form-control" id="SelectRole" name="role">
                                        <?php
                                        // Pilih role
                                        if ($row['role'] == 'user') {
                                            echo '<option value="User" selected>User</option>';
                                            echo '<option value="Admin">Admin</option>';
                                        } else {
                                            echo '<option value="User">User</option>';
                                            echo '<option value="Admin" selected>Admin</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>

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

</body>

</html>