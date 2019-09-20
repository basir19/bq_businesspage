<!------------------------------------------------------------------------------
  Modification Log
  Date          Name                Description
  ----------    -------------   -----------------------------------------------
  9-13-2019      Basir Qurbani       Project 4 assignment; Database
  ----------------------------------------------------------------------------->
<?php
//database class performs connection to the mySql databas
    class Database {
        private static $dsn = 'mysql:host=localhost;dbname=contactpage55';
        private static $username = 'root';
        private static $password = 'Pa$$w0rd';
        private static $db;

        //calls the funtion from list_employee.php
        private function __construct() {}

        //getDB() functin initialize connection to the mySql database, if not successful, will through an error message
        public static function getDB() {
            if (!isset(self::$db)){
                try {
                    self::$db = new PDO(self::$dsn, 
                                        self::$username, 
                                        self::$password);
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
//                    echo "DB Error: " . $error_message; # this line of code doest not allow the error message to pass
//                    exit();
                    return $error_message;
                }
            } else {
                $error_message = FALSE;
                return $error_message;
            }
            return self::$db;
        }
    }

?>

