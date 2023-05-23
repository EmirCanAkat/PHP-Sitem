<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds . '..') . $ds;

$DatabaseMysql = "{$base_dir}inc{$ds}DatabaseMysql.class.php"; 
require_once($DatabaseMysql);

/**
 * Subscribers Class
 */
class Subscribers
{
	// DB stuff
	private $conn;
	private $database;
	private $table = 'subscribers';
	private $query_string;
	private $query_parse;
	private $ResultRecord;
	private $row;
	private $DeleteSubsId;
	private $resMsg;

	public function __construct()
	{
		// Instantiate DB & connect
		$this->database = new DatabaseMysql();
		$this->conn = $this->database->connect();

		$this->ResultRecord = array();
		$this->resMsg = 'error';
	}

	public function getData()
	{
		// Query String
		$this->query_string = "SELECT * FROM ".$this->table." ORDER BY created_at DESC";

        // Query execution
		$this->query_parse = mysqli_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

		while ($this->row = mysqli_fetch_object($this->query_parse)){

		  $this->ResultRecord[] = $this->row;
		}
		return $this->ResultRecord;
	}

	public function deleteData($postData)
	{
		$this->DeleteSubsId = isset($postData['DeleteSubsId']) ? (int) mysqli_escape_string($this->conn, trim($postData['DeleteSubsId'])) : null;

		if ($this->DeleteSubsId > 0) {
			// Query String
			$this->query_string = "DELETE FROM ".$this->table." WHERE `id` = ".$this->DeleteSubsId;

	        // Query execution
			$this->query_parse = mysqli_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			$this->resMsg = ($this->query_parse) ? 'success' : 'error';
		}

		return $this->resMsg;
	}
}