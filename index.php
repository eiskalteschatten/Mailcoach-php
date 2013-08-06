<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=1024" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
		<title>Mailcoach</title>
		<meta name="Description" content="" />

		<link rel="stylesheet" href="resources/css/mainss.css" type="text/css" />

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="resources/js/scripts.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php
			try {
				$server = "";
				$user = "";
				$passwd = "";
				
				include("mail.config");
				
				$inbox = imap_open($server,$user,$passwd) or die("Could not open Mailbox - try again later!");
				$message_count = imap_num_msg($inbox);
				
				echo "Emails: ".$message_count;
				
				$emails = imap_search($inbox,'ALL');
				
				if($emails) {
					$output = '';
					
					rsort($emails);
					
					foreach($emails as $email_number) {
						/* get information specific to this email */
						$overview = imap_fetch_overview($inbox,$email_number,0);
						$message = imap_fetchbody($inbox,$email_number,2);
						
						/* output the email header information */
						$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
						$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
						$output.= '<span class="from">'.$overview[0]->from.'</span>';
						$output.= '<span class="date">on '.$overview[0]->date.'</span>';
						$output.= '</div>';
					}
					
					echo $output;
				} 
				
				imap_close($mbox);
			}
			catch (Exception $e) {
				throw new Exception('Something went wrong', 0, $e);
			}
		?>
	</body>
</html>