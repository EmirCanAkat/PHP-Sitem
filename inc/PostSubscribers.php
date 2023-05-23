<?php
include_once '../inc/DatabaseMysql.class.php';

/**
 * PostSubscribers Class
 */
class PostSubscribers
{
    // DB stuff
    private $conn;
    private $database;
    private $table = 'subscribers';
    private $query_parse;
    private $query_string;
    private $query_exe;
    private $records;
    // Init variables
    private $emailExists;
    private $email;
    private $created_at;
    private $response;

    public function __construct()
    {
        // Instantiate DB & connect
        $this->database = new DatabaseMysql();
        $this->conn = $this->database->connect();

        $this->query_exe = false;
    }

    public function insertSubscriber($data)
    {
        // Return response Default
        $this->response = [
            'success' => false,
            'msg' => "Something went wrong, please try again later!"
        ];

        if (isset($data['email'])) {

            // Input Sanitizations
            $this->email = isset($data['email']) ? mysqli_escape_string($this->conn, trim($data['email'])) : null;
            $this->created_at = date('Y-m-d H:i:s');

            // Query String
            $this->query_string = "SELECT * FROM ".$this->table." WHERE `email` = '".$this->email."';";

            // Query execution
            $this->query_parse = mysqli_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

            // Get record and check if record exists of not
            while ($this->row = mysqli_fetch_object($this->query_parse)){

                $this->emailExists = ($this->row->email) ? true : false;

            }

            // If not exists then Insert
            if ( ! $this->emailExists) {

                // Query String
                $this->query_string .= "INSERT INTO ".$this->table." (`email`, `created_at`) VALUES ('".$this->email."', '".$this->created_at."');";

                // Query execution
                $this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));
            }

            // Return response
            $this->response = [
                'success' => true,
                'msg' => "Aboneliğin Başarıyla Tamamlandı.Tebrikler!"
            ];

        }

        $this->conn->close();
        return $this->response;
    }
}


// Init Object
$postSubscribers = new PostSubscribers();

// Pass data to update into database
$res = $postSubscribers->insertSubscriber($_POST);

echo json_encode($res);