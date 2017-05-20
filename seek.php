<?php
require_once 'functions.php';
$userId = $_POST['u1']; //current loggedin user
$lastMsg = $_POST['lastMsg'];
$msgs = getNewMsgs($userId, $lastMsg);
if($msgs) {
	?>
	<ul class="list-unstyled">
	<?php foreach ($msgs as $msg) {?>
		<?php if($userId != $msg['from']) {?>
		<li class="left clearfix"><span class="chat-img1 pull-left"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p><?php echo $msg['message'];?></p>
				<!-- <div class="chat_time pull-right"><?php echo date("d-m-Y h:ia");$msg['message'];?></div> -->
			</div></li>
		<?php } else {?>
		<li class="left clearfix admin_chat"><span
			class="chat-img1 pull-right"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
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