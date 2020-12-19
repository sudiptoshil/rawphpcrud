<?php
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

    public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($update_row) {
            header("Location:index.php?message=" .urlencode("Infomation Updated Successfully!!"));
            exit();
        } else {
            // die("Error:(".$this->link->error . __LINE__.")".);
            die($this->link->error . __LINE__);
        }
    }

}
