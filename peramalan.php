<!DOCTYPE html>

<?php
include "connection/koneksi.php";
include "backend/penjualan.php";
include "backend/backend_perkiraan.php";
session_start();
ob_start();

$id = $_SESSION['id_admin'];

if(isset ($_SESSION['username'])){
    $query = "select * from admin natural join level_user where id_admin = $id";

    mysqli_query($conn, $query);
    $sql = mysqli_query($conn, $query);
    
    while($r = mysqli_fetch_array($sql)){
        $nama = $r['nama'];
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Forecasting</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/arabic.css" rel="stylesheet" >
    <script>
        function hitung(value){
            window.location.href="peramalan.php?estimasi=" + value;
        }
    </script>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php
            if($r['id_level'] == 1){
        ?>
            
        <?php
            } else if($r['id_level'] == 2){
        ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda.php">
                <div class="sidebar-brand-icon">
                    <img src="img/icon.png" width="30px" height="30px">     
                </div>
                <div class="sidebar-brand-text mx-3">Forecasting</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="beranda.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="data_aktual.php">
                    <img alt="Image placeholder" src="img/mobil.png">
                    <span>Data Aktual</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="peramalan.php">
                    <img alt="Image placeholder" src="img/pinjam.png">
                    <span>Peramalan</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <br>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        <?php
            }
        ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                  
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Informasi User -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $r['nama'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            
                            <!-- Dropdown User -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" id="custom-dropdown" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

            <!-- Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Peramalan</h1>
                </div>
                <section class="mar-top--x-3 mar-bottom--x-5">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="judul">
                                    <h4 align="center" class="mb-0 text-gray-800">Mencari Rumus Regresi Linear</h4>
                                    <br>
                            </div>
                            
                            <?php
                            $query_data_aktual = "SELECT * FROM data_aktual";
                            $sql_data_aktual = mysqli_query($conn, $query_data_aktual);
                            $no = 1;
                            ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead align="center" class="mb-0 text-gray-800">
                                        <tr>
                                        <th id="judul" width="20%"> Nomor Data  </th>
                                        <th id="judul" width="15%"> X </th>
                                        <th id="judul" width="15%"> Y </th>
                                        <th id="judul" width="15%"> XX </th>
                                        <th id="judul" width="15%"> XY </th>
                                        <th id="judul" width="15%"> YY </th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $arrayData = Data_Aktual::readAllData();
                                        $syy = 0;
                                        foreach ($arrayData as $data){                         
                                    ?>
                                    <tbody align="center" class="mb-0 text-gray-800">
                                        
                                        <tr>
                                            <td id="ramalan"><aaa><?php echo $data->no_data;?></aaa></td>
                                            <td id="ramalan"><aaa><?php echo $data->pengiklanan;?></aaa></td>
                                            <td id="ramalan"><aaa><?php echo $data->penjualan;?></aaa></td>
                                            <td id="ramalan"><aaa><?php echo $data->pengiklanan*$data->pengiklanan;?></aaa></td>
                                            <td id="ramalan"><aaa><?php echo $data->pengiklanan*$data->penjualan;?></aaa></td>
                                            <td id="ramalan"><aaa><?php echo $data->penjualan*$data->penjualan;
                                            $sx+=$data->pengiklanan;
                                            $sy+=$data->penjualan;
                                            $sxx+=$data->pengiklanan*$data->pengiklanan;
                                            $sxy+=$data->pengiklanan*$data->penjualan;
                                            $syy+=$data->penjualan*$data->penjualan;
                                            ?></aaa></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table> 
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr align="center" class="mb-0 text-gray-800">
                                        <th width="20%"> Jumlah </th>
                                        <th width="15%"> <?php echo $sx ?></th>
                                        <th width="15%"> <?php echo $sy ?></th>
                                        <th width="15%"> <?php echo $sxx ?></th>
                                        <th width="15%"> <?php echo $sxy ?></th>
                                        <th width="15%"> <?php echo $syy ?></th>
                                    </tr>
                                    <?php
                                        $b = ((60*$sxy) - ($sx * $sy))/((60*$sxx)-($sx*$sx));
                                        $a = (($sy) - ($b*$sx))/60;
                                    ?>
                                    <tr class="mb-0 text-gray-800">
                                        <th width="20%"> Rumus Regresi Linear: </th>
                                        <th colspan="5"> <?php echo "$a + $b x"; ?> </th>
                                    </tr>
                                </table>  
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mar-top--x-3 mar-bottom--x-5">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="judul">
                                    <h4 align="center" class="mb-0 text-gray-800">Perbandingan Data Aktual dan Data Peramalan</h4>
                                    <br>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center" class="mb-0 text-gray-800">
                                    <tr>
                                    <th id="judul" width="20%"> Nomor Data  </th>
                                    <th id="judul" width="15%"> X </th>
                                    <th id="judul" width="15%"> Y </th>
                                    <th id="judul" width="15%"> Peramalan </th>
                                    </tr>
                                </thead>
                                <?php
                                    $arrayData = Data_Aktual::readAllData();
                                    $syy = 0;
                                    foreach ($arrayData as $data){                         
                                ?>
                                <tbody align="center" class="mb-0 text-gray-800">
                                    
                                    <tr>
                                        <td id="ramalan"><aaa><?php echo $data->no_data;?></aaa></td>
                                        <td id="ramalan"><aaa><?php echo $data->pengiklanan;?></aaa></td>
                                        <td id="ramalan"><aaa><?php echo $data->penjualan;?></aaa></td>
                                        <td id="ramalan"><aaa><?php echo $a+$b*$data->pengiklanan;?></aaa></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section class="mar-top--x-3 mar-bottom--x-5">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="judul">
                                    <h4 align="center" class="mb-0 text-gray-800">Peramalan Penjualan</h4>
                                    <br>
                                </div>
                                <?php
                                if(isset($_GET['estimasi'])){
                                    $now = $_GET['estimasi'];
                                    $prediksi = $a + $b * $now;
                                }
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <td>
                                        <input name="estimasi" form="prediksi" method="POST" onchange="hitung(this.value)" class="form-control" placeholder="Masukkan Data Pengiklanan" required>
                                        <td width="25%" class="mb-0 text-gray-800">Peramalan penjualan berikutnya: </td>
                                        <td width="25%" class="mb-0 text-gray-800"> <?php echo $prediksi; ?> </td>
                                    </tr>
                                </table> 
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End of Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelompok 15</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" jika ingin meninggalkan halaman.</div>
                <div class="modal-footer">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="button" data-dismiss="modal">Batal</button>
                    <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>