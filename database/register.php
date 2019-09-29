<?php
require './config.php';

if (isset($_POST['submit'])) {
    $b1 = $_POST['firstname'];
    $b2 = $_POST['lastname'];
    $b3 = $_POST['gender'];
    $b4 = $_POST['mobile'];
    $b5 = $_POST['email'];
    $b6 = $_POST['password'];
    $b7 = $_POST['repassword'];
    if ($b6 == $b7) {
        $sql = "INSERT INTO `reg_log` (`id`, `firstname`, `lastname`, `gender`, `mobile`, `email`, `password`) VALUES (NULL, '$b1', '$b2', '$b3', '$b4', '$b5', '$b6')";

        if (mysqli_query($connection, $sql)) {
            ?><script>
                            window.location = "Login.php";
            </script>
            <?php
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MRG The Balcony, Sector-93, Gurgaon</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

    </head>

    <body class="bg-dark">

        <div class="container"style="display: block;margin-left: auto;margin-right: auto;margin-top:10%;width: 40%;padding: 20px;border-radius: 5%;border-color: #a3b9c6;border-style: double;">
            <div class="card card-register ">
                <div class="card-header "align="center"><legend>Register an Account</legend></div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="firstName">First name</label>
                                        <input type="text"name="firstname" id="firstName" class="form-control" placeholder="First name" required="" autofocus="autofocus">
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                           <label for="lastName">Last name</label>
                                        <input type="text" id="lastName"name="lastname" class="form-control" placeholder="Last name" required="">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                       <label for="gender">Gender</label>
                                    <select name="gender"style="width: 100%;margin-bottom: 12px;border-radius: 4px;height: 35px;"required="">
                                        <option >Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="othre">Other</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="inputMobile">Mobile</label>
                                        <input type="text" id="inputMobile"name="mobile" class="form-control" placeholder="Mobile" required=""pattern="[789][0-9]{9}">
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="inputEmail">Email address</label>
                                        <input type="email" id="inputEmail"name="email" class="form-control" placeholder="Email address" required="">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                         <label for="inputPassword">Password</label>
                                        <input type="password" id="inputPassword"name="password" class="form-control" placeholder="Password" required="">
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                         <label for="confirmPassword">Confirm password</label>
                                        <input type="password" id="confirmPassword"name="repassword" class="form-control" placeholder="Confirm password" required="">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-label-group"style="margin-top: 4px;">
                                        <input type="submit"name="submit" value="SIGN UP"class="btn btn-primary"style="width: 100%;padding-bottom: 15px;"/>
                                        <!--<a class="btn btn-primary btn-block" href="login.php">Register</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
<!--                        <a class="d-block small mt-3" href="login.php">Login Page</a>
                        <a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    </body>

</html>
