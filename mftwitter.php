<?php
/*
 * Created on Oct 15, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 session_start();
 //echo 'successfully logged in';
 
 function getTwittedMsgs(){
 	$sql  = "SELECT u.USER_ID as USER_ID, u.FIRST_NAME as FIRST_NAME, u.LAST_NAME as LAST_NAME, " .
					"u.ROLES_ID as ROLES_ID, u.LOGIN as LOGIN, c.MSG as MSG, c.CHAT_MSG_ID as MSG_ID, c.DATE1 as DATE1 FROM USERS u, CHAT_MSG c WHERE u.USER_ID = c.USER_ID" .
					" order by CHAT_MSG_ID DESC";
  //$sql .= "WHERE LOGIN='".$username . "' AND PASSWORD='" . $password."'";
  
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
  //echo $sql;
  //echo $result;
  //$rows = mysql_fetch_array($result);
  return $result;
 }
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>MfTwitter - Your Tweets</title>
<link rel="stylesheet" href="stylesheet/default.css" type="text/css">
<script type="text/javascript">
function checkMsgNSubmit(){

	if(document.form1.twitted_msg.value == ""){
		alert("Pls type something to submit");	
		
	}else{		
		document.form1.action = "_tweet.php";
		document.form1.submit();
	}
	
}
function deleteMsg(msgId){
	document.form1.action = "_deleteTweet.php?msgId="+msgId;
	document.form1.submit();
}
</script>
</head>
<body>


<?php 
//session_start();
//echo 'In Mftwitter.php USer 00: '.$_SESSION['username'];
	$userName = $_SESSION['username'];
	//echo 'In Mftwitter.php USer : '.$userName;
	if(!$userName){
		header("Location: login.php");
	}
?>
<table border="2" width="90%" align="center">
<tr><td>
<?php include("header.php"); ?>
<form name="form1" method="post">
<textarea rows="3" cols="80" name="twitted_msg"></textarea>
<input type="button" value="Submit" class = "BUTTON_STYLE" onclick="checkMsgNSubmit()">
<a href='mftwitter.php'>Refresh</a>
</form>

<center>
<div style="width: 100%;height: 400px;overflow: auto;">
<table align="left" border="0" width="100%">

<?php 
	$tweets = getTwittedMsgs();
	//echo $tweets;
	while($row = mysql_fetch_array($tweets))
  	{
?>
	<tr>
		<td width="10%"><?php echo $row['FIRST_NAME']?>:</td>
		<td width="80%"><?php echo $row['MSG']?></td>
		
		<td width="20%"><?php echo $row['DATE1']?></td>
		<td>
			<?php 
				//echo $row['LOGIN'].$userName;
				if($userName == $row['LOGIN']){
			?>
				<a href="_deleteTweet.php?msgId=<?php echo $row['MSG_ID']?>">delete</a>	
			<?php }?>
		</td>
	</tr>
<?php 
  	}
?>



</table>
</div>
<br>
<h5>©Copy Right: MfTwitter®<h5>
</center>
</td>
</tr>
</table>
</body>
</html>

