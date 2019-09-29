<?php
//session_start();
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];

function loggedIn() {

    if (!$_SESSION['name']) {
        ?><script>
            
            window.location = "sign-in.php";
        </script>
        <?php
    } else {
        ?> 
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <!--<a href="logout.php"><i class="dropdown-item"></i> Logout</a>-->

        <?php
    }
}
?> 
