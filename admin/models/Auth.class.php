<?php
/**
 * Authentication Class
 */
class Auth
{
	// DB stuff
	private $conn;
	private $query_string = "";
	private $query_parse = "";
	private $exe_status = false;
	private $return_result = array();
	private $login_status;
	private $login_reason = "Unknown";

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function getAuth($data)
	{
		$user_id = (isset($data->user_id)) ? $data->user_id : "";
		$user_pass = (isset($data->user_pass)) ? $data->user_pass : "";
		$device_id = (isset($data->device_id)) ? $data->device_id : "";
		$device_info = (isset($data->device_info)) ? $data->device_info : "";
		$login_time = (isset($data->login_time)) ? date( 'Y-m-d h:i:s A', strtotime($data->login_time) ) : "";

		$this->query_string = "SELECT UPPER(TRIM(U.USER_ID)) USER_ID, UPPER(TRIM(U.USER_TYPE)) USER_TYPE, A.CUSTOMER_CODE STORE_ID, A.CUSTOMER_NAME, A.CUSTOMER_NAME_B, A.CUSTOMER_ADDRESS_B, A.OWNER_FULL_NAME, A.OWNER_FULL_NAME_B, TRIM(U.PASSWORD) PASSWORD, U.DEVICE, U.ACTIVE, A.CUSTOMER_ADDRESS, A.F_CUSTOMER_TYPE FROM USER_TBL U, AGENTS A WHERE U.USER_ID = A.CUSTOMER_CODE(+) AND UPPER(TRIM(U.USER_ID)) = UPPER(TRIM('$user_id')) AND TRIM(U.PASSWORD) = TRIM('$user_pass') AND U.ACTIVE = 1";
		// Query execution
		$this->query_parse = oci_parse($this->conn, $this->query_string);
		$this->exe_status = oci_execute($this->query_parse);
		// Fetch records
		$record = ($this->exe_status) ? oci_fetch_object($this->query_parse) : array();

		if (isset($record->USER_ID) && ($record->USER_ID == $user_id)) {

			$this->query_string = "SELECT TRIM(U.USER_ID) USER_ID, D.DEVICE_ID, D.IS_APPROVE FROM USER_TBL U, POS_DEVICES D WHERE TRIM(U.USER_ID) = D.USER_ID AND TRIM(U.USER_ID) = TRIM('$user_id') AND D.DEVICE_ID = TRIM('$device_id')";
			// Query execution
			$this->query_parse = oci_parse($this->conn, $this->query_string);
			$this->exe_status = oci_execute($this->query_parse);
			// Fetch records
			$device_record = ($this->exe_status) ? oci_fetch_object($this->query_parse) : array();

			// 2019-10-13 02:27:28 AM
			$REQ_DATE = date( 'Y-m-d h:i:s A' );

			if (isset($device_record->DEVICE_ID) && ($device_record->IS_APPROVE == 1)) {
				$this->login_status = 'succeed';
				$this->login_reason = '';
				$this->return_result = $record;
			} else if (isset($device_record->DEVICE_ID) && ($device_record->IS_APPROVE == 0)) {
				$this->login_status = 'failed';
				$this->login_reason = 'Device approval request is pending!';
				$this->return_result = array(
					'login_msg' => $this->login_reason
				);

				$this->query_string = "UPDATE POS_DEVICES SET REQ_DATE = to_date('".$REQ_DATE."', 'YYYY-MM-DD HH:MI:SS AM') WHERE DEVICE_ID = '".$device_record->DEVICE_ID."' AND USER_ID = '".$record->USER_ID."'";
				// Query execution
				$this->query_parse = oci_parse($this->conn, $this->query_string);
				$this->exe_status = oci_execute($this->query_parse);
			} else {
				$this->login_status = 'failed';
				$this->login_reason = 'Device approval request has been sent!';
				$this->return_result = array(
					'login_msg' => $this->login_reason
				);

				$this->query_string = "INSERT INTO POS_DEVICES (ID, USER_ID, DEVICE_ID, DEVICE_INFO, IS_APPROVE, REQ_DATE) VALUES (NEXT_ID('POS_DEVICES'), '".$user_id."', '".$device_id."', '".$device_info."', 0, to_date('".$REQ_DATE."', 'YYYY-MM-DD HH:MI:SS AM') )";
				// return $this->query_string;
				// Query execution
				$this->query_parse = oci_parse($this->conn, $this->query_string);
				$this->exe_status = oci_execute($this->query_parse);
			}

		} else {
			$this->login_status = 'failed';
			$this->login_reason = 'UserID/Password is not correct!';
			$this->return_result = array(
				'login_msg' => $this->login_reason
			);
		}

		$this->query_string = "INSERT INTO POS_LOGIN_LOG (ID, USER_ID, TRIED_PASS, DEVICE_ID, DEVICE_INFO, LOGIN_TIME, LOGIN_STATUS, LOGIN_REASON) VALUES (NEXT_ID('POS_LOGIN_LOG'), '".$user_id."', '".$user_pass."', '".$device_id."', '".$device_info."', to_date('".$login_time."', 'YYYY-MM-DD HH:MI:SS AM'), '".$this->login_status."', '".$this->login_reason."' )";
		// Query execution
		$this->query_parse = oci_parse($this->conn, $this->query_string);
		$this->exe_status = oci_execute($this->query_parse);

        return $this->return_result;
	}
}