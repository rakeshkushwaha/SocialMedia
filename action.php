<?php
//action.php
if(isset($_POST["action"]))
{
    require './config.php';

session_start();
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];

 if($_POST["action"] == "insert")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "INSERT INTO `user_image_activity` (`user_activity_id`, `user_id`, `image_activity`, `dcutime`) VALUES (NULL, '$name', '$file', CURRENT_TIMESTAMP);";

  if(mysqli_query($link, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
// if($_POST["action"] == "update")
// {
//  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//  $query = "UPDATE tbl_images SET name = '$file' WHERE id = '".$_POST["image_id"]."'";
//  if(mysqli_query($connect, $query))
//  {
//   echo 'Image Updated into Database';
//  }
// }
// if($_POST["action"] == "delete")
// {
//  $query = "DELETE FROM tbl_images WHERE id = '".$_POST["image_id"]."'";
//  if(mysqli_query($connect, $query))
//  {
//   echo 'Image Deleted from Database';
//  }
// }
}
?>