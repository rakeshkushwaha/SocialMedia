<?php
class Friends {
  /* [DATABASE HELPER FUNCTIONS] */
  protected $pdo = null;
  protected $stmt = null;
  public $error = "";
  public $lastID = null;

  function __construct() {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

    // ATTEMPT CONNECT
    try {
      $str = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
      if (defined('DB_NAME')) { $str .= ";dbname=" . DB_NAME; }
      $this->pdo = new PDO(
        $str, DB_USER, DB_PASSWORD, 
          [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false ]
      );
      return true;
    }

    // ERROR - DO SOMETHING HERE
    // THROW ERROR MESSAGE OR SOMETHING
    catch (Exception $ex) {
      print_r($ex);
      die();
    }
  }

  function __destruct() {
  // __destruct() : close connection when done

    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  function exec($sql, $data=null) {
  // exec() : run insert, replace, update, delete query
  // PARAM $sql : SQL query
  //       $data : array of data
 
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      $this->lastID = $this->pdo->lastInsertId();
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return true;
  }

  function fetch($sql, $cond=null, $key=null, $value=null) {
  // fetch() : perform select query
  // PARAM $sql : SQL query
  //       $cond : array of conditions
  //       $key : sort in this $key=>data order, optional
  //       $value : $key must be provided, sort in $key=>$value order

    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      if (isset($key)) {
        $result = array();
        if (isset($value)) {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row[$value];
          }
        } else {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row;
          }
        }
      } else {
        $result = $this->stmt->fetchAll();
      }
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return $result;
  }

  /* [USER/RELATION FUNCTIONS] */
  function getUsers ($id) {
  // getUsers() : get all users and the friendship status
  // PARAM $id : user ID requesting this user list

    // Get all the active users, excluding self.
    // You might want to limit the results and add pagination in your own project
    $sql = "SELECT * FROM `user` WHERE `id`!=? AND `status`='A'";
    $cond = [$id];
    $users = $this->fetch($sql, $cond, "id");
    if (count($users)==0) { return false; }

    // Get relationships
    $sql = "SELECT * FROM `relationships` WHERE `user_id_a`=? OR `user_id_b`=?";
    $cond = [$id, $id];
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($cond);
    while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
      // True = From user to others, False = From others to user
      $direction = $row['user_id_a']==$id;
      $uid = $direction ? $row['user_id_b'] : $row['user_id_a'] ;
      // The things that we need to differentiate here are pending friend requests and blocked
      // P = Outgoing friend request from user to others
      // PP = Incoming friend request from others
      // B = User blocked someone else
      // BB = Someone else blocked the user
      if ($row['status']=="P") {
        $users[$uid]['status'] = $direction ? "P" : "PP" ;
      } else if ($row['status']=="B") {
        $users[$uid]['status'] = $direction ? "B" : "BB" ;
      } else {
        $users[$uid]['status'] = $row['status'];
      }
    }

    // Return results
    return $users;
  }

  function request ($from, $to) {
  // request() : create a new friend request
  // PARAM $from : from this user ID
  //       $to : to this user ID

    $sql = "INSERT INTO `relationships` (`user_id_a`, `user_id_b`, `status`) VALUES (?,?,'P')";
    $cond = [$from, $to];
    return $this->exec($sql, $cond);
  }

  function cxrequest ($from, $to) {
  // cxrequest() : cancel new friend request
  // PARAM $from : from this user ID
  //       $to : to this user ID

    $sql = "DELETE FROM `relationships` WHERE `user_id_a`=? AND `user_id_b`=? AND `status`='P'";
    $cond = [$from, $to];
    return $this->exec($sql, $cond);
  }

  function accept ($from, $to) {
  // accept() : accept friend request
  // PARAM $from : from this user ID
  //       $to : to this user ID

    $sql = "UPDATE `relationships` SET `status`='F' WHERE `user_id_a`=? AND `user_id_b`=?";
    $cond = [$from, $to];
    return $this->exec($sql, $cond);
  }

  function reject ($from, $to) {
  // reject() : reject friend request
  // PARAM $from : from this user ID
  //       $to : to this user ID

    $sql = "DELETE FROM `relationships` WHERE `status`='P' AND `user_id_a`=? AND `user_id_b`=?";
    $cond = [$from, $to];
    return $this->exec($sql, $cond);
  }

  function unfriend ($from, $to) {
  // unfriend() : hello darkness my old friend
  // PARAM $from : from this user ID
  //       $to : to this user ID

    $sql = "DELETE FROM `relationships` WHERE (`user_id_a`=? AND `user_id_b`=? AND `status`='F')";
    $sql .= " OR (`user_id_a`=? AND `user_id_b`=? AND `status`='F')";
    $cond = [$from, $to, $to, $from];
    return $this->exec($sql, $cond);
  }
  
  function block ($from, $to) {
  // block() : block target person
  // PARAM $from : from this user ID
  //       $to : to this user ID

    // Flips table - Remove all current relationship
    $sql = "DELETE FROM `relationships` WHERE (`user_id_a`=? AND `user_id_b`=?)";
    $sql .= " OR (`user_id_a`=? AND `user_id_b`=?)";
    $cond = [$from, $to, $to, $from];
    $pass = $this->exec($sql, $cond);

    // Add block
    if ($pass) {
      $sql = "INSERT INTO `relationships` (`user_id_a`, `user_id_b`, `status`) VALUES (?,?,'B')";
      $cond = [$from, $to];
      $pass = $this->exec($sql, $cond);
    }

    return $pass;
  }

  function unblock ($from, $to) {
  // unblock() : unblock target person
  // PARAM $from : from this user ID
  //       $to : to this user ID

    $sql = "DELETE FROM `relationships` WHERE `user_id_a`=? AND `user_id_b`=?";
    $cond = [$from, $to];
    return $this->exec($sql, $cond);
  }
}
?>