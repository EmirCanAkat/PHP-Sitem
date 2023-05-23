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
  <title>Tasarım ve Şablonlar | CRAD Admin</title>
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
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="./plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
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
            <h1>Tasarım ve Şablonlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">CRAD</a></li>
              <li class="breadcrumb-item active">Tasarım ve Şablonlar</li>
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

            <form role="form" method="POST" action="" enctype="multipart/form-data">
              <input type="hidden" name="section" value="design_templates">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Kontrol Paneli</h3>
                  <!-- <a href="" target="_blank" class="btn btn-danger btn-sm float-right">Preview</a> -->
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-5">



                      <hr>

                      <div class="form-group">
                        <label class="col-form-label" for="dt_default_background">Arka Plan:</label>
                        <select class="form-control" name="dt_default_background" id="dt_default_background">
                          <option value="bg-img" <?php echo ("bg-img" == $dataSet->dt_default_background) ? 'selected="selected"' : ''; ?> >Arka Plan Resmi</option>

                        </select>
                      </div>

                     
                      </div>

                      <div class="form-group bg_img_dependency <?php echo ("bg-img" == $dataSet->dt_default_background) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="dt_default_background_img"><i>Varsayılan</i> Arka Plan Görüntüsü</label>
                        <br>
                        <small class="text-danger"><i><i class="fas fa-info-circle"></i> Önerilen Resim Boyutu: <b>(1600 x 900)</b> & Önerilen Uzantı: <b>jpg, jpeg, png & gif</b></i></small>
                      </div>

                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                          <div class="info-box uploaded-img-box bg_img_dependency <?php echo ("bg-img" == $dataSet->dt_default_background) ? "" : 'display-none'; ?>">
                            <span class="info-box-icon bg-info">
                              <img src="uploads/<?php echo strip_tags($dataSet->dt_default_background_img); ?>">
                            </span>
                            <div class="info-box-content">
                              <input type="file" name="dt_default_background_img" id="dt_default_background_img" class="form-control">
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                          <small class="text-success"><i class="fas fa-info-circle"></i> Bazı önceden hazırlanmış arka plan resimleri, ana dosyalarla birlikte, adı verilen bir klasörde bulunur., <strong>Arkaplan Resmi</strong>.</small>
                        </div>
                      </div>

                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5">

                      <div class="form-group">
                        <label class="col-form-label" for="dt_backgrownd_style">Arka Plan Stili:</label>
                        <select class="form-control" name="dt_backgrownd_style" id="dt_backgrownd_style">
                          <option value="default-style" <?php echo ("default-style" == $dataSet->dt_backgrownd_style) ? 'selected="selected"' : ''; ?> src-path1="assets/img/screenshots/crad-original-home.jpg" src-path2="assets/img/screenshots/crad-original-home-2.jpg">Varsayılan Tarz</option>
                          <option value="particles-style" <?php echo ("particles-style" == $dataSet->dt_backgrownd_style) ? 'selected="selected"' : ''; ?> src-path1="assets/img/screenshots/crad-particles-home.jpg" src-path2="assets/img/screenshots/crad-particles-home-2.jpg">Parçacık Stili</option>
                          <option value="particles-style-2" <?php echo ("particles-style-2" == $dataSet->dt_backgrownd_style) ? 'selected="selected"' : ''; ?> src-path1="assets/img/screenshots/crad-particles-2-home.jpg" src-path2="assets/img/screenshots/crad-particles-2-home-2.jpg">Parçacık Stili 2</option>
                          <option value="rain-style" <?php echo ("rain-style" == $dataSet->dt_backgrownd_style) ? 'selected="selected"' : ''; ?> src-path1="assets/img/screenshots/crad-rain-home.jpg" src-path2="assets/img/screenshots/crad-rain-home-2.jpg">Yağmur Stili</option>
                          <option value="waterpipe-style" <?php echo ("waterpipe-style" == $dataSet->dt_backgrownd_style) ? 'selected="selected"' : ''; ?> src-path1="assets/img/screenshots/crad-waterpipe-home.jpg" src-path2="assets/img/screenshots/crad-waterpipe-home-2.jpg">Duman Stili</option>
                          <option value="snow-style" <?php echo ("snow-style" == $dataSet->dt_backgrownd_style) ? 'selected="selected"' : ''; ?> src-path1="assets/img/screenshots/crad-snow-home.jpg" src-path2="assets/img/screenshots/crad-snow-home-2.jpg">Kar Stili</option>
                          <option value="video-style" <?php echo ("video-style" == $dataSet->dt_backgrownd_style) ? 'selected="selected"' : ''; ?> src-path1="assets/img/screenshots/crad-video-home.jpg" src-path2="assets/img/screenshots/crad-video-home-2.jpg">Video Stili</option>
                        </select>
                      </div>
                      <?php
                        if ("particles-style" == $dataSet->dt_backgrownd_style) {
                          $bg_style_screen = ("style-1" == $dataSet->dt_home_style) ? "crad-particles-home.jpg" : "crad-particles-home-2.jpg";
                        } elseif ("particles-style-2" == $dataSet->dt_backgrownd_style) {
                          $bg_style_screen = ("style-1" == $dataSet->dt_home_style) ? "crad-particles-2-home.jpg" : "crad-particles-2-home-2.jpg";
                        } elseif ("rain-style" == $dataSet->dt_backgrownd_style) {
                          $bg_style_screen = ("style-1" == $dataSet->dt_home_style) ? "crad-rain-home.jpg" : "crad-rain-home-2.jpg";
                        } elseif ("waterpipe-style" == $dataSet->dt_backgrownd_style) {
                          $bg_style_screen = ("style-1" == $dataSet->dt_home_style) ? "crad-waterpipe-home.jpg" : "crad-waterpipe-home-2.jpg";
                        } elseif ("snow-style" == $dataSet->dt_backgrownd_style) {
                          $bg_style_screen = ("style-1" == $dataSet->dt_home_style) ? "crad-snow-home.jpg" : "crad-snow-home-2.jpg";
                        } elseif ("video-style" == $dataSet->dt_backgrownd_style) {
                          $bg_style_screen = ("style-1" == $dataSet->dt_home_style) ? "crad-video-home.jpg" : "crad-video-home-2.jpg";
                        } else {
                          $bg_style_screen = ("style-1" == $dataSet->dt_home_style) ? "crad-original-home.jpg" : "crad-original-home-2.jpg";
                        }
                      ?>
                      <div class="form-group">
                        <label class="col-form-label" for="dt_backgrownd_style_display">Ekran Görüntüsü:</label>
                        <img src="assets/img/screenshots/<?php echo $bg_style_screen; ?>" alt="Home Style 1" id="dt_backgrownd_style_display">
                      </div>

                      <hr class="yt_dependency_sections <?php echo ("video-style" != $dataSet->dt_backgrownd_style) ? 'display-none' : ""; ?>">
                      <div class="form-group yt_dependency_sections <?php echo ("video-style" != $dataSet->dt_backgrownd_style) ? 'display-none' : ""; ?>">
                        <label class="col-form-label" for="yt_link"><i>YouTube</i> Video Link</label>
                        <input type="text" class="form-control" name="yt_link" id="yt_link" value="<?php echo strip_tags($dataSet->yt_link); ?>" placeholder="https://www.youtube.com/watch?v=gYO1uk7vIcc">
                      </div>

                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group yt_dependency_sections <?php echo ("video-style" != $dataSet->dt_backgrownd_style) ? 'display-none' : ""; ?>">
                            <div class="custom-control custom-switch">
                              <input type="hidden" value="false" name="yt_auto_play">
                              <input type="checkbox" class="custom-control-input" id="yt_auto_play" name="yt_auto_play" value="true" <?php echo ("true" == $dataSet->yt_auto_play) ? "checked" : ''; ?>>
                              <label class="custom-control-label" for="yt_auto_play">Otomatik Oynatma</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group yt_dependency_sections <?php echo ("video-style" != $dataSet->dt_backgrownd_style) ? 'display-none' : ""; ?>">
                            <div class="custom-control custom-switch">
                              <input type="hidden" value="false" name="yt_loop">
                              <input type="checkbox" class="custom-control-input" id="yt_loop" name="yt_loop" value="true" <?php echo ("true" == $dataSet->yt_loop) ? "checked" : ''; ?>>
                              <label class="custom-control-label" for="yt_loop">Döngü</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group yt_dependency_sections <?php echo ("video-style" != $dataSet->dt_backgrownd_style) ? 'display-none' : ""; ?>">
                            <div class="custom-control custom-switch">
                              <input type="hidden" value="false" name="yt_mute">
                              <input type="checkbox" class="custom-control-input" id="yt_mute" name="yt_mute" value="true" <?php echo ("true" == $dataSet->yt_mute) ? "checked" : ''; ?>>
                              <label class="custom-control-label" for="yt_mute">Sustur</label>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="DesignTemplates" class="btn btn-default btnResetToDefault">Varsayılana sıfırla</button>
                  <button type="submit" name="Save" value="DesignTemplates" class="btn btn-primary float-right">Değişiklikleri Kaydet</button>
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
<!-- bootstrap color picker -->
<script src="./plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./assets/js/demo.js"></script>
<!-- Custom.js -->
<script src="assets/js/custom.js"></script>
</body>
</html>
