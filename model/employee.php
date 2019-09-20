<!------------------------------------------------------------------------------
  Modification Log
  Date          Name                Description
  ----------    -------------   -----------------------------------------------
  9-13-2019      Basir Qurbani      Project 4 assignment, Employee table.
  ----------------------------------------------------------------------------->
<?php
//getEmployee funtion selects value from the employeelist table and sends it to list_employee.php to display
     function getEmployees(){
        $db = Database::getDB();
        $query = 'SELECT * FROM employeelist
                  ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        $employees = $statement;

        return $employees;
    }
    
        
?>