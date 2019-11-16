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

        //echo "construct";
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
        if ($this->conn->query($query) === TRUE) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    function getRows($query)
    {
        $rows = array();
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $rows[] = $row;
                //echo "id: " . $row["ID"]. " - Name: " . $row["PName"]. " " . $row["Barcode"]. "<br>";
            }
        } 
        else 
        {
            echo "zero rows ";
            if($this->conn->error)
            {
                echo $this->conn->error;
            }
        }
        return $rows;
    }

    function numRows($query)
    {
    }


}
?>