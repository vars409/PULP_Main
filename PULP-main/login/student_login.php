<?php
    session_start();
    require_once('../server/connection.php');
    require_once("../header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
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
                    <label for="studentID" class="txtlabel">Student ID</label>
                    <input type="number" name="studentID" class="form-control" id="studentID" required>
                </div>
                <div class="txtDiv">
                    <label for="pwd" class="txtlabel">Password</label>
                    <input type="password" name="pwd" class="form-control" id="pwd" required>
                </div>
                
                    
               
                
                    <input type="submit" name="login" value="Login" class="btn btn-success lgnbuttn">
                
                <a href="./student_register.php" class="btn btn-warning signupbuttn">Sign Up</a>


            </form>
        </div>
        
        <?php
            if(isset($_POST['login'])){
                $id = $_POST['studentID'];
                $pwd = $_POST['pwd'];
                $sql = "SELECT *  FROM `student_record` WHERE `student_ID` = ${id} AND `student_PASSWORD` = '${pwd}'";
                $result = $conn->query($sql);
                $rows = $result->num_rows;
                if($rows == 1){
                    $_SESSION['logged_in'] = true;
                    $_SESSION['role'] = 'student';
                    $_SESSION['id'] = $id;
                    $id = $_SESSION['id'];
                    $sql = "SELECT `status` FROM `student_record` WHERE `student_ID` = ${id}";
                    $result = $conn->query($sql);
                    $data = $result->fetch_assoc();
                    $status = $data['status'];
                    if($status){
                        header("Location: ./../student/");
                    }
                    else
                        echo '<div class="alert alert-danger center" role="alert" >Account Not YET VERIFIED BY HOD</div>';
                } else {
                    echo '<div class="alert alert-danger center" role="alert" >Student with this credentials wasn\'t found</div>';
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