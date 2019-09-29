<?php
session_start();
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];
?>
<?php include('server.php'); ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="shortcut icon" href="image/icon.png" class="rounded-circle">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/bootstrap.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
      
        <script src="js/jquery.min.js"></script>
        
        <link rel="stylesheet" href="main.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="fonts/glyphicons-halflings-regular.svg"></script>
        <script src="fonts/glyphicons-halflings-regular.eot"></script>
        <script src="fonts/glyphicons-halflings-regular.ttf"></script>
        <script src="fonts/glyphicons-halflings-regular.woff"></script>
        <script src="fonts/glyphicons-halflings-regular.woff2"></script>
        <title>Active India</title>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146504580-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146504580-1');
</script>
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
                    <ul class="nav navbar-nav navbar-right" style="color: #0099ff;">
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
                                    <br> </br>
                                    <button type="button" name="add" id="add" class="btn btn-info">image/video</button>
                                                                        <!--<button type="button" class="btn btn-default btn-sm"data-toggle="modal" data-target="#exampleModalCenterimage"style="margin-top: 2px;" alt="upload"><i class="fa fa-picture-o" aria-hidden="true" alt="upload"></i></button>-->     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        require './config.php';

                        $que = "SELECT * FROM user_qustion_activity ORDER BY user_activity_id DESC";
                        $resque = mysqli_query($link, $que);

                        if (mysqli_num_rows($resque) > 0) {
                            while ($quea = mysqli_fetch_assoc($resque)) {

//                                $queid = $quea['user_activity_id'];
                                $userpro = "SELECT * FROM user_profile WHERE user_profile_id = (SELECT MAX(user_profile_id) FROM user_profile WHERE user_id = '" . $quea['user_id'] . "')";
                                $userimg = mysqli_query($link, $userpro);

                                if (mysqli_num_rows($userimg) > 0) {
                                    while ($imgrow = mysqli_fetch_assoc($userimg)) {
                                        ?>
                                        <div class="col-sm-2">
                                            <div class="well">
                                                <img src="profile_pic/<?php echo $imgrow['image']; ?>" class="img-circle center-block"alt="Avatar"style="width: 100%;height: 100%;">
                                                <!--<p><?php // echo $_SESSION['name'];                         ?></p>-->
                                            </div>
                                        </div>
                                        <div class="col-sm-10"id="employee_table" style="margin-top: 20px;">
                                            <div class="well">

                                                <p><b>Question.&nbsp;&nbsp;</b><?php echo $quea['date_time']; ?><br></br><?php echo $quea['user_qustion']; ?></p>
                                                <!--<p>Q.&nbsp;&nbsp;<?php // echo $quea['user_qustion']; ?></p>-->
                                                <button type="button" name="edit" id="<?php echo $quea["user_activity_id"]; ?>" class="btn btn-info btn-xs edit_data"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                <!--<a href="" name="edit" id="<?php // echo $quea["user_activity_id"];   ?>" class="btn btn-info btn-xs edit_data"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>-->

                                            </div> 
                                            <?php
                                            require './config.php';
                                            $qans = "SELECT * FROM user_answer_activity WHERE user_q_qctivity_id ='" . $quea['user_activity_id'] . "'";
                                            $quans = mysqli_query($link, $qans);

                                            if (mysqli_num_rows($quans) > 0) {
                                                while ($post = mysqli_fetch_assoc($quans)) {
                                                    ?>
                                                    <div class="well">
                                                        <td style="float:right;"><b>Answer.&nbsp;&nbsp;</b><?php echo $post['datetime']; ?><br></br><?php echo "'" . $post['user_answer'] . "'."; ?></td>
                                                        <!--<td style="float:left;">A.<?php // echo "'" . $post['user_answer'] . "'."; ?></td>-->

                                                    </div>

                                                    <div class="col-sm-4">
                                                        <!--<div class="post">-->
                                                        <!--<button input type="button" class="btn btn-info like-review"style="float:left;">-->
                                                        <i <?php if (userLiked($post['id'])): ?>
                                                                class="fa fa-thumbs-up like-btn btn btn-info"
                                                            <?php else: ?>
                                                                class="fa fa-thumbs-o-up like-btn btn btn-info"
                                                            <?php endif ?>
                                                            data-id="<?php echo $post['id'] ?>"></i>
                                                        <!--</button>-->
                                                        <span class="likes"><?php echo getLikes($post['id']); ?></span>

                                                        <!--</div>-->




                                                                                                                                                                                                                                                                                                <!--<button input type="button" class="btn btn-info like-review"style="float:left;"><i class="fa fa-heart" aria-hidden="true"></i></button>-->
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <!--<button class="btn btn-primary">Button <i class="fa fa-comments-o"></i></button>-->
                                                        <i class="fa fa-comments-o btn btn-info center-block" data-id="<?php echo $post['id'] ?>" onclick="comment"></i>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <!--<button type="button" class="btn btn-info " >Open Small Modal</button>-->

                                                        <i class="fa fa-share-alt btn btn-info" data-toggle="modal" data-target="#sharedata" aria-hidden="true" style="float:right;" id="<?php echo $post['id'] ?>" onclick="share"></i>
                                                    </div><br></br> 
                                                    <?php
                                                }
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
                    <!--image modal start-->
                    <div id="imageModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                    <h4 class="modal-title">video/image</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="image_form" method="post" enctype="multipart/form-data">
                                        <!--<p><label>Select Image</label>-->
                                        <input type="file" name="image" id="image" style="width: 111px;padding: 5px;border-style: double;height: 37px;"/></p><br />
                                        <input type="hidden" name="action" id="action" value="insert" />
                                        <input type="hidden" name="image_id" id="image_id" />
                                        <input type="submit" name="insert" id="insert" value="upload" class="btn btn-info" />

                                    </form>
                                </div>
<!--                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>-->
                            </div>
                        </div>
                    </div>

                    <!--image modal end-->

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


        <footer class="container-fluid text-center"style="background-color: #333;">
            <p style="padding: 5px;color: #ffffff;">@ copy right 2019 Active india</p>
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
<!--share modal start-->
<div class="modal fade" id="sharedata" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!--<h4 class="modal-title">Sharing...</h4>-->
            </div>
            <div class="modal-body">
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

                <!-- Your fb share button code -->
                <div class="fb-share-button" 
                     data-href="https://www.youtube.com/watch?v=6F7SURS7xg0" 
                     data-layout="button_count">
                </div>
                <div id="fb-root"></div>
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="js/widgets.js" charset="utf-8"></script>

                <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share" data-url="https://www.linkedin.com"></script>
                <script src="js/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share" data-url="https://www.linkedin.com"></script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--share modal end-->
<div id="add_data_Modal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->  
                <h4 class="modal-title"></h4>  
            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form"> 

                    <input type="hidden" name="employee_id" id="employee_id" /> 
                    <label>Answer</label>  
                    <textarea name="msgans"rows="2" id="msgans" class="form-control" ></textarea>  
                    <br>
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
            </div>  
            <div class="modal-footer">  
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
            </div>  
        </div>  
    </div>  
</div>  


<?php
require './config.php';
if (isset($_POST['textmsg'])) {
    $msg = $_POST['msgtext'];

    $sql = "INSERT INTO `user_qustion_activity` (`user_activity_id`, `user_id`, `user_qustion`, `date_time`) VALUES (NULL, '" . $_SESSION['name'] . "', '$msg', CURRENT_TIMESTAMP);";
    if (mysqli_query($link, $sql)) {
        ?>
        <script>alert("successfully uploded");
<script>window.location.reload();</script>
        </script><?php } else {
        ?>
        <script>alert("sorry try again!");</script> 
        <?php
    }
    mysqli_close($link);
}
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
                         window.location.reload();
                    }
                });
            }
            alert("result sorry");
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.edit_data', function () {
            var employee_id = $(this).attr("id");

            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {employee_id: employee_id},
                dataType: "json",
                success: function (data) {
                    $('#employee_id').val(data.user_activity_id);

                    $('#insert').val("Post");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
            if ($('#msgans').val() == "")
            {
                alert("field is required");
            } else
            {
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function () {
                        $('#insert').val("Inserting");
                    },
                    success: function (data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                
//                        $('#employee_table').html(data);
                    }
                });
            }
        });
    });
</script>
<!--image insert code-->

<script>  
$(document).ready(function(){
 
 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("Image/Video");
  $('#image_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var image_name = $('#image').val();
  if(image_name == '')
  {
   alert("Please Select Image");
   return false;
  }
  else
  {
   var extension = $('#image').val().split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#image').val('');
    return false;
   }
   else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   }
  }
 });
// $(document).on('click', '.update', function(){
//  $('#image_id').val($(this).attr("id"));
//  $('#action').val("update");
//  $('.modal-title').text("Update Image");
//  $('#insert').val("Update");
//  $('#imageModal').modal("show");
// });
// $(document).on('click', '.delete', function(){
//  var image_id = $(this).attr("id");
//  var action = "delete";
//  if(confirm("Are you sure you want to remove this image from database?"))
//  {
//   $.ajax({
//    url:"action.php",
//    method:"POST",
//    data:{image_id:image_id, action:action},
//    success:function(data)
//    {
//     alert(data);
//     fetch_data();
//    }
//   })
//  }
//  else
//  {
//   return false;
//  }
// });
});  
</script>
<!--image insert end-->

