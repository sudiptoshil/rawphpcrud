<?php
// class Database
// {
//     public $host = DB_HOST;
//     public $user = DB_USER;
//     public $password = DB_PASS;
//     public $dbname = DB_NAME;

//     public $link;
//     public $error;

//     public function __construct()
//     {
//         $this->dbconnect();
//     }

//     // create dbconnect  private method because we will not access this method from anywhere .
//     private function dbconnect()
//     {
//         $this->link = new mysqli($this->host, $this->user, $this->password, $this->dbname);

//         if (!$this->link) {
//             $this->error = "Connection Failed!!" . $this->link->connect_error;
//             return false;
//         }
//     }

//     public function select($query)
//     {
//         $result = $this->link->query($query) or die($this->link->error.__LINE__);
//         if($result->num_rows > 0) {
//             return $result;
//         } else {
//             return false;
//         }
//     }
// }
session_start();
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $dbname = DB_NAME;
    public $dbpass = DB_PASS;

    public $link;
    public $error;

    public function __construct()
    {
        $this->dbconnect();
    }

    private function dbconnect()
    {
        $this->link = new mysqli($this->host, $this->user, $this->dbpass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection Failed!!" . $this->link->connect_error;
            return false;
        }
    }

    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_row) {
            header("Location:index.php?message=" .urlencode("Infomation Saved Successfully!!"));
            exit();
        } else {
            // die("Error:(".$this->link->error . __LINE__.")".);
            die($this->link->error . __LINE__);
        }
    }

}
