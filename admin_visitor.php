<!------------------------------------------------------------------------------
  Modification Log
  Date          Name                Description
  ----------    -------------   -----------------------------------------------
  9-13-2019      Basir Qurbani       Project 4 assignment; admin page
  ----------------------------------------------------------------------------->
<?php
    //calls the database, visitor and employee pages, if not successful through an error message
   try {
        include_once './model/database.php';
        include "./model/visitor.php";
        include "./model/employee.php";
    } catch (PDOException $e) {
        echo 'Connection error: ' . $e->getMessage();
        exit();
    }

    $action = filter_input(INPUT_POST, 'action');

    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_visitors';
        }
    }  
    // List the visitors
    if ($action == 'list_visitors') {
            $visitors = getVisitors('visitorID');
    }
    // deletes when user click on delete button
    else if ($action == 'delete_visitor') {
        deleteVisitor('visitorID');
        header("Location: admin_visitor.php");
    }

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
    <!-------------Nav bar starts-------------->
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
        <!--------------Nav Bar Ends------------->
        <!-- list of visitor list in a table starts -->
        <table class="visitorTable">
            <tr>
                <th>Fist Name</th>
                <th>Last Name</th>
                <th>Country</th>
                <th>Comment</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($visitors as $visitor) : ?>
                <tr>
                    <td><?php echo $visitor['visitor_fname']; ?></td>
                    <td><?php echo $visitor['visitor_lname']; ?></td>
                    <td><?php echo $visitor['visitor_country']; ?></td>
                    <td><?php echo $visitor['commentBox']; ?></td>
                    <td>
                        <form action="admin_visitor.php" method="post">
                            <input type="hidden" name="action"
                                   value="delete_visitor">
                            <input type="hidden" name="visitorID"
                                   value="<?php echo $visitor['visitorID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
       <!-- visitor table ends-->
        <!-------------footer starts-------------->
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
        <!------------footer ends--------------->

    </body>
</html>
