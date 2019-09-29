<?php

session_start();
if (!isset($_SESSION['name'])) {
    
}
$name = $_SESSION['name'];
// INIT
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "2a-config.php";
require PATH_LIB . "2b-lib-friends.php";
$friDB = new Friends();

// BETTER TO RESTRICT ACCESS TO REGISTERED USERS ONLY
if (!is_array($_SESSION['user'])) {
    echo json_encode([
        "status" => 0,
        "msg" => "No access permission"
    ]);
    die();
}

// HANDLE REQUEST
switch ($_POST['req']) {
    // INVALID REQUEST
    default:
        echo json_encode([
            "status" => 0,
            "msg" => "Invalid request"
        ]);
        break;

    // SHOW USERS (MANAGE FRIENDS LIST)
    case "show-users":
        $users = $friDB->getUsers($_SESSION['user']['id']);
        if (is_array($users)) {
            // We will show the current relationship status just for "debugging"
            // You will want to hide the mechanics in your own system
            $rs = [
                "P" => "Pending outgoing friend request",
                "PP" => "Pending incoming friend request",
                "F" => "Friends",
                "B" => "Blocked",
                "BB" => "Blocked by this user"
            ];
            /*
              // Action buttons based on current friend status
              $btn = [
              // Has a 'p'ending outgoing friend request.
              "P" => "<input type='button' value='Cancel Friend Request'>",
              // Has a 'p'ending incoming friend request.
              "PP" => "<input type='button' value='Accept'> <input type='button' value='Reject'> <input type='button' value='Block'>",
              // Already 'f'riends.
              "F" => "<input type='button' value='Unfriend'>",
              // User 'b'locked someone
              "B" => "<input type='button' value='Unblock'>",
              // Is 'b'locked by someone else. Not good to show, but just fake a possible request.
              // If no relationship is found, we will use this action box as well.
              "BB" => "<input type='button' value='Add friend'>"
              ]; */
            include './config.php';
            echo "<table id='f-table'>";
            foreach ($users as $id => $u) {

                $sel = "SELECT * FROM `user_profile` WHERE `user_id` = '".$u['email']."'";
                $result3 = mysqli_query($link, $sel);

                if (mysqli_num_rows($result3) > 0) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        ?>
                        <img src="profile_pic/<?php echo $row3["image"]; ?>" class="img-circle center-block" height="65" width="65" alt="profile">
                        <?php
                    }
                }


                printf("<tr><td><div class='uname'>%s</div><div class='urs'>%s</div></td><td class='ubtn'>",
                        $row3["image"],$u['full_name'], $rs[$u['status']]
                );
                // Action buttons based on current friend status 
                switch ($u['status']) {
                    // Already friends.
                    case "F":
                        printf("<input type='button' value='Unfriend' onclick=\"fr.process(%u, 'unfriend')\"> <input type='button' value='Block' onclick=\"fr.process(%u, 'block')\">", $id, $id);
                        break;
                    // Has a pending outgoing friend request.
                    case "P":
                        printf("<input type='button' value='Cancel Friend Request' onclick=\"fr.process(%u, 'cxfriend')\"> <input type='button' value='Block' onclick=\"fr.process(%u, 'block')\">", $id, $id);
                        break;
                    // Has a pending incoming friend request.
                    case "PP":
                        printf("<input type='button' value='Accept' onclick=\"fr.process(%u, 'accept')\"> <input type='button' value='Reject' onclick=\"fr.process(%u, 'reject')\"> <input type='button' value='Block' onclick=\"fr.process(%u, 'block')\">", $id, $id, $id);
                        break;
                    // User blocked someone
                    case "B":
                        printf("<input type='button' value='Unblock' onclick=\"fr.process(%u, 'unblock')\">", $id);
                        break;
                    // Is blocked by someone else. Not good to show, but we just do it here for demo anyway.
                    // You probably still want to show a fake add friend button or something...
                    case "BB":
                        echo "You are blocked. Haha.";
                        break;
                    // If no relationship is found.
                    default:
                        printf("<input type='button' value='Add Friend' onclick=\"fr.process(%u, 'friend')\"> <input type='button' value='Block' onclick=\"fr.process(%u, 'block')\">", $id, $id);
                        break;
                }
                echo "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No users found!";
        }
        break;

    // FRIEND REQUEST
    case "friend":
        $pass = $friDB->request($_SESSION['user']['id'], $_POST['user_id']);
        echo json_encode([
            "status" => $pass ? 1 : 0,
            "msg" => $pass ? "OK" : $friDB->error
        ]);
        break;

    // CANCEL FRIEND REQUEST
    case "cxfriend":
        $pass = $friDB->cxrequest($_SESSION['user']['id'], $_POST['user_id']);
        echo json_encode([
            "status" => $pass ? 1 : 0,
            "msg" => $pass ? "OK" : $friDB->error
        ]);
        break;

    // ACCEPT FRIEND REQUEST
    case "accept":
        $pass = $friDB->accept($_POST['user_id'], $_SESSION['user']['id']);
        echo json_encode([
            "status" => $pass ? 1 : 0,
            "msg" => $pass ? "OK" : $friDB->error
        ]);
        break;

    // REJECT FRIEND REQUEST
    case "reject":
        $pass = $friDB->reject($_POST['user_id'], $_SESSION['user']['id']);
        echo json_encode([
            "status" => $pass ? 1 : 0,
            "msg" => $pass ? "OK" : $friDB->error
        ]);
        break;

    // UNFRIEND
    case "unfriend":
        $pass = $friDB->unfriend($_SESSION['user']['id'], $_POST['user_id']);
        echo json_encode([
            "status" => $pass ? 1 : 0,
            "msg" => $pass ? "OK" : $friDB->error
        ]);
        break;

    // BLOCK
    case "block":
        $pass = $friDB->block($_SESSION['user']['id'], $_POST['user_id']);
        echo json_encode([
            "status" => $pass ? 1 : 0,
            "msg" => $pass ? "OK" : $friDB->error
        ]);
        break;

    // UNBLOCK
    case "unblock":
        $pass = $friDB->unblock($_SESSION['user']['id'], $_POST['user_id']);
        echo json_encode([
            "status" => $pass ? 1 : 0,
            "msg" => $pass ? "OK" : $friDB->error
        ]);
        break;
}