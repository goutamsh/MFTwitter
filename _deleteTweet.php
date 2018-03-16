<?php
/*
 * Created on Oct 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
   session_start(); // start up your PHP session! 
 $msgId = $_GET['msgId'];
 //$userId = $_SESSION['userId'];
// echo $msgId;
 
 $sql  = "delete from CHAT_MSG where CHAT_MSG_ID = ".$msgId;
//  $con = mysql_connect('localhost', 'root', '');
  $con = mysql_connect("localhost:2083","gshepurc_mft","goutamsh1");
 // echo $sql;
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  //mysql_select_db("mftwitter", $con);
   mysql_select_db("gshepurc_mftwitter", $con);
  $result = mysql_query($sql, $con); 
  //echo $result;
  header("Location: mftwitter.php");
  
?>
