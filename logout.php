<?php 
require_once 'functions.php';
$basePath = '/ch/';
$cssPath = $basePath . 'assets/css/';
$jsPath = $basePath . 'assets/js/';
$imgPath = $basePath . 'assets/img/';
$userId = 4; //get this userId from session
changeUserStatus($userId, 0); //this function will change status of user in session table
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex">

<title>chats</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link
	href="<?php echo $cssPath;?>bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
	<link
	href="<?php echo $cssPath;?>style.css"
	rel="stylesheet">
<script src="<?php echo $jsPath;?>jquery-1.10.2.min.js"></script>
<script
	src="<?php echo $jsPath;?>bootstrap.min.js"></script>
</head>
<body>
	<script src="<?php echo $jsPath;?>45e03a14ce.js"></script>
	<div class="main_section">
		<div class="container">
			<div class="chat_container">
				<div class="col-sm-9 message_section">
					<div class="row">
						<div class="new_message_head">
							<div class="pull-right">
							</div>
						</div>
						<!--new_message_head-->

						<div class="chat_area" id="chat_area">
						<ul class="list-unstyled">
							<h2 style="text-align: center;">Yay!! You Logged Out.</h2>
							</ul>
						</div>
						<!--chat_area-->
					</div>
				</div>
				<!--message_section-->
			</div>
		</div>
	</div>
</body>
</html>
