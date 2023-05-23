<?php
include_once '../inc/DatabaseMysql.class.php';
// Instantiate DB & connect
$database = new DatabaseMysql();
$conn = $database->connect();

// Get section keyword
$reset_section = isset($_POST['reset_section']) ? mysqli_escape_string($conn, trim($_POST['reset_section'])) : null;
$res = ['status' => 'error', 'msg' => 'Something went wrong!'];
$query_string = "";

// check if the section keyword is null
if ($reset_section) {

	if ("user_pass" == $reset_section) {

		# Query String
		$query_string .= "TRUNCATE TABLE users;";
		$query_string .= "INSERT INTO users (name, email, password) VALUES ('admin', 'admin@hotmail.com', 'şifre');";

	} else {
		// Query sting for update records
		$query_string .= "UPDATE dynamic_contents SET flag_value = null WHERE flag_type = '$reset_section';";
	}

	// Execute query
	$query_exe = mysqli_multi_query($conn, $query_string) or die(mysqli_error($conn));

	// If query executed successfully, return success msg
	if ($query_exe) {
		$res = ['status' => 'success', 'msg' => 'Başarıyla Sıfırlandı.'];
	}
	$conn->close();

}

// Return response
echo json_encode($res);
exit();
?>