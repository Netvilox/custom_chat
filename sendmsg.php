<?php
require_once 'functions.php';
$userId = $_POST['u1']; //current loggedin user
$anotherId = $_POST['u2'];
$msg = strip_tags($_POST['msg']);
sendMsg($userId, $anotherId, $msg);
?>
<li class="left clearfix admin_chat"><span
			class="chat-img1 pull-right"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
				alt="User Avatar" class="img-circle">
</span>
	<div class="chat-body1 clearfix">
		<p><?php echo $msg;?></p>
		<!-- <div class="chat_time pull-left"><?php //echo date("d-m-Y h:ia");?></div> -->
	</div></li>