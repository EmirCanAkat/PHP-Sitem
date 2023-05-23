<?php
include_once '../inc/FetchData.class.php';

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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Contact Page | CRAD Admin</title>
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
            <h1>İletişim Sayfası</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">CRAD</a></li>
              <li class="breadcrumb-item active">İletişim Sayfası</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- full column -->
          <div class="col-md-12">

            <form role="form" method="POST" action="">
              <input type="hidden" name="section" value="contactpage">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Kontrol Paneli</h3>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="hidden" value="0" name="show_contactpage">
                          <input type="checkbox" class="custom-control-input" id="show_contactpage" name="show_contactpage" value="1" <?php echo ($dataSet->show_contactpage) ? "checked" : ''; ?>>
                          <label class="custom-control-label" for="show_contactpage">İletişim Sayfası Gösterilsin mi?</label>
                        </div>
                      </div>

                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="contact_subtitle">Üst yazı:</label>
                        <input type="text" class="form-control" name="contact_subtitle" id="contact_subtitle" placeholder="Üst Yazı Giriniz" value="<?php echo strip_tags($dataSet->contact_subtitle); ?>">
                      </div>
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="contact_title">Başlık:</label>
                        <input type="text" class="form-control" name="contact_title" id="contact_title" placeholder="Başlık Giriniz" value="<?php echo strip_tags($dataSet->contact_title); ?>">
                      </div>

                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="fullname_field_txt"><i>Ad Soyad</i>:</label>
                        <input type="text" class="form-control" name="fullname_field_txt" id="fullname_field_txt" placeholder="Ad Soyad Giriniz" value="<?php echo strip_tags($dataSet->fullname_field_txt); ?>">
                      </div>
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="phone_field_txt"><i>Telefon Numarası</i> :</label>
                        <input type="text" class="form-control" name="phone_field_txt" id="phone_field_txt" placeholder="Telefon Numaranızı Giriniz" value="<?php echo strip_tags($dataSet->phone_field_txt); ?>">
                      </div>
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="email_field_txt"><i>Email</i> :</label>
                        <input type="text" class="form-control" name="email_field_txt" id="email_field_txt" placeholder="Email Adresinizi Giriniz" value="<?php echo strip_tags($dataSet->email_field_txt); ?>">
                      </div>
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="msg_field_txt"><i>Mesajınız</i> :</label>
                        <input type="text" class="form-control" name="msg_field_txt" id="msg_field_txt" placeholder="Mesajınızı Giriniz" value="<?php echo strip_tags($dataSet->msg_field_txt); ?>">
                      </div>

                    </div>

                    <div class="col-sm-6">
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="send_btn_txt"><i>Gönder</i>:</label>
                        <input type="text" class="form-control" name="send_btn_txt" id="send_btn_txt" placeholder="Göndermek için mesaj giriniz" value="<?php echo strip_tags($dataSet->send_btn_txt); ?>">
                      </div>
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="contact_success_msg">İletişim <i>Başarı</i> Mesajı:</label>
                        <input type="text" class="form-control" name="contact_success_msg" id="contact_success_msg" placeholder="Mesaj Giriniz" value="<?php echo strip_tags($dataSet->contact_success_msg); ?>">
                      </div>
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="contact_error_msg">İletişim <i>Error</i> Mesajı:</label>
                        <input type="text" class="form-control" name="contact_error_msg" id="contact_error_msg" placeholder="Error Mesajı Giriniz" value="<?php echo strip_tags($dataSet->contact_error_msg); ?>">
                      </div>

                      <div class="form-group dependency_sections <?php echo ($dataSet->show_contactpage) ? "" : 'display-none'; ?>">
                         
                        </label>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="AboutPage" class="btn btn-default btnResetToDefault">Varsayılana sıfırla</button>
                  <button type="submit" name="Save" value="AboutPage" class="btn btn-primary float-right">Değişiklikleri Kaydet</button>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </form>

          </div>
          <!--/.col (full) -->
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
