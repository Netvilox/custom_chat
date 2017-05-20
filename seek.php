<?php
require_once 'functions.php';
$basePath = '/ch/';
$imgPath = $basePath . 'assets/img/';
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
		} elseif(in_array($msg['from'], $list)) {
			$data['newChats'][$msg['from']] = $msg['from'];
		} else {
			$data['newsides'][$msg['from']] = '<li id="chat-'.$msg['from'].'" class="left clearfix loadchat newchat">
									<span class="chat-img pull-left"> <img
											src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
											alt="User Avatar" class="img-circle">
									</span>
									<div class="chat-body clearfix">
										<div class="header_sec">
											<strong class="primary-font">'.$msg['first_name'].' '.$msg['last_name'].'</strong>
											<strong class="pull-right"><img src="'.$imgPath.'green.png" alt="Online"></strong>
										</div>
										<div class="contact_sec">
											<strong class="primary-font">(123) 123-456</strong> <span
												class="badge pull-right">3</span>
										</div>
									</div>
								</li>';
		}
		$data['lastMsg'] = $msg['id'];
	}
 }
 echo json_encode($data);