<?php


   class Database {
        public static $conn;
        public static $query;
        public static $close;

        private static function connect() {
            $serversname = "localhost";
            $username = "root";
            $password = "";
            $db = "best_price";
            
            self::$conn = new mysqli($serversname,$username,$password,$db);
            self::$query = self::$conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
            if(self::$conn->connect_error){
                die("Connection faild:" . self::$conn->connect_error);
            }
            return self::$conn;
        }

        private static function close() {
            self::$conn->close();
        }

        public static function query($sql){
            self::connect();
            $result = self::$conn->query($sql);
            $rows = array();
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            self::close();
            return $rows;
        }

        public static function command($sql){
            self::connect();
            self::$conn->query($sql);
            $id = self::$conn->insert_id;
            self::close();
            return $id;
        }

        public static function del($sql){
            self::connect();
            $result = self::$conn->query($sql);
            self::close();
            return $result;
        }

        public static function update($sql){
            self::connect();
            $result = self::$conn->query($sql);
            self::close();
            return $result;
        }

    }   


?>