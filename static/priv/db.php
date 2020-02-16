<?php

    class DB {
        private $user = "root";
        private $pass = "mysql";
        private $server = "localhost";
        private $dbname;
        
        private $handle;

        function __construct($dbname)
        {
            try {
                $this->dbname = $dbname;
                $this->handle = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->user, $this->pass);
                $this->handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully";
            }
            catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function query($query, $data) {
            $stmt = $this->handle->prepare($query);
            $stmt->execute($data);
            return $stmt->fetchAll();
        }

        function run($query) {
            $stmt = $this->handle->prepare($query);
            $stmt->execute();
        }
    }

    $db = new DB("myDB");
?>