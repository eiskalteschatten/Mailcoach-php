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
		<div class="header">
			<div class="left">
				<div class="logo">Mailcoach</div>
				<div class="toolbar stable">
					<a href="#" class="button">Compose</a>
				</div>
				<div class="toolbar dynamic">

				</div>
			</div>
			<div class="right">
				<div class="name">Alex Seifert</div>
				<div class="email">(mailcoach@alexseifert.com)</div>
				<div class="logout">
					<a href="#">Sign Out</a>
				</div>
			</div>
		</div>
		<div class="list box folderbox">
			<div class="innerbox">
				<div class="item selected">Inbox (<span id="emailcount"></span>)</div>
				<div class="item">Drafts</div>
			</div>
			<div class="toolbar">
				<a href="javascript:newNote();" class="button">New</a>
				<a href="javascript:deleteNote();" class="button right">Delete</a>
			</div>
		</div>
		<div class="list box emailbox">
			<div class="toolbar search">
				<input type="text" placeholder="Search Email">
			</div>
			<div class="innerbox emails">&nbsp;</div>
		</div>
		<div class="box emailbody">
			test
		</div>
	</body>
</html>