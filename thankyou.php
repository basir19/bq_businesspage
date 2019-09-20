<?php
    
    //sets value to the new defined veriables
    $error_message = FALSE;
    $visitor_fname = filter_input(INPUT_POST, 'fname');
    $visitor_lname = filter_input(INPUT_POST, 'lname');
    $visitor_country = filter_input(INPUT_POST, 'country');
    if($visitor_country === 'select One'){
        $visitor_country = 'County is Not Selected';
    }
    $commentBox = filter_input(INPUT_POST, 'commBox');
    
    // Validate inputs, if empty through an error message
    if ($visitor_fname == NULL || $visitor_lname == NULL ||
        $visitor_country == NULL || $commentBox == NULL) {
        $error = "Invalid input data. Check all fields and try again.";
        echo "Form Data Error: " . $error; 
        exit();
    } else {
        //connects to database and visitor pages
        include "./model/database.php";
        include "./model/visitor.php";
        $db = Database::getDB();
        //if unable to connect to database and/or visitor pages, throughs an error
        if (!is_object($db)){
            $message = "We are experiencing technical difficulties. Please check back later.";
        } else {
            //otherwise, adds posts the input value to database
            $vistors = add_visitor ($visitor_fname, $visitor_lname, $visitor_country, $commentBox);
            if ($visitor_fname == 1) {
                //throuhgs error message if the field is empty
                $message = "Unable to add to database. Please check back later.";
            } else{
                //displays a thank you message if everything is successfull
                $message = "Thank you, $visitor_fname, for contacting me! I will get back to you shortly.";
            }
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
       <h2><?php echo $message ?></h2>
    </div>
    <!--------------------------->

    <footer>
        <hr />
        <p><span>Galaxy</span> <u>Drone</u> &#8226; Software development class, CWI | Copyright &copy; 2019</p><br>

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
