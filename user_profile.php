<?php
session_start();
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script><!------ Include the above in your HEAD tag ---------->
        <style>body{
                margin-top: auto;
                background-color: #f1f1f1;
            }
            .border{
                border-bottom:1px solid #F1F1F1;
                margin-bottom:10px;
            }
            .main-secction{
                box-shadow: 10px 10px 10px;
            }
            .image-section{
                padding: 0px;
            }
            .image-section img{
                width: 100%;
                height:250px;
                position: relative;
            }
            .user-image{
                position: absolute;
                margin-top:-50px;
            }
            .user-left-part{
                margin: 0px;
            }
            .user-image img{
                width:100px;
                height:100px;
            }
            .user-profil-part{
                padding-bottom:30px;
                background-color:#FAFAFA;
            }
            .follow{    
                margin-top:70px;   
            }
            .user-detail-row{
                margin:0px; 
            }
            .user-detail-section2 p{
                font-size:12px;
                padding: 0px;
                margin: 0px;
            }
            .user-detail-section2{
                margin-top:10px;
            }
            .user-detail-section2 span{
                color:#7CBBC3;
                font-size: 20px;
            }
            .user-detail-section2 small{
                font-size:12px;
                color:#D3A86A;
            }
            .profile-right-section{
                padding: 20px 0px 10px 15px;
                background-color: #FFFFFF;  
            }
            .profile-right-section-row{
                margin: 0px;
            }
            .profile-header-section1 h1{
                font-size: 25px;
                margin: 0px;
            }
            .profile-header-section1 h5{
                color: #0062cc;
            }
            .req-btn{
                height:30px;
                font-size:12px;
            }
            .profile-tag{
                padding: 10px;
                border:1px solid #F6F6F6;
            }
            .profile-tag p{
                font-size: 12px;
                color:black;
            }
            .profile-tag i{
                color:#ADADAD;
                font-size: 20px;
            }
            .image-right-part{
                background-color: #FCFCFC;
                margin: 0px;
                padding: 5px;
            }
            .img-main-rightPart{
                background-color: #FCFCFC;
                margin-top: auto;
            }
            .image-right-detail{
                padding: 0px;
            }
            .image-right-detail p{
                font-size: 12px;
            }
            .image-right-detail a:hover{
                text-decoration: none;
            }
            .image-right img{
                width: 100%;
            }
            .image-right-detail-section2{
                margin: 0px;
            }
            .image-right-detail-section2 p{
                color:#38ACDF;
                margin:0px;
            }
            .image-right-detail-section2 span{
                color:#7F7F7F;
            }

            .nav-link{
                font-size: 1.2em;    
            }
        </style>
        
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
        <div class="container main-secction">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                    <img src="https://png.pngtree.com/thumb_back/fw800/back_pic/00/08/57/41562ad4a92b16a.jpg">
                </div>
                <div class="row user-left-part">
                    <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                        <div class="row ">
                            <?php
                            require './config.php';

                            $sel = "SELECT * FROM user_profile WHERE user_profile_id = (SELECT MAX(user_profile_id) FROM user_profile WHERE user_id = '" . $_SESSION['name'] . "')";
                            $result3 = mysqli_query($link, $sel);

                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    ?>
                                    <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                        <button type="button" data-toggle="modal" data-target="#myModal"class="rounded-circle"style="background-color: #FFFFFF;"><img src="profile_pic/<?php echo $row3["image"]; ?>" class="rounded-circle"></button>

                                    </div>
                                <?php }
                            } else {
                                ?>
                                <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                    <button type="button" data-toggle="modal" data-target="#myModal"class="rounded-circle"style="background-color: #FFFFFF;"><img src="image/avatar.png" class="rounded-circle"></button>

                                </div>  
                            <?php }
                            ?>

                            <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                <label class="btn btn-info btn-block follow"><?php echo $name; ?></label>
                                <button id="btn-contact" onclick="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Contactarme</button> 
                                <button class="btn btn-warning btn-block">Descargar Curriculum</button>                               
                            </div>
                            <div class="row user-detail-row">
                                <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                    <div class="border"></div>
                                    <p>FOLLOWER</p>
                                    <span>320</span>
                                </div>                           
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                        <div class="row profile-right-section-row">
                            <div class="col-md-12 profile-header">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                        <h1>Juan Perez</h1>
                                        <h5>Developer</h5>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                        <a href="/search" class="btn btn-primary btn-block">Seguir buscando</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Perfil Profesional</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Información Detallada</a>
                                            </li>                                                
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                <?php
                                                require './config.php';
                                                $sqse = "SELECT * FROM `user` WHERE `email`='$name'";
                                                $resultsq = mysqli_query($link, $sqse);

                                                if (mysqli_num_rows($resultsq) > 0) {
                                                    while ($data = mysqli_fetch_assoc($resultsq)) {
                                                        ?> 
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>ID</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><?php echo $data['id'];?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Nombre</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><?php echo $data['mobile'];?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Email</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><?php echo $data['email'];?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Name</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><?php echo $data['full_name'];?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>BirthDay</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><?php echo $data['date_of_birth'];?></p>
                                                            </div>
                                                </div><?php }} ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Experience</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Expert</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Hourly Rate</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>10$/hr</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Total Projects</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>230</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>English Level</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Expert</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Availability</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>6 months</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Your Bio</label>
                                                                <br/>
                                                                <p>Your detail description</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-4 img-main-rightPart">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row image-right-part">
                                                            <div class="col-md-6 pull-left image-right-detail">
                                                                <h6>PUBLICIDAD</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="index.php">
                                                        <div class="col-md-12 image-right">
                                                            <img src="image/Free_Sample_By_Wix (1).jpg">
                                                        </div>
                                                    </a>
                                                    <div class="col-md-12 image-right-detail-section2">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contact">Contactarme</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                                </div>
                                <div class="form-group">
                                    <label for="txtFullname">Nombre completo</label>
                                    <input type="text" id="txtFullname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtEmail">Email</label>
                                    <input type="text" id="txtEmail" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtPhone">Teléfono</label>
                                    <input type="text" id="txtPhone" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary"click="openModal();" data-dismiss="modal">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action=""method="post" enctype="multipart/form-data">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Choose profile</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <input type="file" name="image"style="padding: 2px;width: 110px;border-style: double;">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">

                                    <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </body>
        </html>
        <?php
        require './config.php';

        if (isset($_FILES['image'])) {
            $errors = array();

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_name = $_FILES['image']['name'];
            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
            $expensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 8097152) {
                $errors[] = 'File size must be excately 8 MB';
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "profile_pic/" . $file_name);
                require './config.php';


                if (isset($_POST['submit'])) {

                    $sql = "INSERT INTO `user_profile` (`user_profile_id`, `user_id`, `image`, `cudate`) VALUES (NULL, '" . $_SESSION['name'] . "', '$file_name', CURRENT_TIMESTAMP)";

                    if (mysqli_query($link, $sql)) {
                        ?>
                        <script>alert("successfully chenged");</script>
                        <?php
                    } else {
                        ?><script>alert("Sorry!");</script>
                        <?php
                    }


                    mysqli_close($link);
                } else {
                    print_r($errors);
                }
            } else {
                print_r($errors);
            }
        }
        ?>

