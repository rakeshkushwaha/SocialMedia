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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="fonts/glyphicons-halflings-regular.svg"></script>
        <script src="fonts/glyphicons-halflings-regular.eot"></script>
        <script src="fonts/glyphicons-halflings-regular.ttf"></script>
        <script src="fonts/glyphicons-halflings-regular.woff"></script>
        <script src="fonts/glyphicons-halflings-regular.woff2"></script>
        <title>Active India</title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!--Modal Header--> 
                        <div class="modal-header">
                            <?php
                            require './config.php';
                            
                            if (isset($_POST["ans_id"])) {
                                echo $id = $_GET['ans_id'];
                            }
                            ?> 
                            <h4 class="modal-title">hi<?php echo $id; ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>

                        <!--Modal body--> 
                        <div class="modal-body" id="employee_detail">
                            <textarea rows="4" name="answerhere" id="answerhere"style="width: 100%;"></textarea>
                        </div>

                        <!--Modal footer--> 
                        <div class="modal-footer">
                            <button type="submit"name="replyhere" class="btn btn-primary" >Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </body>
</html>