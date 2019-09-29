
<style>@charset"utf-8";

/* CSS Document */

/* ---------- FONTAWESOME ---------- */

/* ---------- http://fortawesome.github.com/Font-Awesome/ ---------- */

/* ---------- http://weloveiconfonts.com/ ---------- */
 @import url(http://weloveiconfonts.com/api/?family=fontawesome);

/* ---------- ERIC MEYER'S RESET CSS ---------- */

/* ---------- http://meyerweb.com/eric/tools/css/reset/ ---------- */
 @import url(http://meyerweb.com/eric/tools/css/reset/reset.css);

/* ---------- FONTAWESOME ---------- */
[class*="fontawesome-"]:before {
    font-family:'FontAwesome', sans-serif;
}
/* ---------- GENERAL ---------- */
 body {
    background-color: #C0C0C0;
    color: #000;
    font-family:"Varela Round", Arial, Helvetica, sans-serif;
    font-size: 16px;
    line-height: 1.5em;
}
input {
    border: none;
    font-family: inherit;
    font-size: inherit;
    font-weight: inherit;
    line-height: inherit;
    -webkit-appearance: none;
}
/* ---------- LOGIN ---------- */
 #login {
    margin: 50px auto;
    width: 400px;
}
#login h2 {
    background-color: #f95252;
    -webkit-border-radius: 20px 20px 0 0;
    -moz-border-radius: 20px 20px 0 0;
    border-radius: 20px 20px 0 0;
    color: #fff;
    font-size: 28px;
    padding: 20px 26px;
}
#login h2 span[class*="fontawesome-"] {
    margin-right: 14px;
}
#login fieldset {
    background-color: #fff;
    -webkit-border-radius: 0 0 20px 20px;
    -moz-border-radius: 0 0 20px 20px;
    border-radius: 0 0 20px 20px;
    padding: 20px 26px;
}
#login fieldset p {
    color: #777;
    margin-bottom: 14px;
}
#login fieldset p:last-child {
    margin-bottom: 0;
}
#login fieldset input {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
#login fieldset input[type="email"], #login fieldset input[type="password"] {
    background-color: #eee;
    color: #777;
    padding: 4px 10px;
    width: 328px;
}
#login fieldset input[type="submit"] {
    background-color: #33cc77;
    color: #fff;
    display: block;
    margin: 0 auto;
    padding: 4px 0;
    width: 100px;
}
#login fieldset input[type="submit"]:hover {
    background-color: #28ad63;
}</style>

<div id="login">
    	<h2><span class="fontawesome-lock"></span>Sign In</h2>

    <form action="javascript:alert('FORM SUBMITTED');" method="POST">
        <fieldset>
            <p>
                <label for="email">E-mail address</label>
            </p>
            <p>
                <input type="email" id="email">
            </p>
            <p>
                <label for="password">Password</label>
            </p>
            <p>
                <input type="password" id="password">
            </p>
            <!-- JS because of IE support; better: placeholder="Email" -->
            <p>
                <input type="submit" value="Sign In">
            </p>
        </fieldset>
    </form>
</div>
<!-- end login -->
<script>    $('form').on('submit', function (e) {
        var focusSet = false;
        if (!$('#email').val()) {
            if ($("#email").parent().next(".validation").length == 0) // only add if not added
            {
                $("#email").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email address</div>");
            }
            e.preventDefault(); // prevent form from POST to server
            $('#email').focus();
            focusSet = true;
        } else {
            $("#email").parent().next(".validation").remove(); // remove it
        }
        if (!$('#password').val()) {
            if ($("#password").parent().next(".validation").length == 0) // only add if not added
            {
                $("#password").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter password</div>");
            }
            e.preventDefault(); // prevent form from POST to server
            if (!focusSet) {
                $("#password").focus();
            }
        } else {
            $("#password").parent().next(".validation").remove(); // remove it
        }
    });
</script>






<form action=""method="">
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Answer here</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <textarea rows="4" name="answerhere" id="answerhere"style="width: 100%;"></textarea>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit"name="replyhere" class="btn btn-primary" >Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

 <div class="row">
                        <?php
                        require './config.php';

                        $que = "SELECT * FROM user_qustion_activity";
                        $resque = mysqli_query($link, $que);

                        if (mysqli_num_rows($resque) > 0) {
                            while ($quea = mysqli_fetch_assoc($resque)) {

                                $queid = $quea['user_activity_id'];
                                $userpro = "SELECT * FROM user_profile WHERE user_profile_id = (SELECT MAX(user_profile_id) FROM user_profile WHERE user_id = '" . $_SESSION['name'] . "')";
                                $userimg = mysqli_query($link, $userpro);

                                if (mysqli_num_rows($userimg) > 0) {
                                    while ($imgrow = mysqli_fetch_assoc($userimg)) {
                                        ?>
                                        <div class="col-sm-2">
                                            <div class="well">
                                                <img src="profile_pic/<?php echo $imgrow['image']; ?>" class="img-circle" height="55" width="55" alt="Avatar">
                                                <p><?php echo $_SESSION['name']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="well">

                                                <p style="text-align: left;"><?php echo $quea['user_qustion']; ?></p>
                                            <?php
                                            }
                                        }
                                    }
                                }
                                ?> <p></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"style="text-align: left;">Answer</button>

                            </div>
                            <div class="well">
                                <p style="text-align: left;">Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
                            </div>

                            <div class="col-sm-4">
                                <button class="btn btn-primary like-review"><i class="fa fa-heart" aria-hidden="true"></i> Like</button>
                            </div>
                            <div class="col-sm-4">
                                <button input type="button" name="comment"class="btn btn-primary"><img src="image/comment-png.png" style="width: 35px;height: 20px;"></button>
                            </div>
                            <div class="col-sm-4">
                                <div class="fb-share-button btn btn-primary" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"style="color: #ffffff;">साझा करें</a></div>
                                <!--<button input type="button" name="share"class="btn btn-primary" align="right"><img src="image/Share-PNG.png" style="width: 35px;height: 20px;"></button>-->
                            </div>

                        </div>
                    </div>