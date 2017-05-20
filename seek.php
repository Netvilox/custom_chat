<?php
require_once 'functions.php';
$userId = $_POST['u1']; //current loggedin user
$lastMsg = $_POST['lastMsg'];
$currChat = $_POST['currChat'];
if(isset($_POST['list'])) {
	$list = json_decode($_POST['list']);
}
$msgs = getNewMsgs($userId, $lastMsg);
$data = array();
if($msgs) {
	foreach ($msgs as $msg) {
		if($msg['from'] == $currChat) {
			$data['chatHTML'] .= '<li class="left clearfix"><span class="chat-img1 pull-left"> <img
									src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
									alt="User Avatar" class="img-circle">
								</span>
								<div class="chat-body1 clearfix">
									<p>'.$msg['message'].'</p>
								</div></li>';
		} else {
			$data['newChats'][$msg['from']] = $msg['from'];
		}
		$data['lastMsg'] = $msg['id'];
	}
 }
 echo json_encode($data);