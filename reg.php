<!DOCTYPE html>
<html>
    <title>Active India</title>
    <meta content="">
    <head>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146504580-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146504580-1');
</script>
        <!--<div class="container">-->


        <style>.divider-text {
                position: relative;
                text-align: center;
                margin-top: 15px;
                margin-bottom: 15px;
            }
            .divider-text span {
                padding: 7px;
                font-size: 12px;
                position: relative;   
                z-index: 2;
            }
            .divider-text:after {
                content: "";
                position: absolute;
                width: 100%;
                border-bottom: 1px solid #ddd;
                top: 55%;
                left: 0;
                z-index: 1;
            }

            .btn-facebook {
                background-color: #405D9D;
                color: #fff;
            }
            .btn-twitter {
                background-color: #42AEEC;
                color: #fff;
            }</style>

    </head>
    <body>
        <div class="card bg-light"style="background-image: url(image/global_connectivity.jpg);width: 100%;">
            <article class="card-body mx-auto" style="max-width: 400px;">
<!--                <h4 class="card-title mt-3 text-center"style="color: #fff;">Create Account</h4>
                <p class="text-center"style="color: #fff;">Get started with your free account</p>
                <p>
                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
                </p>
                <p class="divider-text">
                    <span class="bg-light">OR</span>
                </p>-->
                <form action="" name="myForm" method="post" enctype="multipart/form-data"onsubmit="return validateForm()">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="fullname" class="form-control" placeholder="Full name *" type="text">
                        <p id="name"style="color: red;"></p>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email address *" type="email">
                        <p id="email"style="color: red;font-size: xx-small;"></p>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 120px;">
                            <option selected="">+91</option>

                        </select>
                        <input name="mobile" class="form-control" placeholder="Phone number *"pattern="[6789][0-9]{9}"maxlength="10"minlength="10" type="tel">
                        <p id="mobile"style="color: red;font-size: xx-small;"></p>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                        </div>
                        <select name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>

                        </select>
                    </div> <!-- form-group end.// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                        </div>
                        <input class="form-control"name="dob" placeholder="DateOf Birth" type="date">
                        <p id="dob"style="color: red;font-size: xx-small;"></p>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control"name="password" placeholder="Create password *" type="password">
                        <p id="password"style="color: red;font-size: xx-small;"></p>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control"name="repassword" placeholder="Repeat password *" type="password">
                        <p id="repassword"style="color: red;font-size: xx-small;"></p>
                    </div> <!-- form-group// -->                                      
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account  </button>
                    </div> <!-- form-group// -->      
                    <p class="text-center"style="color: #fff;">Have an account? <a href="sign-in.php">Log In</a> </p>                                                                 
                </form>
            </article>
        </div> 
    </body>
    <script>
        function validateForm() {
            var fullname = document.forms["myForm"]["fullname"].value;
            var email = document.forms["myForm"]["email"].value;
            var mobile = document.forms["myForm"]["mobile"].value;
            var gender = document.forms["myForm"]["gender"].value;
            var dob = document.forms["myForm"]["dob"].value;
            var password = document.forms["myForm"]["password"].value;
            var repassword = document.forms["myForm"]["repassword"].value;
            if (fullname == "") {
                alert("Name must be filled out");
                return false;
            }
            if (email == "") {
                alert("Name must be filled out");
                return false;
            }
            if (mobile == "") {
                alert("Name must be filled out");
                return false;
            }
            if (gender == "") {
                alert("Name must be filled out");
                return false;
            }
            if (dob == "") {
                alert("Name must be filled out");
                return false;
            }
            if (password == "") {
                alert("Name must be filled out");
                return false;
            }
            if (repassword == "") {
                alert("Name must be filled out");
                return false;
            }
        }
    </script>
</html>
<?php
require './config.php';
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if ($password = $repassword) {
        $sql = "INSERT INTO `user` (`id`, `full_name`, `gender`, `date_of_birth`, `country`, `mobile`, `email`, `password`, `account_date`, `status`) VALUES (NULL, '$fullname', '$gender', '$dob', 'india', '$mobile', '$email', '$password', CURRENT_TIMESTAMP, 'P');";
        if (mysqli_query($link, $sql)) {
            ?>
            <script>window.location = "index.php";
            </script><?php } else {
            ?>
            <script>alert("ther is some problem !");</script> 
            <?php
        }
    }
    mysqli_close($link);
}
?>