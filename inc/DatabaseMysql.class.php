<?php
/**
 * Database Class
 */
class DatabaseMysql
{
	// Mysql DB Params
	private $Host = "localhost";
	private $User = "root";
	private $DataBase = "konser";
	private $Password = "";

	private $conn;

	public function __construct() {
        $this->conn = mysqli_connect($this->Host, $this->User, $this->Password) or die("Unable to Connect: " . mysqli_error($this->conn));
    }

	public function connect()
	{
		try {
			mysqli_select_db($this->conn, $this->DataBase);
			mysqli_query($this->conn, "SET NAMES 'utf8'");
	        mysqli_query($this->conn, "SET CHARACTER SET utf8");
	        mysqli_query($this->conn, "SET CHARACTER_SET_CONNECTION=utf8");
	        mysqli_query($this->conn, "SET SQL_MODE = ''");

		} catch (Exception $e) {
			echo trigger_error("Could not connect to the database", E_USER_ERROR);			
		}

		return $this->conn;
	}

	public function close() {
        mysqli_close($this->conn);
    }
}