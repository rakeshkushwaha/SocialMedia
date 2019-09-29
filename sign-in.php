<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


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
    .error{
        color: #ff3300;
    }
    .btn-facebook {
        background-color: #405D9D;
        color: #fff;
    }
    .btn-twitter {
        background-color: #42AEEC;
        color: #fff;
    }</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146504580-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146504580-1');
</script>

<div class="card bg-light"style="background-image: url(image/global_connectivity.jpg);width: 100%;height: 100%;">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <!--        <h4 class="card-title mt-3 text-center"style="color: #fff;">t</h4>
                <p class="text-center"style="color: #fff;">Get started with your free account</p>-->

        <form style="margin-top: 40%;" method="post" action="">
            <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control" placeholder="Email address"required="" type="email">
                <span class="error"></span>
            </div> 
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control"name="password" placeholder="password"required="" type="password">
                <span class="error"></span>
            </div> <!-- form-group// -->                                      
            <div class="form-group">
                <button type="submit"name="submit" class="btn btn-primary btn-block"> Sign-In  </button>
            </div>

            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <p>
                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
            </p>
            <!-- form-group// -->      
            <p class="text-center"style="color: #fff;">Create New Account<a href="reg.php">SignUp</a> </p>                                                                 
        </form>


    </article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
<?php
 session_start();
 require './config.php';
   
if (isset($_POST['submit'])) {

    echo $myusername = $_POST["email"];
    echo $mypassword = $_POST["password"];

    $sql = "SELECT * FROM user WHERE email = '$myusername' and password  = '$mypassword'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if (isset($_POST['rememberme'])) {

        setcookie('email', $_POST['email'], time() + 60 * 30, '/account', 'www.example.com');
        setcookie('password', md5($_POST['password']), time() + 60 * 30, '/account', 'www.example.com');
    } else {

        setcookie('email', $_POST['email'], false, '/account', 'www.example.com');
        setcookie('password', md5($_POST['password']), false, '/account', 'www.example.com');
    }

    if ($count == 1) {

        echo $_SESSION['name'] = $myusername;
        ?><script>
            window.location = "index.php";
        </script>
        <?php
    } else {
        echo 'wrong user and password';
    }
}
?>