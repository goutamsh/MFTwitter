<?php
/*
 * Created on Oct 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 *
 */
 //session_start(); // start up your PHP session! 
 
 //include_once("database.inc");
 
  $username = $_POST['user'];
  $password = ($_POST['password']);
 
  $sql  = "SELECT * ";
  $sql .= "FROM USERS ";
  $sql .= "WHERE LOGIN='".$username . "' AND PASSWORD='" . $password."'";
  
  //$con = mysql_connect('localhost', 'root', '');
  $con = mysql_connect("localhost:2083","gshepurc_mft","goutamsh1");
  //echo $sql;
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  //mysql_select_db("mftwitter", $con);
  mysql_select_db("gshepurc_mftwitter", $con);
  $result = mysql_query($sql, $con);
  $row = mysql_fetch_array( $result );
  $validateUser = $row['LOGIN'];
$validatePass = $row['PASSWORD'];
  
  //$stmt = $pdo->prepare($sql);
  //$stmt->execute(array(
  //          ":u"=>$username,
  //          ":p"=>$password
  //        ));
  //$row = $stmt->fetch();
 
  // clear out any existing session that may exist
  session_start();
  session_destroy();
  session_start();
 
  if ($username == $validateUser && $password == $validatePass) {
    $_SESSION['signed_in'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['userId'] = $row['USER_ID'];
    $_SESSION['FIRST_NAME'] = $row['FIRST_NAME'];
    //echo 'yes';
    header("Location: mftwitter.php");
  } else {
    $_SESSION['flash_error'] = "Invalid username or password";
    $_SESSION['signed_in'] = false;
    $_SESSION['username'] = null;
    $_POST['msg'] = 'Invalid UserId or Password.';
    //echo 'No';
    header("Location: login.php");
  }
?>
