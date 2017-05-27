<?php
require_once 'functions.php';
$basePath = '/ch/';
$imgPath = $basePath . 'assets/img/';
$userId = $_POST['u1']; //current loggedin user
$anotherId = $_POST['u2'];
$img = $_POST['img'];
$msgs = getChatMsgs($userId, $anotherId);
if($msgs) {
	$otherUserDetails = getUser($anotherId);
	?>
	<ul class="list-unstyled">
	<?php foreach ($msgs as $msg) {?>
		<?php if($userId != $msg['from']) {?>
		<li class="left clearfix"><span class="chat-img1 pull-left"> <img
				src="<?php echo $imgPath.$otherUserDetails['p_img'];?>"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p><?php echo $msg['message'];?></p>
				<!-- <div class="chat_time pull-right"><?php echo date("d-m-Y h:ia");$msg['message'];?></div> -->
			</div></li>
		<?php } else {?>
		<li class="left clearfix admin_chat"><span
			class="chat-img1 pull-right"> <img
				src="<?php echo $imgPath.$img;?>"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p><?php echo $msg['message'];?></p>
				<!-- <div class="chat_time pull-left"><?php echo date("d-m-Y h:ia");$msg['message'];?></div> -->
			</div></li>
			<?php }?>
<?php }?>	
	
	</ul>
<?php
}