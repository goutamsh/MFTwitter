<?php
/*
 * Created on May 18, 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 //mail("goutam.s.h@gmail.com","Subject","Hello World ..from PHPExpt :)","From: goutam.s.h@gmail.com");
 //echo "Mail sent ..Pls check..follow up";

$to = 'goutam.s.h@gmail.com';
$subject = 'the subject';
$from = 'goutam@gshepur.com';
	$message = 'Hi,' .
			'<br>' .
			'You have been Invited to join '.'Best Buddies'.' group.<br>' .
					'Please register.<br>' .
					'http://gshepur.com/BudDialogue/registerMe.php?inviteId='.$invitationId.'<br>' .
							'<br>' .
							'Thanks,' .
							'<br>' .
							'Goutam';

if(mail($to, $subject, $message, "From: $from"))
  echo "Mail sent";
else
  echo "Mail send failure - message not sent";
?>