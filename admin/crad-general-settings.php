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
  <title>Hoşgeldiniz | CRAD Admin</title>
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
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
            <h1>Genel Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">CRAD</a></li>
              <li class="breadcrumb-item active">Genel Ayarlar</li>
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
            <!-- form start -->
            <form role="form" method="POST" action="">
              <input type="hidden" name="section" value="countdown">
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Geri Sayım</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="hidden" value="0" name="show_countdown">
                      <input type="checkbox" class="custom-control-input" id="show_countdown" name="show_countdown" value="1" <?php echo ($dataSet->show_countdown) ? "checked" : ''; ?>>
                      <label class="custom-control-label" for="show_countdown">Geri Sayım Gösterilsin Mi?</label>
                    </div>
                  </div>


                  <div class="form-group dependency_sections <?php echo ($dataSet->show_countdown) ? "" : 'display-none'; ?>">
                    <label>Tarih ve Saat Seçiniz:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                      </div>
                      <input type="text" readonly class="form-control float-right" id="CountdownDatetimeRange" name="CountdownDatetimeRange" value="<?php echo strip_tags($dataSet->CountdownDatetimeRange); ?>">
                    </div>
                    <small><i><i class="fas fa-info-circle"></i>Konserin Başlayış ve Bitiş Tarihini Giriniz</i></small>
                    <!-- /.input group -->
                  </div>

                  <div class="form-group dependency_sections <?php echo ($dataSet->show_countdown) ? "" : 'display-none'; ?>">
                    <label class="col-form-label" for="expired_text">Geri Sayım Süresi Dolmuş:</label>
                    <input type="text" class="form-control" name="expired_text" id="expired_text" maxlength="250" value="<?php echo strip_tags($dataSet->expired_text); ?>">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="Countdown" class="btn btn-default btnResetToDefault">Varsayılanı Sıfırla</button>
                  <button type="submit" name="Save" value="Countdown" class="btn btn-primary float-right">Değişiklikleri Kaydet</button>
                </div>
              </div>
              <!-- /.card -->
            </form>

            <form role="form" method="POST" action="" enctype="multipart/form-data">
              <input type="hidden" name="section" value="homepage">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Ana Sayfa İçeriği</h3>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <label class="col-form-label" for="home_subtitle">Üst Başlık:</label>
                    <input type="text" class="form-control" name="home_subtitle" id="home_subtitle" placeholder="Üst Başlık Giriniz value="<?php echo strip_tags($dataSet->home_subtitle); ?>">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="home_title">Title:</label>
                    <input type="text" class="form-control" name="home_title" id="home_title" placeholder="Başlık Giriniz" value="<?php echo strip_tags($dataSet->home_title); ?>">
                  </div>

                  <hr />

                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="hidden" value="0" name="enable_text_logo">
                      <input type="checkbox" class="custom-control-input" id="enable_text_logo" name="enable_text_logo" value="1" <?php echo ($dataSet->enable_text_logo) ? "checked" : ''; ?>>
                      <label class="custom-control-label" for="enable_text_logo">Metin Logosu</label>
                    </div>
                    <input type="text" class="form-control" name="text_logo" id="text_logo" placeholder="Crad." value="<?php echo strip_tags($dataSet->text_logo); ?>">
                  </div>

                  <div class="form-group dependency_sections">
                    <div class="custom-control custom-switch">
                      <input type="hidden" value="0" name="show_logo_image">
                      <input type="checkbox" class="custom-control-input" id="show_logo_image" name="show_logo_image" value="1" <?php echo ($dataSet->show_logo_image) ? "checked" : ''; ?>>
                      <label class="custom-control-label" for="show_logo_image">Logo Fotoğrafı</label>
                    </div>
                    <small class="text-danger dependency_img_sections <?php echo ($dataSet->show_logo_image) ? "" : 'display-none'; ?>"><i><i class="fas fa-info-circle"></i> Önerilen Resim Boyutu: <b>(128 x 39)</b> & Önerilen Uzantı Formatı: <b>jpg, jpeg, png & gif</b></i></small>

                    <div class="info-box uploaded-img-box dependency_img_sections <?php echo ($dataSet->show_logo_image) ? "" : 'display-none'; ?>">
                      <span class="info-box-icon bg-info" title="Logo Image">
                        <img src="uploads/<?php echo strip_tags($dataSet->logo_image); ?>" alt="Logo Image">
                      </span>
                      <div class="info-box-content">
                        <input type="file" name="logo_image" id="logo_image" class="form-control">
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="form-group dependency_sections">
                    <div class="custom-control custom-switch">
                      <input type="hidden" value="0" name="show_logo_favicon">
                      <input type="checkbox" class="custom-control-input" id="show_logo_favicon" name="show_logo_favicon" value="1" <?php echo ($dataSet->show_logo_favicon) ? "checked" : ''; ?>>
                      <label class="custom-control-label" for="show_logo_favicon">Geri Sayım Fotoğrafı</label>
                    </div>
                    <small class="text-danger dependency_img_sections <?php echo ($dataSet->show_logo_favicon) ? "" : 'display-none'; ?>"><i><i class="fas fa-info-circle"></i> Önerilen Resim Boyutu: <b>(39 x 39)</b> & Önerilen Uzantı Formatı: <b>jpg, jpeg, png & ico</b></i></small>

                    <div class="info-box uploaded-img-box dependency_img_sections <?php echo ($dataSet->show_logo_favicon) ? "" : 'display-none'; ?>">
                      <span class="info-box-icon bg-info" title="Logo Favicon">
                        <img src="uploads/<?php echo strip_tags($dataSet->logo_favicon); ?>" alt="Logo Favicon">
                      </span>
                      <div class="info-box-content">
                        <input type="file" name="logo_favicon" id="logo_favicon" class="form-control">
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="HomeContent" class="btn btn-default btnResetToDefault">Varsayılanı Resetle</button>
                  <button type="submit" name="Save" value="HomeContent" class="btn btn-primary float-right">Değişiklikleri Kaydet</button>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </form>


            <form role="form" method="POST" action="">
              <input type="hidden" name="section" value="callus">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Bizi Arayın</h3>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="hidden" value="0" name="show_callus">
                      <input type="checkbox" class="custom-control-input" id="show_callus" name="show_callus" value="1" <?php echo ($dataSet->show_callus) ? "checked" : ''; ?>>
                      <label class="custom-control-label" for="show_callus">Bizi Arayın'ı Kapat</label>
                    </div>
                  </div>

                  <div class="form-group dependency_sections <?php echo ($dataSet->show_callus) ? "" : 'display-none'; ?>">
                    <label class="col-form-label" for="display_text">Yazınız:</label>
                    <input type="text" class="form-control" name="display_text" id="display_text" placeholder="Enter Display Text" value="<?php echo strip_tags($dataSet->display_text); ?>">
                  </div>
                  <div class="form-group dependency_sections <?php echo ($dataSet->show_callus) ? "" : 'display-none'; ?>">
                    <label class="col-form-label" for="phone_number">Telefon Numaranız:</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone Number" value="<?php echo strip_tags($dataSet->phone_number); ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="CallUs" class="btn btn-default btnResetToDefault">Varsayılanı Sıfırla</button>
                  <button type="submit" name="Save" value="CallUs" class="btn btn-primary float-right">Değişiklikleri Kaydet</button>
                </div>
                <!-- /.card-body -->
              </div>
             

                <div class="card-footer">

                </div>
              </div>
              <!-- /.card -->
            </form>
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
<!-- bs-custom-file-input -->
<script src="./plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- date-range-picker -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/daterangepicker/daterangepicker.js"></script>
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
