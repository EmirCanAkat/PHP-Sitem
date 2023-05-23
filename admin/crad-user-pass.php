<?php
include_once '../inc/FetchData.class.php';
include_once 'models/Subscribers.class.php';

// Init Object of Subscribers
$subscribersObj = new Subscribers();
// Get subscribers data
$subscribers = $subscribersObj->getData();

// FetchData Object
$fetchDataObj = new FetchData();
$dataSet = (object) $fetchDataObj->getDataSet();

// Init variables values
$res = "";

// Update CommonSeetings
if ( isset($_POST['Save']) ) {
  include_once 'models/PostDynamicContents.class.php';
  $PostDynamicContentsObj = new PostDynamicContents();

  // Pass data to update into database
  $res = $PostDynamicContentsObj->updateData($_POST);

  // Update dataset with changes
  $dataSet = (object) array_merge( (array) $dataSet, $_POST);

}

// Delete Subs
if ( isset($_POST['DeleteSubsId']) ) {
  $res = $subscribersObj->deleteData($_POST);

  // reload remaining records
  include_once 'models/Subscribers.class.php';
  $subscribersObj = new Subscribers();
  $subscribers = $subscribersObj->getData();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Giriş-Şifre | CRAD Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ($dataSet->enable_maintenance) { ?>
  <!-- Maintenance Mode Enabled -->
  <meta name="robots" content="noindex, nofollow" />
  <?php } ?>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  <link rel="icon" href="../favicon.ico" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./assets/css/ionicons/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/css/adminlte.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php require_once('header.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once('sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <input type="hidden" class="res" name="res" value="<?php echo $res; ?>">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Email - Şifre Güncelle !</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">CRAD</a></li>
              <li class="breadcrumb-item active">Email - Şifre</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Kontrol Paneli</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="">
                <input type="hidden" name="section" value="user_pass">
                <div class="card-body">

                  <div class="form-group">
                    <label class="col-form-label" for="admin_name">Admin Adı:</label>
                    <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Admin Adı" value="<?php echo strip_tags($dataSet->admin_name); ?>">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="admin_email">Admin Emaili:</label>
                    <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Mail Giriniz" value="<?php echo strip_tags($dataSet->admin_email); ?>">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="admin_pass">Şifre:</label>
                    <input type="password" class="form-control" name="admin_pass" id="admin_pass" placeholder="Şifre" value="<?php echo strip_tags($dataSet->admin_pass); ?>">
                  </div>

                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" id="show-pass" type="checkbox">
                      <label class="form-check-label" for="show-pass">Şifreyi Göster</label>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="UserPass" class="btn btn-default btnResetToDefault">Varsayılanı Sıfırla</button>
                  <button type="submit" name="Save" value="UserPass" class="btn btn-primary float-right">Değişiklikleri Kaydet</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <?php require_once('footer.php'); ?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./assets/js/demo.js"></script>
<!-- Custom.js -->
<script src="assets/js/custom.js"></script>
</body>
</html>
