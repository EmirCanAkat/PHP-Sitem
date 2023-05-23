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
  <title>Aboneler | CRAD Admin</title>
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
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/css/adminlte.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    table.dataTable td {
        padding: 2px 5px;
    }
  </style>
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
            <h1>Aboneler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">CRAD</a></li>
              <li class="breadcrumb-item active">Aboneler</li>
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
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Kontrol Paneli</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="">
                <input type="hidden" name="section" value="subscribers">
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="hidden" value="0" name="show_subscriber">
                      <input type="checkbox" class="custom-control-input" id="show_subscriber" name="show_subscriber" value="1" <?php echo ($dataSet->show_subscriber) ? "checked" : ''; ?>>
                      <label class="custom-control-label" for="show_subscriber">Aboneleri Kapat</label>
                    </div>
                  </div>

                  <div class="form-group dependency_sections <?php echo ($dataSet->show_subscriber) ? "" : 'display-none'; ?>">
                    <label class="col-form-label" for="subs_btn_txt"><i>Buton İsmini</i> Değiştiriniz:</label>
                    <input type="text" class="form-control" name="subs_btn_txt" id="subs_btn_txt" placeholder="Lütfen Buton İsmi İçin Bir İsim Girin " value="<?php echo strip_tags($dataSet->subs_btn_txt); ?>">
                  </div>
                  <div class="form-group dependency_sections <?php echo ($dataSet->show_subscriber) ? "" : 'display-none'; ?>">
                    <label class="col-form-label" for="subs_placeholder_txt"><i>Mail</i> Giriniz:</label>
                    <input type="text" class="form-control" name="subs_placeholder_txt" id="subs_placeholder_txt" placeholder="Mailinizi Buraya Giriniz" value="<?php echo strip_tags($dataSet->subs_placeholder_txt); ?>">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="Subscribers" class="btn btn-default btnResetToDefault">Varsayılanı Sıfırlayın</button>
                  <button type="submit" name="Save" value="Subscribers" class="btn btn-primary float-right">Değişiklikleri Kaydet</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-7">
            <!-- general form elements disabled -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Abone Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">ID</th>
                      <th>Email</th>
                      <th class="text-center">Abone Olduğu An</th>
                      <th class="text-center">SİL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($subscribers as $key => $value) { ?>
                    <tr>
                      <td class="text-center"><?php echo $key+1; ?> </td>
                      <td><?php echo strip_tags($value->email); ?></td>
                      <td class="text-center"><?php echo strip_tags(date('d M, Y H:i:s', strtotime($value->created_at))); ?></td>
                      <td class="text-center">
                        <form action="" method="POST">
                          <button type="submit" onclick="return confirm('Are you sure to delete?');" name="DeleteSubsId" class="btn btn-xs btn-danger" value="<?php echo strip_tags($value->id); ?>"><i class="far fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
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
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./assets/js/demo.js"></script>
<!-- Custom.js -->
<script src="assets/js/custom.js"></script>
</body>
</html>
