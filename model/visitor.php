<!------------------------------------------------------------------------------
  Modification Log
  Date          Name                Description
  ----------    -------------   -----------------------------------------------
  9-13-2019     Basir Qurbani       Project 4 assignment, visitor table.
  ----------------------------------------------------------------------------->
<?php
    //get value from the contact.html page and add it to the visitor database
    function add_visitor ($visitor_fname, $visitor_lname, $visitor_country, $commentBox) {
        global $db;
//        $db = Database::getDB();
        $query = 'INSERT INTO visitor
                     (visitor_fname, visitor_lname, visitor_country, commentBox)
                  VALUES
                     (:visitor_fname, :visitor_lname, :visitor_country, :commentBox)';
        $statement = $db->prepare($query);
        $statement->bindValue(':visitor_fname', $visitor_fname);
        $statement->bindValue(':visitor_lname', $visitor_lname);
        $statement->bindValue(':visitor_country', $visitor_country);
        $statement->bindValue(':commentBox', $commentBox);
        $statement->execute();
        $statement->closeCursor();
    }
    
        //getVisitor selects value from visitor table and sends it to the admin_visitor.php page and display the value
        function getVisitors($visitorID){
        $db = Database::getDB();
        $query2 = 'SELECT * FROM visitor';
        $statement2 = $db->prepare($query2);
        //$statement2->bindValue(":employeeID", $employeeID);
        $statement2->execute();
        $visitors = $statement2;
        return $visitors;
    }
    // deletes the value from visitor table
    function deleteVisitor($visitorID){
        $db = Database::getDB();
        $visitorID = filter_input(INPUT_POST, 'visitorID', 
                FILTER_VALIDATE_INT);
        $query = 'DELETE FROM visitor
                  WHERE visitorID = :visitorID';
        $statement = $db->prepare($query);
        $statement->bindValue(':visitorID', $visitorID);
        $statement->execute();
        $statement->closeCursor();
    }
?>