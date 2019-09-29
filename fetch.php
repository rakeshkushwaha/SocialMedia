<?php  
 require './config.php';
 if(isset($_POST["employee_id"]))  
 {  
//     echo $_POST["employee_id"];
      $query = "SELECT * FROM `user_qustion_activity` WHERE `user_activity_id` = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($link, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>