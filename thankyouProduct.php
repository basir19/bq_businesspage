<?php
    
    $customer_name = filter_input(INPUT_POST, 'customer_name');
    $customer_email = filter_input(INPUT_POST, 'customer_mail');
    
    $customer_subscribe = filter_input(INPUT_POST, 'customer_subscribe');
    if($customer_subscribe === NULL){
        $customer_subscribe = "No";
    } else {
        $customer_subscribe = "Yes";       
    }
 
    if ($customer_name == NULL || $customer_email == NULL) {
        $error = "Invalid input data. Check all fields and try again.";
        echo "Form Data Error: " . $error; 
        exit();
        } else {
            $dsn = 'mysql:host=localhost;dbname=contactpage'; // the name of the database for the website
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "DB Error: " . $error_message; 
                exit();
            }

            // Add the product to the database  
            $query = 'INSERT INTO productcustomer
                         (customer_name, customer_mail,customer_subscribe)
                      VALUES
                         (:customer_name, :customer_mail,:customer_subscribe)';
            $statement = $db->prepare($query);
            $statement->bindValue(':customer_name', $customer_name);
            $statement->bindValue(':customer_mail', $customer_email);
            $statement->bindValue(':customer_subscribe', $customer_subscribe);
            $statement->execute();
            $statement->closeCursor();
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
       <h2>Thank you, <?php echo $customer_name; ?>, for contacting me! I will get back to you shortly.</h2>
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
