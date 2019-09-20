<!------------------------------------------------------------------------------
  Modification Log
  Date          Name                Description
  ----------    -------------   -----------------------------------------------
  9-13-2019     Basir Qurbani       Project 4 assignment, employees.
  ----------------------------------------------------------------------------->
<?php
    //performs connection to the mySql databas
    class Database {
        private static $dsn = 'mysql:host=localhost;dbname=contactpage';
        private static $username = 'root';
        private static $password = 'Pa$$w0rd';
        private static $db;
       
        //assings value from employee table to new veriables
        private function __construct() {
        }

        public static function getDB() {
            if (!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn, self::$username, self::$password);
                } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
                }
            }
            return self::$db;
        }

    }
    
    //assings value from employeelist table to new defined veriables 
    class Employee {

        private $id;
        private $firstName;
        private $lastName;

        //assings value from employee table to new veriables
        public function __construct($id, $firstName, $lastName) {
            $this->EmployeeID = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }

        public function getID() {
            return $this->id;
        }

        public function setID($value) {
            $this->id = $value;
        }

        public function getfirstName() {
            return $this->firstName;
        }

        public function setfirstName($value) {
            $this->firstName = $value;
        }
        public function getlastName() {
            return $this->firstName;
        }

        public function setlastName($value) {
            $this->lastName = $value;
        }
    }
    //gets EmployeeDB values
    class EmployeeDB {
        public static function getEmployee() {
            $db = Database::getDB();
            $query = 'SELECT * FROM employeelist
                              ORDER BY employeeID';
            $statement = $db->prepare($query);
            $statement->execute();

            $employees = array();
            foreach ($statement as $row) {
                $employee = new Employee($row['employeeID'],
                                            $row['firstName'],
                                            $row['lastName']);
                $employees[] = $employee;
            }
            return $employees;
        }
    }
    $employees = EmployeeDB::getEmployee();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/base.css" />
        <link href="css/visitorStyle.css" rel="stylesheet" type="text/css"/>
        <script src="js/contact.js" async></script>
    </head>
    <!-------------end of HTML Head-------------->

    <body>
        <header>
            <div class="logo"><span>Galaxy</span> Drone</div>
            <label class="toggle" for="toggle">&#9776</label>
        </header>

        <nav class="nav">
            <input type="checkbox" id="toggle">
            <ul class="menu">
                <li><a href="home.html"><span class="fa fa-home"></span>Home</a></li>
                <li><a href="list_employee.php"><span class="fa fa-users"></span>Employees</a></li>
                <li><a href="products.html"><span class="fa fa-list"></span>Our Prodcucts</a></li>
                <li><a href="login.php"><span class="fa fa-user"></span>Admin</a></li>
                <li><a href="contact.html"><span class="fa fa-info"></span>Contact Us</a></li>            
            </ul>
        </nav>
        
        <hr />

        <!--------------end of nav bar------------->
        
        <!-- employee table starts -->
        <table class="visitorTable">
            <tr>
                <th>Fist Name</th>
                <th>Last Name</th>
            </tr>
            <?php foreach($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee->getFirstName(); ?></td>
                    <td><?php echo $employee->getlastName(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
       <!-- End of employee table  -->
        <footer>
            <hr />
            <p><span>Galaxy</span> <u>Drone</u> &#8226; Software development class, CWI | Copyright &copy; 2019 | <a href="admin_visitor.php" target="_blank">Click here for Admin Page</a></p><br> 

            <section class="footerIcons">
                <a href="https://www.plus.google.com" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            </section>
        </footer>
        <!------------end of footer--------------->

    </body>
</html>
