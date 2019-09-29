<?php

session_start();
require './config.php';
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];

echo $answerhere = $_POST['answerhere'];
echo $event_id = $_POST['event_id'];

echo $query = mysql_query("INSERT INTO `user_answer_activity` (`user_activity_id`, `user_id`, `user_q_qctivity_id`, `user_image_activity`, `user_answer`, `datetime`) VALUES (NULL, '$name', '$event_id', '', '$answerhere', CURRENT_TIMESTAMP)");
echo "Form Submitted Succesfully";
mysql_close($link);
?>