<?php
// INIT
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "2a-config.php";

// MASQUERADE AS JOHN DOE
// Well, your users will normally log in and don't need this part
$link = mysqli_connect("localhost", "root", "", "india_active");
if ($link === FALSE) {
    die("Ther is connectin prblem" . mysqli_connect_error());
}

$name = 'ankit@gmail.com';

$qans = "SELECT * FROM `user` WHERE `email` ='$name'";
$quans = mysqli_query($link, $qans);

if (mysqli_num_rows($quans) > 0) {
    while ($post = mysqli_fetch_assoc($quans)) {
       echo $id = $post['id'];
       echo $user_name = $post['full_name'];
       echo $user_email = $post['email'];

        $_SESSION['user'] = [
            "id" => "$id",
            "name" => "$user_name",
            "email" => "$user_email"
        ];
    }
}
//$_SESSION['user'] = [
//"id" => 2,
//  "name" => "John Doe",
//  "email" => "john@doe.com"
//];
// THE DUMMY FRIENDS HTML PAGE 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            PHP Friends System Demo
        </title>
        <script src="public/3b-friends.js"></script>
        <link href="public/3c-friends.css" rel="stylesheet">
    </head>
    <body>
        <h1>USER LIST</h1>
        <div id="user-list"></div>
    </body>
</html>