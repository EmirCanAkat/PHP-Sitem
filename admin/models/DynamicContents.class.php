<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..') . $ds;

$DatabaseMysql = "{$base_dir}inc{$ds}DatabaseMysql.class.php"; 
require_once($DatabaseMysql);

/**
 * DynamicContents Class
 */
class DynamicContents
{
	// DB stuff
	private $conn;
	private $database;
	private $table = 'dynamic_contents';
	private $user_table = 'users';
	private $query_string;
	private $query_parse;
	private $ResultRecord;
	private $row;

	public function __construct()
	{
		// Instantiate DB & connect
		$this->database = new DatabaseMysql();
		$this->conn = $this->database->connect();

		$this->ResultRecord = array();
		$this->AdminRecord = array();
	}

	public function getData()
	{
		// Query String
		$this->query_string = "SELECT * FROM ".$this->table." ORDER BY flag_type";

        // Query execution
		$this->query_parse = mysqli_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

		while ($this->row = mysqli_fetch_object($this->query_parse)){

		  $this->ResultRecord[$this->row->flag_type][$this->row->flag_name] = [
		    "id" => $this->row->id,
		    "value" => $this->row->flag_value,
		    "created_at" => $this->row->created_at,
		    "updated_at" => $this->row->updated_at
		  ];
		}
		return $this->ResultRecord;
	}

	public function getAdminInfo()
	{
		// Query String
		$this->query_string = "SELECT * FROM ".$this->user_table."";

        // Query execution
		$this->query_parse = mysqli_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

		while ($this->row = mysqli_fetch_object($this->query_parse)){

		  $this->AdminRecord = [
		    "id" => $this->row->id,
		    "admin_name" => $this->row->name,
		    "admin_email" => $this->row->email,
		    "admin_pass" => $this->row->password
		  ];
		}
		return $this->AdminRecord;
	}
}