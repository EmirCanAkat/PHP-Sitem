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
  <title>Hakkımızda Sayfası | CRAD Admin</title>
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
            <h1>Sayfa Hakkında</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">CRAD</a></li>
              <li class="breadcrumb-item active">Hakkımızda Sayfası</li>
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
              <input type="hidden" name="section" value="aboutpage">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Kontrol Paneli</h3>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="hidden" value="0" name="show_aboutpage">
                          <input type="checkbox" class="custom-control-input" id="show_aboutpage" name="show_aboutpage" value="1" <?php echo ($dataSet->show_aboutpage) ? "checked" : ''; ?>>
                          <label class="custom-control-label" for="show_aboutpage">Hakkımızda Sayfasını Göster</label>
                        </div>
                      </div>

                      <div class="form-group dependency_sections <?php echo ($dataSet->show_aboutpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="about_subtitle">Alt yazı:</label>
                        <input type="text" class="form-control" name="about_subtitle" id="about_subtitle" placeholder="Alt Başlık Girin" value="<?php echo strip_tags($dataSet->about_subtitle); ?>">
                      </div>
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_aboutpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="about_title">Başlık:</label>
                        <input type="text" class="form-control" name="about_title" id="about_title" placeholder="Başlığı Girin" value="<?php echo strip_tags($dataSet->about_title); ?>">
                      </div>

                      <div class="form-group dependency_sections <?php echo ($dataSet->show_aboutpage) ? "" : 'display-none'; ?>">
                        <div class="custom-control custom-switch">
                          <input type="hidden" value="0" name="show_about_button_1">
                          <input type="checkbox" class="custom-control-input" id="show_about_button_1" name="show_about_button_1" value="1" <?php echo ($dataSet->show_about_button_1) ? "checked" : ''; ?>>
                          <label class="custom-control-label" for="show_about_button_1">Buton</label>
                        </div>
                        <input type="text" class="form-control dependency_sub_sections <?php echo ($dataSet->show_about_button_1) ? "" : 'display-none'; ?>" name="about_button_1_txt" id="about_button_1_txt" placeholder="Enter Button Text" value="<?php echo strip_tags($dataSet->about_button_1_txt); ?>">
                        <input type="text" class="form-control dependency_sub_sections <?php echo ($dataSet->show_about_button_1) ? "" : 'display-none'; ?>" name="about_button_1_link" id="about_button_1_link" placeholder="Enter Link" value="<?php echo strip_tags($dataSet->about_button_1_link); ?>">
                      </div>

                      <div class="form-group dependency_sections <?php echo ($dataSet->show_aboutpage) ? "" : 'display-none'; ?>">
                        <div class="custom-control custom-switch">
                          <input type="hidden" value="0" name="show_about_button_2">
                          <input type="checkbox" class="custom-control-input" id="show_about_button_2" name="show_about_button_2" value="1" <?php echo ($dataSet->show_about_button_2) ? "checked" : ''; ?>>
                          <label class="custom-control-label" for="show_about_button_2">Buton</label>
                        </div>
                        <input type="text" class="form-control dependency_sub_sections <?php echo ($dataSet->show_about_button_2) ? "" : 'display-none'; ?>" name="about_button_2_txt" id="about_button_2_txt" placeholder="Buton Metnini Giriniz" value="<?php echo strip_tags($dataSet->about_button_2_txt); ?>">
                        <input type="text" class="form-control dependency_sub_sections <?php echo ($dataSet->show_about_button_2) ? "" : 'display-none'; ?>" name="about_button_2_link" id="about_button_2_link" placeholder="Link Giriniz" value="<?php echo strip_tags($dataSet->about_button_2_link); ?>">
                      </div>
                    </div>

                    <div class="col-sm-7">
                      <div class="form-group dependency_sections <?php echo ($dataSet->show_aboutpage) ? "" : 'display-none'; ?>">
                        <label class="col-form-label" for="about_content">İçerik:</label>
                        <textarea class="form-control" name="about_content" id="about_content"><?php echo stripslashes($dataSet->about_content); ?></textarea>
                      </div>
                    </div>
                  </div>

                  <hr class="dependency_sections <?php echo ($dataSet->show_aboutpage) ? "" : 'display-none'; ?>">
                  <div class="form-group dependency_sections <?php echo ($dataSet->show_aboutpage) ? "" : 'display-none'; ?>">
                    <div class="custom-control custom-switch">
                      <input type="hidden" value="0" name="show_about_images">
                      <input type="checkbox" class="custom-control-input" id="show_about_images" name="show_about_images" value="1" <?php echo ($dataSet->show_about_images) ? "checked" : ''; ?>>
                      <label class="custom-control-label" for="show_about_images">Fotoğrafları Göster</label>
                    </div>
                    <small class="text-danger dependency_img_sections <?php echo ($dataSet->show_about_images) ? "" : 'display-none'; ?>"><i><i class="fas fa-info-circle"></i>  <b></b>  <b></b></i></small>
                  </div>

                  <div class="row dependency_sections dependency_img_sections <?php echo (($dataSet->show_aboutpage) && ($dataSet->show_about_images)) ? "" : 'display-none'; ?>">
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box uploaded-img-box">
                        <span class="info-box-icon bg-info" title="<?php echo strip_tags($dataSet->about_img_1_atl); ?>">
                          <img src="uploads/<?php echo strip_tags($dataSet->about_img_1); ?>" alt="<?php echo strip_tags($dataSet->about_img_1_atl); ?>">
                        </span>
                        <div class="info-box-content">
                          <input type="file" name="about_img_1" id="about_img_1" class="form-control">
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <input type="text" class="form-control" name="about_img_1_atl" id="about_img_1_atl" value="<?php echo strip_tags($dataSet->about_img_1_atl); ?>" placeholder="Resmin Altına Yazı Gir">
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box uploaded-img-box mb-3">
                        <span class="info-box-icon bg-danger" title="<?php echo strip_tags($dataSet->about_img_2_atl); ?>">
                          <img src="uploads/<?php echo strip_tags($dataSet->about_img_2); ?>" alt="<?php echo strip_tags($dataSet->about_img_2_atl); ?>">
                        </span>
                        <div class="info-box-content">
                          <input type="file" name="about_img_2" id="about_img_2" class="form-control">
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <input type="text" class="form-control" name="about_img_2_atl" id="about_img_2_atl" value="<?php echo strip_tags($dataSet->about_img_2_atl); ?>" placeholder="Resmin Altına Yazı Gir">
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box uploaded-img-box mb-3">
                        <span class="info-box-icon bg-success" title="<?php echo strip_tags($dataSet->about_img_3_atl); ?>">
                          <img src="uploads/<?php echo strip_tags($dataSet->about_img_3); ?>" alt="<?php echo strip_tags($dataSet->about_img_3_atl); ?>">
                        </span>
                        <div class="info-box-content">
                          <input type="file" name="about_img_3" id="about_img_3" class="form-control">
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <input type="text" class="form-control" name="about_img_3_atl" id="about_img_3_atl" value="<?php echo strip_tags($dataSet->about_img_3_atl); ?>" placeholder="Resmin Altına Yazı Gir">
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                      <div class="info-box uploaded-img-box mb-3">
                        <span class="info-box-icon bg-warning" title="<?php echo strip_tags($dataSet->about_img_4_atl); ?>">
                          <img src="uploads/<?php echo strip_tags($dataSet->about_img_4); ?>" alt="<?php echo strip_tags($dataSet->about_img_4_atl); ?>">
                        </span>
                        <div class="info-box-content">
                          <input type="file" name="about_img_4" id="about_img_4" class="form-control">
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <input type="text" class="form-control" name="about_img_4_atl" id="about_img_4_atl" value="<?php echo strip_tags($dataSet->about_img_4_atl); ?>" placeholder="Resmin Altına Yazı Gir">
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" name="Reset" value="AboutPage" class="btn btn-default btnResetToDefault">Varsayılana sıfırla</button>
                  <button type="submit" name="Save" value="AboutPage" class="btn btn-primary float-right">Değişikleri Kaydet</button>
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
<!-- CKEditor -->
<script src="./plugins/ckeditor/ckeditor.js"></script>
<!-- AdminLTE App -->
<script src="./assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./assets/js/demo.js"></script>
<!-- Custom.js -->
<script src="assets/js/custom.js"></script>
</body>
</html>
