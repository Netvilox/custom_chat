<?php
require_once 'functions.php';
$userId = 4; //$_POST['u1'];
$anotherId = 5; //$_POST['u2'];
$msgs = getChatMsgs($userId, $anotherId);
if($msgs) {
	?>
	<ul class="list-unstyled">
	<?php foreach ($msgs as $msg) {?>
		<li class="left clearfix"><span class="chat-img1 pull-left"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p>Contrary to popular belief, Lorem Ipsum is not simply
					random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard
					McClintock, a Latin professor at Hampden-Sydney College in
					Virginia.</p>
				<div class="chat_time pull-right">09:40PM</div>
			</div></li>
		<li class="left clearfix"><span class="chat-img1 pull-left"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p>Contrary to popular belief, Lorem Ipsum is not simply
					random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard
					McClintock, a Latin professor at Hampden-Sydney College in
					Virginia.</p>
				<div class="chat_time pull-right">09:40PM</div>
			</div></li>
		<li class="left clearfix"><span class="chat-img1 pull-left"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p>Contrary to popular belief, Lorem Ipsum is not simply
					random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard
					McClintock, a Latin professor at Hampden-Sydney College in
					Virginia.</p>
				<div class="chat_time pull-right">09:40PM</div>
			</div></li>
		<li class="left clearfix admin_chat"><span
			class="chat-img1 pull-right"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p>Contrary to popular belief, Lorem Ipsum is not simply
					random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard
					McClintock, a Latin professor at Hampden-Sydney College in
					Virginia.</p>
				<div class="chat_time pull-left">09:40PM</div>
			</div></li>
		<li class="left clearfix admin_chat"><span
			class="chat-img1 pull-right"> <img
				src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
				alt="User Avatar" class="img-circle">
		</span>
			<div class="chat-body1 clearfix">
				<p>Contrary to popular belief, Lorem Ipsum is not simply
					random text. It has roots in a piece of classical Latin
					literature from 45 BC, making it over 2000 years old. Richard
					McClintock, a Latin professor at Hampden-Sydney College in
					Virginia.</p>
				<div class="chat_time pull-left">09:40PM</div>
			</div></li>
<?php }?>	
	
	</ul>
<?php
}