<?php
	include("../mail.config");

	class fetchMail {
		private $server = "";
		private $user = "";
		private $passwd = "";
		private $mailbox;
		
		function __construct() {
			$mailConfig = new mailConfig;
			$this->server = $mailConfig->server;
			$this->user = $mailConfig->user;
			$this->passwd = $mailConfig->passwd;
			
			$this->mailbox = imap_open($this->server,$this->user,$this->passwd) or die("Could not connect to mail server!");
  		}
		
		function __destruct() {
			imap_close($this->mailbox);
		}
		
		public function fetchMail() {
			try {
				$emailinfo = array();
				$emailinfo['count'] = imap_num_msg($this->mailbox);
				
				$emails = imap_search($this->mailbox,'ALL');
				
				if($emails) {
					rsort($emails);
					
					foreach($emails as $email_number) {
						$overview = imap_fetch_overview($this->mailbox,$email_number,0);
						$message = imap_fetchbody($this->mailbox,$email_number,2);
						
						$output = '';
						$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
						$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
						$output.= '<span class="from">'.$overview[0]->from.'</span>';
						$output.= '<span class="date">on '.$overview[0]->date.'</span>';
						$output.= '<span class="emailnumber">'.$email_number.'</span>';
						$output.= '</div>';
						
						$emailinfo[] = $output;
					}
				} 
				
				echo json_encode($emailinfo);
			}
			catch (Exception $e) {
				throw new Exception('Something went wrong', 0, $e);
			}
		}

		public function getMailContent($email_number) {
			try {
				$mailcontent = array();
				$mailcontent["header"] = imap_fetchbody($this->mailbox,$email_number,0);
				$mailcontent["message"] = imap_fetchbody($this->mailbox,$email_number,1);
				
				$overview = imap_fetch_overview($this->mailbox,$email_number,0);
				$mailcontent["seen"] = $overview[0]->seen;
				$mailcontent["subject"] = $overview[0]->subject;
				$mailcontent["from"] = $overview[0]->from;
				$mailcontent["date"] = $overview[0]->date;
				
				echo json_encode($mailcontent);
			}
			catch (Exception $e) {
				throw new Exception('Something went wrong', 0, $e);
			}			
		}
	}
 	
	$fetchMail = new fetchMail;
	
	if ($_POST["type"] == "fetch") {
		$fetchMail->fetchMail();
	}
	else if ($_POST["type"] == "content") {
		$fetchMail->getMailContent($_POST["email_number"]);
	}
?>