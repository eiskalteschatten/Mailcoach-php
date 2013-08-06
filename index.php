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
 echo "hi";
				$mbox = imap_open($server,$user,$passwd) or die("Could not open Mailbox - try again later!");
				$message_count = imap_num_msg($mbox);
 echo "hi2";
				for ($i = 1; $i <= $message_count; ++$i) {
					echo imap_header($mbox, $i) . " (" . date("Y-m-d H:i:s", strtotime($header->MailDate)) . ")<br />";
				}
				imap_close($mbox);
				 echo "hi3";
			}
			catch (Exception $e) {
				throw new Exception('Something went wrong', 0, $e);
			}
		?>
	</body>
</html>