<?php
    //defined variables getting input from the login page
    $action = filter_input(INPUT_POST, 'action');
    $useName = filter_input(INPUT_POST, 'userName');    
    $password = filter_input(INPUT_POST, 'password');
    $message = '';
    if ($action == NULL){
    echo $action;
   
    //validates that the input value is not empty
    } else if (empty($useName) || empty($password)) {
            $error = "Invalid input data. check all feilds and try again.";
            echo 'From Date error:'.$error;
            exit();
    } else {
        //if the input value is not empty, connects to the database and visitor pages and gets the value
        include "./model/database.php";
        include "./model/visitor.php";
        $db = Database::getDB();
        //if not successfully conncet to database, through error message
        if(!is_object($db)){
            $message = "we are experiencing technical difficulties. please check again later";
        } else {
            header("Location: admin_visitor.php");
        }
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
    <link rel="stylesheet" href="css/styles-contact.css">
    <script src="js/contact.js" async></script>

</head>
<!--------------------------->

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

    <!--------------------------->
    
    
    <div class="container">
       <h3>Please log in with your User Name and Password</h3>
       <hr>
       <h3 style="color:darkred; border-bottom: 1px solid darkred;"><?php echo '<br>'; echo $message ?></h3>
       <form name="contactpage" method="post" action="login.php">
            <label for="userName"><h3>User: </h3></label>
            <input type="text" id="userName" name="userName" placeholder="Your User" required>

            <label for="password"><h3>Password: </h3></label>
            <input type="text" id="password" name="password" placeholder="Your Password" required>

            <input type="hidden" name="action" value="action">

            <input type="submit" id="Submit" value="Submit">
        </form>
    </div>
    <!--------------------------->

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

</body>
</html>