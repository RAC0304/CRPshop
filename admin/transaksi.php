<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
    $current_page = basename(__FILE__);
    $page_title = "Transaksi - CRPShop";
    ?>
    <title><?php echo $page_title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $current_page = basename(__FILE__);
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
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Packages</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="minDate">Tanggal Mulai:</label>
                                    <input type="date" class="form-control" id="minDate">
                                </div>
                                <div class="col-md-3">
                                    <label for="maxDate">Tanggal Akhir:</label>
                                    <input type="date" class="form-control" id="maxDate">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <?php
                                include '../koneksi.php'; // Sertakan file koneksi database
                                $sql = "SELECT
                                    tp.name AS package_name,
                                    tu.name AS user_name,
                                    tt.* 
                                FROM
                                    packages tp
                                JOIN
                                    transactions tt ON tp.id = tt.package_id
                                JOIN
                                    users tu ON tt.user_id = tu.id;
                                ";
                                $result = $koneksi->query($sql);

                                // Jika ada error saat menjalankan query, tampilkan pesan error dan hentikan eksekusi
                                if (!$result) {
                                    die("Error in SQL query: " . $koneksi->error);
                                }

                                ?>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                            <th>ID Player</th>
                                            <th>Total</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Dibeli</th>
                                            <th>Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                            <th>ID Player</th>
                                            <th>Total</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Dibeli</th>
                                            <th>Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $no++;
                                                echo "<tr>";
                                                echo "<td>" . $no . "</td>";
                                                echo "<td>" . $row['package_name'] . "</td>";
                                                echo "<td>" . $row['user_name'] . "</td>";
                                                echo "<td>" . $row['player_id'] . "</td>";
                                                echo "<td>" . $row['amount'] . "</td>";
                                                echo "<td>" . $row['total_price'] . "</td>";

                                                // Dropdown untuk status
                                                echo "<td>";
                                                echo "<select class='form-control status-select' data-transaction-id='" . $row['id'] . "'>";
                                                echo "<option value='pending' " . ($row['status'] == 'pending' ? 'selected' : '') . ">Pending</option>";
                                                echo "<option value='success' " . ($row['status'] == 'success' ? 'selected' : '') . ">Success</option>";
                                                echo "<option value='failed' " . ($row['status'] == 'failed' ? 'selected' : '') . ">Failed</option>";
                                                echo "</select>";
                                                echo "</td>";

                                                echo "<td>" . $row['created_at'] . "</td>";
                                                echo "<td>" . $row['payment_method'] . "</td>";
                                                echo '<td><button class="btn btn-danger btn-circle hapus-btn" data-transaction-id="' . $row['id'] . '" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-trash"></i></button>
                                                      </td>';
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>Tidak ada data Game</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus transaksi ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger" id="konfirmasiHapusBtn">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable();

            // Fungsi untuk mengubah format tanggal dd/mm/yyyy menjadi yyyy-mm-dd
            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }

            // Filter berdasarkan tanggal
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var minDate = $('#minDate').val();
                    var maxDate = $('#maxDate').val();
                    var dateColumn = data[7]; // Pastikan ini adalah index kolom tanggal yang benar

                    if (minDate === "" && maxDate === "") {
                        return true;
                    }

                    var date = formatDate(new Date(dateColumn));

                    if (minDate === "" && date <= maxDate) {
                        return true;
                    }
                    if (maxDate === "" && date >= minDate) {
                        return true;
                    }
                    if (date >= minDate && date <= maxDate) {
                        return true;
                    }
                    return false;
                }
            );

            // Terapkan filter saat input tanggal berubah
            $('#minDate, #maxDate').on('change', function() {
                table.draw();
            });
        });
    </script>
    <script>
        // JavaScript untuk menangani perubahan status
        $(document).ready(function() {
            $('.status-select').on('change', function() {
                var transactionId = $(this).data('transaction-id');
                var newStatus = $(this).val();

                // Kirim permintaan AJAX ke server untuk update status
                $.ajax({
                    url: './component/updated_status.php', // Buat file PHP terpisah untuk update
                    type: 'POST',
                    data: {
                        transactionId: transactionId,
                        newStatus: newStatus
                    },
                    success: function(response) {
                        // Tangani respons dari server jika diperlukan
                        console.log(response);
                    }
                });
            });
            // Hapus Transaksi
            $('#hapusModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang memicu modal
                var transactionId = button.data('transaction-id'); // Ambil ID transaksi dari tombol

                // Tambahkan event click ke tombol "Hapus" di modal
                $('#konfirmasiHapusBtn').off('click').on('click', function() {
                    $.ajax({
                        url: './component/hapus-transaksi.php',
                        type: 'POST',
                        data: {
                            transactionId: transactionId
                        },
                        success: function(response) {
                            // Tutup modal setelah berhasil menghapus
                            $('#hapusModal').modal('hide');
                            // Refresh halaman atau perbarui tabel secara dinamis
                            location.reload(); // Contoh: Refresh halaman
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>