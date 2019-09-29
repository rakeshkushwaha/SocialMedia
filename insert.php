<?php

require './config.php';
session_start();
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];

if (!empty($_POST)) {
    $output = '';
    $message = '';
    $msgans = mysqli_real_escape_string($link, $_POST["msgans"]);

    if ($_POST["employee_id"] != '') {
        $query = "INSERT INTO `user_answer_activity` (`id`, `user_id`, `user_q_qctivity_id`, `user_image_activity`, `user_answer`, `datetime`, `status_like`) VALUES (NULL, '$name', '" . $_POST["employee_id"] . "', '', '$msgans', CURRENT_TIMESTAMP, '0')";
        $message = 'Data Inserted';
    } else {

        $message = 'sorry somthing went wrong !';
    }
    mysqli_query($link, $query);
}
?>