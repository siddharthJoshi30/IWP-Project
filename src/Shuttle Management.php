<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
  <title> Shuttle Management </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    .detail {
      height: 500px;
    }

    #pholder {
      max-height: 100px;
      max-width: 100px;
    }

    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }

    .wrapper {
      text-align: center;
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
  <!--header-->
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-shuttle-navbar-collapse-1">
          <span class="sr-only"> Toggle navigation </span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> <img src="../images/logo.png" alt="Smiley face"
            style="float:left;width:60px;height:36px;"><i>Express Shuttle</i> </a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="bs-shuttle-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <ul class="nav navbar-nav">
            <li> <a href="./admin.php"> Home </a> </li>
            <li> <a href="./about.html"> About </a> </li>
            <li> <a href="./homepage.php"> Logout </a> </li>

          </ul>
        </ul>
      </div>
    </div>
  </nav>
  <!--end of navbar-->
  <!--generic info-->
  <div class="container-fluid">
    <div class="col-md-4">
      <div class="panel panel-info" id="info">
        <div class="panel-heading">
          <h4 class="panel-title" align="center"> Your Information </h4>
        </div>

        <?php
//$_SESSION['logged_user']=1;
//session_start();
$server = "localhost";
$username = "sid3008";
$password = "Sid@30082002";
$db = "mysql";
$t = $_SESSION['logged_user'];
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
  die("Connection failed" . mysqli_connect_error());
}
$result = $conn->query("SELECT * FROM customer where cid = '$t'");
$row = $result->fetch_assoc();
//echo mysqli_num_rows($result1);
/*if (mysqli_num_rows($result)>0)
 {
 $count= mysqli_num_rows($result);
 }
 while($row = $res1->fetch_assoc()) 
 {*/

$n = $row['name'];
$e = $row['email'];
$g = $row['type'];

//mysqli_close($conn);

?>
        <div class="panel panel-body detail">
          <img id="pholder" class="center" src="../images/placeholder.png">
          <br>
          <br>
          <table class="table">
            <tr>
              <td align="center">Name:
                <?php echo "$n"; ?>
              </td>
            </tr>

            <tr>
              <td align="center">E-mail:
                <?php echo "$e"; ?>
              </td>
            </tr>
            <tr>
              <td align="center">Type:
                <?php echo "$g"; ?>
              </td>
            </tr>
          </table>
          <br>
          <br>
        </div>
      </div>
    </div>

    <!-- end of generic info-->
    <div class="col-md-8">
      <div class="panel panel-success">
        <div class="panel-heading" align="center"><b>Admin Options</b></div>
        <div class="panel-body log">
          <a href="no_shuttle.php">
            <h5 style="color:black;">Modify number of shuttles</h5>
          </a>
          <a href="shut.php">
            <h5 style="color:black;">View the number of students waiting</h5>
          </a>
          <div class="wrapper">
            <button onclick="location.href='http://localhost/iwp-project/IWP-Project/src/admin.php'" type="button" class="btn btn-primary"
              value="back">Back</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="footer">
    <p><b>Contact us:</b><br><br>
      Vellore Institute of Technology,<br> kadpadi, Vellore - 632004<br>
      Tamil Nadu, India<br><br>
    </p>
  </div>
  <div id="footer">
    <p><b>Call us:</b><br><br>
      General: 0416-2381010, +91 9488660000<br>
      If you know the extension number, please dial 0416-229-extn.no. or
      +91 949877-extn.no<br><br>
    </p>
  </div>
  <div id="footer">
    <p><b>Software Related:</b><br><br>
      Phone Number:<br> +91 8000338855<br>
      Whatsapp: 9385285957<br>
      Email: callcentre@xpressshuttle.ac.in
    </p>
  </div>
  <div id="footer">
    <p><b>Working hours:</b><br><br>
      Mon-Fri:<br> 6:00 am to 9:00 pm<br>
      Sat-Sun:<br> 8:00 am to 7:00 pm
    </p>
  </div>
  <div id="footer" style="width: 1500px;text-align:left;">
    <section id="social">
      <div class="container">
        <h3>Stay in touch!</h3>
        <div class="media">
          <a href="https://www.facebook.com/" id="f"><img src="../images/facebook.png" alt="not found"></a>
          <a href="https://www.instagram.com/" id="i"><img src="../images/instagram.png" alt="not found"></a>
          <a href="https://www.skype.com/en/" id="s"><img src="../images/skype.png" alt="not found"></a>
        </div>
      </div>
    </section>
    <p style="width: 1500px;text-align:center;">Developed by Anish Patankar, Dwija Patel and Siddharth Joshi
    </p>
  </div>

</body>

</html>