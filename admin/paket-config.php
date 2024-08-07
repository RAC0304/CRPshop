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
    $page_title = "Manajemen Paket - CRPShop";
    ?>
    <title><?php echo $page_title; ?></title>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">

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
                    <h1 class="h3 mb-4 text-gray-800">Daftar Game dan Mata Uang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Packages</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Minimum date:</td>
                                            <td><input type="date" id="min" name="min"></td>
                                        </tr>
                                        <tr>
                                            <td>Maximum date:</td>
                                            <td><input type="date" id="max" name="max"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                                include '../koneksi.php';
                                $sql = "SELECT packages.*, currencies.name AS currency_name, currencies.symbol FROM packages INNER JOIN currencies ON packages.currency_id = currencies.id";
                                $result = $koneksi->query($sql);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Mata Uang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Dibuat</th>
                                            <th>Diubah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Mata Uang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Dibuat</th>
                                            <th>Diubah</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> <?php
                                            $no = 0;
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $no++;
                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['currency_name'] . " / " . $row['symbol'] . "</td>";
                                                    echo "<td>" . $row['amount'] . "</td>";
                                                    echo "<td>" . $row['price'] . "</td>";
                                                    echo "<td>" . $row['created_at'] . "</td>";
                                                    echo "<td>" . $row['updated_at'] . "</td>";
                                                    echo '<td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-warning btn-circle"><i class="fas fa-pen"></i></a><a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusModal" data-id="' . $row['id'] . '"><i class="fas fa-trash"></i></a></td>';
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='8'>Tidak ada data Game</td></tr>";
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal Hapus -->
            <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus game ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="" id="confirmDelete" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php include "./component/footer.php"; ?>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $('#hapusModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('#confirmDelete').attr('href', './component/hapus-game.php?id=' + id);
        });
    </script>
    <script>
        let minDate, maxDate;

        // Fungsi filter custom untuk mencari data di kolom tanggal antara dua nilai
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            let min = $('#min').val();
            let max = $('#max').val();
            let date = new Date(data[5]); // Pastikan indeks ini sesuai dengan kolom tanggal

            if ((min === "" || new Date(min) <= date) && (max === "" || date <= new Date(max))) {
                return true;
            }
            return false;
        });

        $(document).ready(function() {
            // Inisialisasi DataTables
            let table = $('#dataTable').DataTable();

            // Refilter tabel berdasarkan perubahan input tanggal
            $('#min, #max').change(function() {
                table.draw();
            });
        });
    </script>




</body>

</html>