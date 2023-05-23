<?php
session_start();
if (isset($_SESSION['email']))
{
    header("Location: home.php");
    exit();
}

include_once '../inc/DatabaseMysql.class.php';
// Instantiate DB & connect
$database = new DatabaseMysql();
$conn = $database->connect();

$status_msg = "";
$query_string = "";

if (isset($_POST['login'])) {

    $email = isset($_POST['email']) ? mysqli_escape_string($conn, trim(addslashes(htmlspecialchars(strip_tags($_POST['email']))))) : null;
    $pass = isset($_POST['pass']) ? mysqli_escape_string($conn, trim(addslashes(htmlspecialchars(strip_tags($_POST['pass']))))) : null;

    // Check if the email or pass empty
    if (empty($email)) {
        $status_msg = "Email is required!";
    } elseif (empty($pass)) {
        $status_msg = "Password is required!";
    } else {
        // Check the records 
        $sql = "SELECT id, name, email, password FROM users WHERE email='". strtolower($email) ."' AND password='". $pass ."';";
        $query = mysqli_query($conn, $sql);
        $records = mysqli_fetch_array($query);

        //If records are found and matched.
        if($records)
        {
            $_SESSION['email'] = $records['email'];
            $_SESSION['name'] = $records['name'];
        // print_r($_SESSION);
        // exit();

            header("Location: home.php");
            exit();

        } else {
            $status_msg = 'UserID/Password is not correct!';
        }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Giriş Yap</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  <link rel="icon" href="../favicon.ico" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./assets/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b></b>Admin Giriş Yap!</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">
        Oturumunuzu başlatmak için oturum açın  
            <span class="text-danger"><?php echo $status_msg; ?></span>
        </p>

      <form action="" method="post" class="mb-3" id="loginForm">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" id="pass" class="form-control" placeholder="Şifre" required />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <input type="hidden" name="login">
            <button type="submit" name="login" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- Custom.js -->
<script src="assets/js/custom.js"></script>
</body>
</html>
