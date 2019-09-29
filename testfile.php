
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
                        <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           <span class="glyphicon glyphicon-bell"></span>
        </button></li>
                        <li><a href="#"><span class="glyphicon glyphicon-bell"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
                        <?php
//                        include './functions.php';
//                        loggedIn();
                        ?>

                    </ul>
                </div>
            </nav>
        </header>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>    </body>
</html>