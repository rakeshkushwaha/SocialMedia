<?php
session_start();
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];
?>
<?php include('server.php'); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" initial-scale=1.0">
        <!--<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=no">-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/bootstrap.js"></script>
        <!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="main.css">

        <script src="js/bootstrap.min.js"></script>
        <script src="fonts/glyphicons-halflings-regular.svg"></script>
        <script src="fonts/glyphicons-halflings-regular.eot"></script>
        <script src="fonts/glyphicons-halflings-regular.ttf"></script>
        <script src="fonts/glyphicons-halflings-regular.woff"></script>
        <script src="fonts/glyphicons-halflings-regular.woff2"></script>
        <title>Active India</title>
    </head>
    <body>
        <header>

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">INDIA ACTIVE</a>
                    </div>
                    <form class="navbar-form navbar-left" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-bell"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
                        <?php
                        include './functions.php';
                        loggedIn();
                        ?>

                    </ul>
                </div>
            </nav>
        </header>

        <div class="container" style="width: 100%;">    
            <div class="row">
                <div class="col-sm-2 well">
                    <div class="well">
                        <?php
                        require './config.php';

                        $sel = "SELECT * FROM user_profile WHERE user_profile_id = (SELECT MAX(user_profile_id) FROM user_profile WHERE user_id = '" . $_SESSION['name'] . "')";
                        $result3 = mysqli_query($link, $sel);

                        if (mysqli_num_rows($result3) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                ?>
                                <img src="profile_pic/<?php echo $row3["image"]; ?>" class="img-circle center-block" height="65" width="65" alt="profile"><?php
                            }
                        } else {
                            ?>
                            <img src="image/user_icon.png" class="img-circle center-block" height="65" width="65" alt="profile">
                            <?php
                        }
                        ?>
                        <p style="text-align: center;"><a href="user_profile.php"><?php echo $name; ?></a></p>
                    </div>

                    <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p><strong>Ey!</strong></p>
                        People are looking at your profile. Find out who.
                    </div>

                </div>
                <div class="col-sm-6 well"style="margin-left: 20px;margin-right: 20px;">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default text-left">
                                <div class="panel-body">
                                    <p contenteditable="false">New Post</p>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalCenter"style="width: 100%;height: 30px;background-color: #ffffff;"></button>

                                    <button type="button" class="btn btn-default btn-sm"data-toggle="modal" data-target="#exampleModalCenterimage"style="margin-top: 2px;" alt="upload"><i class="fa fa-picture-o" aria-hidden="true" alt="upload"></i></button>     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        require './config.php';

                        $que = "SELECT * FROM user_qustion_activity";
                        $resque = mysqli_query($link, $que);

                        if (mysqli_num_rows($resque) > 0) {
                            while ($quea = mysqli_fetch_assoc($resque)) {

                                $queid = $quea['user_activity_id'];
                                $userpro = "SELECT * FROM user_profile WHERE user_profile_id = (SELECT MAX(user_profile_id) FROM user_profile WHERE user_id = '" . $quea['user_id'] . "')";
                                $userimg = mysqli_query($link, $userpro);

                                if (mysqli_num_rows($userimg) > 0) {
                                    while ($imgrow = mysqli_fetch_assoc($userimg)) {
                                        ?>
                                        <div class="col-sm-2">
                                            <div class="well">
                                                <img src="profile_pic/<?php echo $imgrow['image']; ?>" class="img-circle center-block"alt="Avatar"style="width: 100%;height: 100%;">
                                                <!--<p><?php // echo $_SESSION['name'];                  ?></p>-->
                                            </div>
                                        </div>
                                        <div class="col-sm-10" style="margin-top: 20px;">
                                            <div class="well">

                                                <p>Q.&nbsp;&nbsp;<?php echo $quea['user_qustion']; ?></p>
                                                <a href="" class="btn btn-info btn-sm modalLink view_data" data-toggle="modal" data-target="#myModal" data-id="" name="Answer" value="Answer"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a> 
                                            </div> 
                                            <?php
                                            require './config.php';
                                            $qans = "SELECT * FROM user_answer_activity WHERE user_q_qctivity_id ='" . $quea['user_activity_id'] . "'";
                                            $quans = mysqli_query($link, $qans);

                                            if (mysqli_num_rows($quans) > 0) {
                                                while ($post = mysqli_fetch_assoc($quans)) {
                                                    ?>
                                                    <div class="well">
                                                        <td style="float:left;">A.<?php echo "'" . $post['user_answer'] . "'."; ?></td>

                                                    </div>

                                                    <div class="col-sm-4">
                                                        <!--<div class="post">-->
                                                        <!--<button input type="button" class="btn btn-info like-review"style="float:left;">-->
                                                        <i <?php if (userLiked($post['id'])): ?>
                                                                class="fa fa-thumbs-up like-btn"
                                                            <?php else: ?>
                                                                class="fa fa-thumbs-o-up like-btn"
                                                            <?php endif ?>
                                                            data-id="<?php echo $post['id'] ?>"></i>
                                                        <!--</button>-->
                                                        <span class="likes"><?php echo getLikes($post['id']); ?></span>

                                                        <!--</div>-->




                                                                                                                        <!--<button input type="button" class="btn btn-info like-review"style="float:left;"><i class="fa fa-heart" aria-hidden="true"></i></button>-->
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <!--<button class="btn btn-primary">Button <i class="fa fa-comments-o"></i></button>-->
                                                        <button input type="button" name="comment"class="btn btn-info center-block" ><i class="fa fa-comments-o"></i></button>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button input type="button" name="share"class="btn btn-info" align="right" style="float:right;"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
                                                    </div><br></br> 
                                                <?php }
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                    <!--<startModal>-->
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!--Modal Header--> 
                                    <div class="modal-header">

                                        <h4 class="modal-title"></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>

                                    <!--Modal body--> 
                                    <div class="modal-body" id="employee_detail">
                                        <input type="hidden" id="event_id" class="form-control">
                                        <textarea rows="4" class="form-control"id="answerhere" name="answerhere" id="answerhere"style="width: 100%;"></textarea>
                                    </div>

                                    <!--Modal footer--> 
                                    <div class="modal-footer">
                                        <button type="submit"name="replyhere"id="replyhere" class="btn btn-primary" >Save</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end modal-->


                    <!--model start-->
                    <form action="" method="post" action="">
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <textarea name="msgtext" row="3"class="form-control" ></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col col-sm-6">
                                                <!--<input type="file" name="image"class="form-control"style="width: 115px;">-->
                                            </div>
                                            <div class="col col-sm-6">
                                                <button type="submit" name="textmsg" class="btn btn-info">Upload</button>
                                            </div>
                                        </div>

                                        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="exampleModalCenterimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col col-sm-6">
                                            <input type="file" name="image"class="form-control"style="width: 115px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col col-sm-6">
                                            <label> image/videos</label>
                                        </div>
                                        <div class="col col-sm-6">
                                            <button type="button" class="btn btn-info">Upload</button>
                                        </div>
                                    </div>

                                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3 well" style="margin-right: 0px;">
                    <div class="thumbnail">
                        <p><strong>Live Users</strong></p>
                        <!--<p>Fri. 27 November 2015</p>-->
                        <!--<button class="btn btn-primary">Info</button>-->
                    </div>      
                    <div class="well">
                        <?php
                        require './config.php';

                        $sql1 = "SELECT * FROM `user`";
                        $result1 = mysqli_query($link, $sql1);

                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $sel1 = "SELECT * FROM user_profile WHERE user_profile_id = (SELECT MAX(user_profile_id) FROM user_profile WHERE user_id = '" . $row1['email'] . "')";
                                $result2 = mysqli_query($link, $sel1);

                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        ?>
                                        <button type="button" style="text-align: left; border: none;border-radius: 3px;background-color: #f5f5f5;text-align: left;width: 100%;margin-bottom: 2px;"><strong style="color: #009933;">&#9899;&nbsp;&nbsp;&nbsp;</strong><img src="profile_pic/<?php echo $row2["image"]; ?>" alt="Paris" width="30" height="30"style="background-color: #ffffff;border-radius: 50%;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row1["full_name"]; ?> </button>
                                        <?php
                                    }
                                }
                                ?>
        <!--<button type="button" style="text-align: left; border: none;border-radius: 3px;background-color: #f5f5f5;text-align: left;width: 100%;margin-bottom: 2px;"><strong style="color: #009933;">&#9899;&nbsp;&nbsp;&nbsp;</strong><img src="image/user_icon.png" alt="Paris" width="30" height="30"style="background-color: #ffffff;border-radius: 50%;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row1["full_name"]; ?> </button>-->

                                <?php
                            }
                        }
                        ?>
                    </div>
                    <!--
                    <div class="well">
                        <p>ADS</p>
                    </div>-->
                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>

        <div id="fb-root"></div>
        <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/hi_IN/sdk.js#xfbml=1&version=v3.3&appId=2417809285115553&autoLogAppEvents=1"></script>  Bootstrap core JavaScript-->

        <script>function setEventId(event_id) {
                document.querySelector("#event_id").innerHTML = event_id;
            }
        </script>
        <script src="scripts.js"></script>
    </body>
</html>
<?php
require './config.php';
if (isset($_POST['textmsg'])) {
    $msg = $_POST['msgtext'];

    $sql = "INSERT INTO `user_qustion_activity` (`user_activity_id`, `user_id`, `user_qustion`, `date_time`) VALUES (NULL, '" . $_SESSION['name'] . "', '$msg', CURRENT_TIMESTAMP);";
    if (mysqli_query($link, $sql)) {
        ?>
        <script>alert("successfully uploded");
        </script><?php } else {
        ?>
        <script>alert("sorry try again!");</script> 
        <?php
    }
    mysqli_close($link);
}
?>
<!--answer code-->
<?php
//require './config.php';
//if (isset($_POST['replyhere'])) {
//    if (isset($_POST['ansname'])) {
//        echo $id = $_GET['ansname'];
//    }
//    $replymsg = $_POST['answerhere'];
//    $queid;
//
//    echo $sqlans = "INSERT INTO `user_answer_activity` (`user_activity_id`, `user_id`, `user_q_qctivity_id`, `user_image_activity`, `user_answer`, `datetime`) VALUES (NULL, '" . $_SESSION['name'] . "', '$id', '', '$replymsg', CURRENT_TIMESTAMP);";
//    if (mysqli_query($link, $sqlans)) {
//        
?>
        <!--<script>alert("successfully uploded");</script>-->
//<?php
//    } else {
//        
?>
<!--<script>alert("sorry try again!");</script>--> 
//<?php
//    }
//    mysqli_close($link);
//}
?>
<!--answer code end-->
<script>
    $(document).ready(function () {
        $("#replyhere").click(function () {
            var answerhere = $("#answerhere").val();
            var event_id = $("event_id").val();
            var dataString = 'answerhere=' + answerhere + '&event_id=' + event_id;
            if (answerhere == '' || )
            {
                alert("Please Fill All Fields");
            } else
            {
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "ajaxsubmit.php",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        alert(result);
                    }
                });
            }
            alert("result sorry");
        });
    });
</script>
