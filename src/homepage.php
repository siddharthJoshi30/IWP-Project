<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Shuttle: Travel along! </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2018.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function display() {
            if (document.patientreg.name.value == "") {
                alert("Please provide your Name!");
                document.patientreg.textnames.focus();
                return false;
            }
            var email = document.patientreg.emailid.value;
            atpos = email.indexOf("@");
            dotpos = email.lastIndexOf(".");
            if (email == "" || atpos < 1 || (dotpos - atpos < 2)) {
                alert("Please enter correct email ID")
                document.patientreg.emailid.focus();
                return false;
            }
            alert("Account Created Successfully");
        }
    </script>
    <style>
        #homepage {
            height: 100px;
        }

        #team {
            color: black;
        }

        #reason {
            height: 25%;
        }

        #help {
            padding-right: 20px;
        }

        .carousel-indicators {
            bottom: 0;
        }

        img {
            display: block;
            max-width: 1000px;
            max-height: 1000px;
            width: auto;
            height: auto;
        }

        input {
            width: 20%;
        }

        #form1 {
            padding: 20px;
            margin: 0px;
            height: 450px;
        }

        #form2 {
            height: 470px;
            padding-top: 100px;
        }

         .tree {
            height: 540px;
            overflow-y: scroll;
        }

        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 15px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #ccc;
            
        }

        /* When the radio button is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

        /* Create a custom checkbox */
        .checkmarks {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmarks {
            background-color: #ccc;
            
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmarks {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmarks:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmarks:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmarks:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        #photo {
            max-height: 400px;
            max-width: 250px;
            padding-top: 20px;
            padding-left: 20px;
            
        }

        #photo1 {
            max-height: 300px;
            max-width: 250px;
            padding-top: 20px;
            padding-left: 20px;
        }

        #adv {
            border-left: 6px solid white;
        }

        #footer {
            background-color: #333;
            color: #878787;
            width: 375px;
            padding: 25px;
            margin: 0px;
            border: 5px solid #333333bf;
            float: left;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        #social {
            padding: 15px;
            text-transform: uppercase;
        }

        #social .media #i,
        #social .media #s,
        #social .media #t {
            padding-right: 10px;
            
        }

        #social .media #f {
            padding-right: 12px;
        }

        #social .media {
            width: 20%;
            display: flex;
        }
    </style>
</head>

<body style="background-color: powderblue;">
    <!--navbar-->
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-tarPOST="#bs-shuttle-navbar-collapse-1">
                    <span class="sr-only"> Toggle navigation </span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> <img src="../images/logo.png" alt="Smiley
face" style="float:left;width:60px;height:36px;"><i>Express Shuttle</i> </a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="bs-shuttle-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <div class="collapse navbar-collapse navbar-right" id="bs-shuttle-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li> <a href="#"> Home </a> </li>
                            <li> <a href="./about.html"> About </a> </li>
                            <li> <a href="feedback.php"> Feedback </a> </li>
                            
                            <li><button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                    data-target="#myModal">Login</button> </li>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Login</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form2" method="post" action="#">
                                                <div class="form-group has-feedback">
                                                    <label for="username">Email id:</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Email" name="email">
                                                    <i class="glyphicon glyphicon-map-marker form-control-feedback"></i>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="mail">Password</label>
                                                    <input type="Password" class="form-control" id="password"
                                                        placeholder="Password" name="password">
                                                    <i class="glyphicon glyphicon-map-marker form-control-feedback"></i>
                                                </div>
                                                <button type="submit" name="login" value="login" class="btn
btn-primary">Login</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    14
                                </div>
                            </div>
                        </ul>
                    </div>
            </div>
    </nav>
    <!--end of navbar-->
    <div class="container-fluid">
        <div class="col-md-4 w3-animate-left" id="team" align="center">
            <div class="bg-light text-dark">
                <div class="panel panel-info" style="overflow-y: scroll;">
                    <div class="panel-heading">
                        <h4 class="panel-title"> Sign-up with Shuttle </h4>
                    </div>
                    <div class="panel panel-body">
                        <form id="form1" action="#myModal1" method="POST">
                            <div class="form-group has-feedback">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                    required>
                                <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                                <i class="glyphicon glyphicon-envelope form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password">Password:</label>
                                <input type="Password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            <label class="container">User
                                <input type="radio" checked="checked" name="radio" id="type" value="user">
                                <span class="checkmark"></span>
                                
                            </label>
                            <label class="container">Admin
                                <input type="radio" name="radio" id="type" value="admin">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">I accept to the terms and conditions
                                <input type="checkbox" required>
                                <span class="checkmarks"></span>
                            </label>
                            <button name="add" type="submit" value="add" class="btn btn-primary" onclick="display()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <img src="../images/bus.gif" style="float:right;width:800px;height:500px;" alt="A
comfortable shuttle ride round the corner">
        </form>
    </div>
    </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="jumbotron" align="center">
                <h2> How can we help you? </h2>
            </div>
        </div>
    </div>
    <!--carousel type content-->
    <div class="container-fluid">
        <div class="col-md-3">
            16
            <div class="w3-container w3-2018-sailor-blue w3-hover-black w3-animate-bottom" id="adv">
                <img id="photo" src="../images/money.jpg">
                <h2>Easy credit transfer</h2>
                <p>You can easily add credit to your account</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="w3-container w3-2018-sailor-blue w3-hover-black w3-animate-bottom" id="adv">
                <img id="photo" src="../images/track.png">
                <h2>Track your shuttle</h2>
                <p>Easy tracking with our GPS tracking facility</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="w3-container w3-2018-sailor-blue w3-hover-black w3-animate-bottom" id="adv">
                <img id="photo" src="../images/security.jpg">
                <h2>Security</h2>
                <p>Safe and secure money transfer and travelling </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="w3-container w3-2018-sailor-blue w3-hover-black w3-animate-bottom" id="adv">
                <img id="photo" src="../images/time.jpg">
                <h2>Time management</h2>
                <p>Save your time by tracking when the nearest shuttle will arrive</p>
            </div>
        </div>
    </div>
    </div>
    <!--end of carousel type content-->
    <!-- footer-->
    
    <div id="footer">
        <p><b>Contact us:</b><br><br>
            Vellore Institute of Technology,<br> kadpadi, Vellore - 632014<br>
            Tamil Nadu, India<br><br><br>
        </p>
    </div>
    <div id="footer">
        <p><b>Call us:</b><br><br>
            General: 0416-2381010, +91 9488660000<br>
            If you know the extension number, please dial 0416-229-extn.no. or
            +91 949877-extn.no
        </p>
    </div>
    <div id="footer">
        <p><b>Software Related:</b><br><br>
            Phone Number:<br> +91 8000338855<br>
            Whatsapp: 9385285957<br>
            Email: callcentre@xpressshuttle.ac.in
        </p><br>
    </div>
    <div id="footer">
        <p><b>Working hours:</b><br><br>
            Mon-Fri:<br> 6:00 am to 9:00 pm<br><br>
            Sat-Sun:<br> 8:00 am to 7:00 pm
        </p>
    </div>
    <div id="footer" style="width: 1500px;text-align:left;">
        <section id="social">
            <div class="container">
                <h3>Stay in touch!</h3>
                <div class="media">
                    <a href="https://www.facebook.com/" id="f"><img src="../images/social/facebook.png"
                            alt="not found"></a>
                    <a href="https://www.instagram.com/" id="i"><img src="../images/social/instagram.png"
                            alt="not found"></a>
                    
                    <a href="https://www.skype.com/en/" id="s"><img src="../images/social/skype.png" alt="not found"></a>
                </div>
            </div>
        </section>
        <p style="width: 1500px;text-align:center;">Developed by Anish Patankar,
        Dwija Patel and Siddharth Joshi</p>
    </div>
    <!-- footer ends -->

<?php
    if(isset($_POST['add']))
    {
        $n= $_POST['name'];
        $e= $_POST['email'];
        $l= $_POST['password'];
        $g= $_POST['radio'];
        $server="localhost";
        $username="sid3008";
        $password="Sid@30082002";
        $db="mysql";
        $conn = new mysqli($server,$username,$password,$db);
        if($conn->connect_error){
            die("Connection failed".mysqli_connect_error());
        }
        else
        {
            echo 'successful';
            echo $n;
            echo $e;
            echo $l;
            echo $g;
            $conn->query ("INSERT INTO customer(name,email,password,type) VALUES
                ('$n','$e','$l','$g')");
                unset ($_POST['add']);
        }
    }

    if (isset($_POST['login']))
    {
        $server="localhost";
        $username="sid3008";
        $password="Sid@30082002";
        $db="mysql";
        $conn = new mysqli($server,$username,$password,$db);
        if($conn->connect_error){
            die("Connection failed".mysqli_connect_error());
        }
        else {
             $u= $_POST["email"];
            $e= $_POST["password"];
 #$sql= "select * from customer where email='$u' AND password='$e' ";
 #$result= mysqli_query($conn, $sql);
            $sql1="select * from customer where email='$u' AND password='$e' AND
            type='user'";
            $sql2="select * from customer where email='$u' AND password='$e' AND
            type='admin'";
            $result1=mysqli_query($conn,$sql1);
            $result2=mysqli_query($conn,$sql2);
            $row1 = mysqli_fetch_assoc($result1);
            $row2 = mysqli_fetch_assoc($result2);
            if (mysqli_num_rows($result1)>0)
            {
                $_SESSION['logged_user']= $row1['cid'];
                echo '<script type="text/javascript">
                window.location = "http://localhost/iwp-project/IWP-Project/src/user.php";
                </script>';
            }
            else if (mysqli_num_rows($result2)>0)
            {
                $_SESSION['logged_user']= $row2['cid'];
                echo '<script type="text/javascript">
                window.location = "http://localhost/iwp-project/IWP-Project/src/admin.php";
        
                </script>';
            }
            else
            {
                echo '<script type="text/javascript">
                window.location="http://localhost/iwp-project/IWP-Project/src/homepage.php";
                window.alert("Invalid Username or password");
                
                </script>';
            }
            unset ($_POST['login']);
        }
    }
 ?>
</body>

</html>