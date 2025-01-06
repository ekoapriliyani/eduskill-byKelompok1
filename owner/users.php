<?php
session_start();

// Jika tidak ada session login, redirect ke login.php
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}

include 'koneksi.php';

// Ambil nama_lengkap berdasarkan username dari session
$username = $_SESSION['username'];
$query_user = "SELECT nama_lengkap FROM tuser WHERE username = '$username'";
$result_user = $conn->query($query_user);

// Periksa apakah data ditemukan
if ($result_user && $result_user->num_rows > 0) {
  $nama_lengkap = $result_user->fetch_assoc()['nama_lengkap'];
} else {
  $nama_lengkap = "Tidak Diketahui"; // Default jika data tidak ditemukan
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eduskill</title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Sidebar -->
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Eduskill</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="build/images/profile.jpeg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome Owner,</span>
              <h2><?= $nama_lengkap; ?></h2>
            </div>
          </div>

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <!-- <h3>General</h3> -->
              <ul class="nav side-menu">
                <li><a><i class="fa fa-odnoklassniki"></i> Kursus <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="kursus.php">Manage Kursus</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-clipboard"></i> Materi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="materi.php">Manage Materi</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-list"></i> Kategori <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="kategori.php">Manage Kategori</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="users.php">Manage User</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="build/images/profile.jpeg" alt=""><?= $nama_lengkap; ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                  <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- Page Content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <h3>Data User</h3>
            <div class="col-md-12 col-sm-6">
              <div class="x_panel">
                <div class="x_title">
                  <!-- <a href="" class="btn btn-primary">Tambah Data Karyawan</a> -->

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Tambah User
                  </button>

                  <!-- Modal -->

                  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="proses-user.php" method="POST">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                              <label for="nama_lengkap">Nama Lengkap</label>
                              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                            </div>
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="fotm-group">
                              <label for="level">Level</label>
                              <select name="level" id="level" class="custom-select">
                                <option value="Siswa">Siswa</option>
                                <option value="Admin">Admin</option>
                                <option value="Owner">Owner</option>
                              </select>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      include "koneksi.php";
                      ?>
                      <?php
                      $result = mysqli_query($conn, "SELECT * FROM tuser");
                      while ($row = mysqli_fetch_array($result)):
                      ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $row["username"]; ?></td>
                          <td><?= $row["nama_lengkap"]; ?></td>
                          <td>
                            <a href="detailuser.php?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                            <a href="hapususer.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin hapus user ini?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                          </td>
                        </tr>
                        <?php $no++; ?>
                      <?php endwhile; ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->

    </div>
  </div>

  <!-- JavaScript -->
  <!-- jQuery -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- NProgress -->
  <script src="vendors/nprogress/nprogress.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>


</body>

</html>