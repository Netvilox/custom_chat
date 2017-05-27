<?php
require_once 'functions.php';
$basePath = '/ch/';
$imgPath = $basePath . 'assets/img/';
$userId = $_POST['u1']; //current loggedin user
$anotherId = $_POST['u2'];
$img = $_POST['img'];
$msg = strip_tags($_POST['msg']);
sendMsg($userId, $anotherId, $msg);
?>
<li class="left clearfix admin_chat"><span
			class="chat-img1 pull-right"> <img
				src="<?php echo $imgPath.$img;?>"
				alt="User Avatar" class="img-circle">
</span>
	<div class="chat-body1 clearfix">
		<p><?php echo $msg;?></p>
		<!-- <div class="chat_time pull-left"><?php //echo date("d-m-Y h:ia");?></div> -->
	</div></li>