<?php
include_once '../inc/DatabaseMysql.class.php';
// Instantiate DB & connect
$database = new DatabaseMysql();
$conn = $database->connect();

$res = 'Something went wrong!';
$query_string = "";

// Users record reset
$query_string .= "TRUNCATE TABLE users;";
$query_string .= "INSERT INTO users (name, email, password) VALUES ('Administrator', 'admin@app.com', 'password');";

// Query sting for update records
$query_string .= "UPDATE dynamic_contents SET flag_value = null;";

// Execute query
$query_exe = mysqli_multi_query($conn, $query_string) or die(mysqli_error($conn));

// If query executed successfully, return success msg
if ($query_exe) {
	$res = 'Record reset successfully.';
}

// Return response
echo json_encode($res).' <a href="javascript:window.open(\'\',\'_self\').close();">Close this Window-Tab</a>';
exit();
?>