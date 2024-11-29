<?php
class ketnoi
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "btlwebt7";
    protected $conn;

    // Constructor to establish the connection
    function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    public function getConn()
    {
        return $this->conn;
    }
}
?>
