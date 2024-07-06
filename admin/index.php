<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="../img/logo.png">
  <meta name="author" content="" />

  <?php
  include "../koneksi.php";
  $current_page = basename(__FILE__);
  $page_title = "Dashboard - CRPShop";
  ?>
  <title><?php echo $page_title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
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
        include "./component/topbar.php";
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <?php
                      $sql = "SELECT COUNT(*) as total_user from users where role='user'";
                      $result = $koneksi->query($sql);
                      if ($result->num_rows > 0) {
                        // Mendapatkan total pengguna dari hasil query
                        $row = $result->fetch_assoc();
                        $total_user = $row['total_user'];
                      } else {
                        $total_user = 0;
                      }
                      ?>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total User
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $total_user; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <?php
                      $sql = "SELECT COUNT(*) as total_game from games";
                      $result = $koneksi->query($sql);
                      if ($result->num_rows > 0) {
                        // Mendapatkan total game dari hasil query
                        $row = $result->fetch_assoc();
                        $total_games = $row['total_game'];
                      } else {
                        $total_games = 0;
                      }

                      ?>
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Games
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $total_games; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gamepad fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pending Requests
                      </div>
                      <?php
                      $sql = "SELECT status, COUNT(*) as pending from transactions where status='pending'";
                      $result = $koneksi->query($sql);
                      if ($result->num_rows > 0) {
                        // Mendapatkan total game dari hasil query
                        $row = $result->fetch_assoc();
                        $total_pending = $row['pending'];
                      } else {
                        $total_pending = 0;
                      }

                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $total_pending; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Succes Transaksi -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Total Pemasukkan
                      </div>
                      <?php
                      $sql = "SELECT total_price, SUM(total_price) as success from transactions where status='success'";
                      $result = $koneksi->query($sql);
                      if ($result->num_rows > 0) {
                        // Mendapatkan total game dari hasil query
                        $row = $result->fetch_assoc();
                        $total_success = $row['success'];
                      } else {
                        $total_success = 0;
                      }

                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $jumlah_uang = $total_success; // Ganti dengan jumlah uang yang sesuai
                        $formatted_uang = number_format($jumlah_uang, 0, ',', '.');
                        echo "Rp " . $formatted_uang;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Pie Chart -->
            <?php
            // Pastikan Anda sudah memiliki koneksi ke database
            $query = "SELECT status, COUNT(*) as count FROM transactions GROUP BY status";
            $result = $koneksi->query($query);

            $pending = 0;
            $failed = 0;
            $success = 0;

            while ($row = mysqli_fetch_assoc($result)) {
              switch ($row['status']) {
                case 'pending':
                  $pending = $row['count'];
                  break;
                case 'failed':
                  $failed = $row['count'];
                  break;
                case 'success':
                  $success = $row['count'];
                  break;
              }
            }
            ?>
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Transaction Status</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Chart Options:</div>
                      <a class="dropdown-item" href="#" onclick="updateChartType('pie')">Pie Chart</a>
                      <a class="dropdown-item" href="#" onclick="updateChartType('doughnut')">Doughnut Chart</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-pie">
                    <canvas id="transactionStatusChart"></canvas>
                  </div>
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

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <script>
    // Gunakan data dari PHP
    var pending = <?php echo $pending; ?>;
    var failed = <?php echo $failed; ?>;
    var success = <?php echo $success; ?>;

    var ctx = document.getElementById('transactionStatusChart').getContext('2d');
    var myChart;

    function createChart(type) {
      if (myChart) {
        myChart.destroy();
      }
      myChart = new Chart(ctx, {
        type: type,
        data: {
          labels: ['Pending', 'Failed', 'Success'],
          datasets: [{
            data: [pending, failed, success],
            backgroundColor: ['#ffc107', '#dc3545', '#28a745'],
            hoverBackgroundColor: ['#e0a800', '#bd2130', '#218838'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: true,
            position: 'bottom', // Ini akan menempatkan legend di bawah chart
            labels: {
              fontColor: '#858796',
              usePointStyle: true,
              padding: 20
            }
          },
          cutoutPercentage: 80,
        },
      });
    }

    function updateChartType(type) {
      createChart(type);
    }

    // Initial chart creation
    createChart('pie');
    console.log("Pending:", pending);
    console.log("Failed:", failed);
    console.log("Success:", success);
  </script>
</body>

</html>