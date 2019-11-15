<?php
class dbcntrl
{
    private $conn;

    private $dbuser;
    private $dbpass;
    private $dbserver;
    private $dbname;


    function __construct($dbuser, $dbpass, $dbserver, $dbname)
    {
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbserver= $dbserver;
        $this->dbname = $dbname;

        echo "construct";
        $this->conn = $this->connect();
        if($this->conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    function connect()
    {
        return new mysqli($this->dbserver, $this->dbuser, $this->dbpass, $this->dbname);
    }

    function createTable($query)
    {
        if($this->conn->query($query) === true)
        {
            echo "Table created.";
        }
        else
        {
            echo "Erro creating tabel " . $this->conn->error;
        }

    }

    function runQuery($query)
    {
        if ($this->conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function numRows($query)
    {
    }


}
?>