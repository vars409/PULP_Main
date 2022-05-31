<?php
    session_start();
    require_once('../server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../js/venobox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="sliderSec">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <img src="../css/images/p1.png" alt="img1" width="1500" height="300">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
    <div class="item">
    <img src="../css/images/p3.png" alt="img1" width="1500" height="300">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
    <div class="item">
    <img src="../css/images/p4.png" alt="img1" width="1500" height="300">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
  </div>

  <!-- Controls -->
<!--   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>
</section>
<section class="lgnSec">
    <div class="container-fluid">
        <div class="headerTwo">
        <h1>STUDENT LOGIN <a class="btn btn-primary buttn" href="./hod_login.php">HOD login</a></h1>
     </div>
        <div class="lgnDiv">
            <form method="POST" action="#">
                <div class="txtDiv">
                    <label for="studentFName" class="left">Student First Name</label>
                    <input type="text" name="studentFName" class="form-control" id="studentFName" required>
                </div>
                <div class="txtDiv">
                    <label for="studentLName" class="left">Student Last Name</label>
                    <input type="text" name="studentLName" class="form-control" id="studentLName" required>
                </div>
                <div class="txtDiv">
                    <label for="studentEmail" class="left">Student Email</label>
                    <input type="email" name="studentEmail" class="form-control" id="studentEmail" required>
                </div>
                <div class="txtDiv">
                    <label for="pwd" class="left">Password</label>
                    <input type="password" name="pwd" class="form-control" id="pwd" required>
                </div>
                <div class="left">
                    <a href="../student_login.php" class="btn btn-success lgnbuttn">Sign In</a>
                </div>
                <div class="right">
                    <input type="submit" name='register' value="Sign Up" class="btn btn-warning signupbuttn">
                </div>
            </form>
        </div>
        
        <?php
            if(isset($_POST['register'])){
                $fName = $_POST['studentFName'];
                $lName = $_POST['studentLName'];
                $email = $_POST['studentEmail'];
                $pwd = $_POST['pwd'];
                $sql = "INSERT INTO `student_record` (`student_ID`, `student_EMAIL`, `student_FIRST_NAME`, `student_LAST_NAME`, `student_PASSWORD`) VALUES (NULL, '${email}', '${fName}', '${lName}', '${pwd}')";
                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id;
                    $_SESSION['logged_in'] = true;
                    $_SESSION['role'] = 'student';
                    $_SESSION['fname'] = $fName;
                    $_SESSION['lname'] = $lName;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $last_id;
                    echo '<div class="alert alert-success center" role="alert">Account Created Successfully, Your ID is: '.$_SESSION['id'].'</div>';
                    echo '<div class="alert alert-success center" role="alert">Your Application is Now waiting for Approval by HOD</div>';
                } else {
                    echo '<div class="alert alert-danger center" role="alert" >'. $conn->error .'</div>';
                }
                $conn->close();
            }
        ?>
    </div>
        </section>
        
         <script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/venobox.min.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>
