<?php

class Connection {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct() {
        // Create connection
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);

        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function createDatabase($dbName) {
        // Creating a database
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        if (mysqli_query($this->conn, $sql)) {
            echo "Database '$dbName' created or already exists.<br>";
        } else {
            echo "Error creating database: " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function selectDatabase($dbName) {
        // Select database
        if (!mysqli_select_db($this->conn, $dbName)) {
            die("Error selecting database '$dbName': " . mysqli_error($this->conn));
        }
    }

    public function createTable($query, $tableName = "Table") {
        // Creating a table
        if (mysqli_query($this->conn, $query)) {
            echo "Table '$tableName' created successfully.<br>";
        } else {
            echo "Error creating table '$tableName': " . mysqli_error($this->conn) . "<br>";
        }
    }

    public function __destruct() {
        // Close connection
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}

?>
