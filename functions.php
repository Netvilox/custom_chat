<?php
error_reporting (0);
require_once 'db.php';
function getChatList($userId) {
	global $conn;
	$stmt = $conn->prepare("SELECT u.id, u.first_name, u.last_name, u.p_img, s.status FROM chats c INNER JOIN users u ON u.id = c.from INNER JOIN session s on s.user_id = c.from where c.to = :userId group by(c.from)");
	$stmt->bindParam('userId', $userId);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$fromResult = $stmt->fetchAll();
	$users = array();
	$frmIds= '';
	if($fromResult) {
		foreach($fromResult as $res) {
			$users[$res['id']]['name'] = $res['first_name'].' '. $res['last_name'];
			$users[$res['id']]['status'] = $res['status'];
			$users[$res['id']]['img'] = $res['p_img'];
		}
		$frmIds = implode(',', array_keys($users));
	}
	if($frmIds)
		$stmt = $conn->prepare("SELECT u.id, u.first_name, u.last_name, u.p_img, s.status FROM chats c INNER JOIN users u ON u.id = c.to  INNER JOIN session s on s.user_id = c.from where c.from = :userId AND c.to NOT IN($frmIds) group by(c.from)");
	else 
		$stmt = $conn->prepare("SELECT u.id, u.first_name, u.last_name, u.p_img, s.status FROM chats c INNER JOIN users u ON u.id = c.to  INNER JOIN session s on s.user_id = c.from where c.from = :userId group by(c.from)");
	$stmt->bindParam('userId', $userId);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$toResult = $stmt->fetchAll();
	if($toResult) {
		foreach($toResult as $res) {
			$users[$res['id']]['name'] = $res['first_name'].' '. $res['last_name'];
			$users[$res['id']]['status'] = $res['status'];
			$users[$res['id']]['img'] = $res['p_img'];
		}
	}
	return $users;
	//print_r($users); die;
}
function getLatestMsg($userId = 0) {
	global $conn;
	$stmt = $conn->prepare("SELECT c.id FROM chats c where c.to = :userId OR c.from = :userId order by c.id DESC limit 1");
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':userId', $userId);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$res = $stmt->fetch();
	if($res)
		return $res['id'];
	else
		return 0;
}
function changeUserStatus($userId = 0, $status = 1) {
	global $conn;
	$stmt = $conn->prepare("SELECT id FROM session where user_id = $userId");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetch();
	if($result) {
		$stmt = $conn->prepare("UPDATE session set status = :status where id = :id");
		$stmt->bindParam(':id', $result['id']);
		$stmt->bindParam(':status', $status);
		$stmt->execute();
	} else {
		$stmt = $conn->prepare("INSERT into session (user_id, status) VALUES (:userId, :status)");
		$stmt->bindParam(':userId', $userId);
		$stmt->bindParam(':status', $status);
		$stmt->execute();
	}
}
function getChatMsgs($userId, $otherUserId) {
	global $conn;
	$stmt = $conn->prepare("SELECT c.id, c.message, c.sent, c.recd, c.from, c.to FROM chats c where (c.from = :userId AND c.to = :anotherUserId) OR (c.to = :userId AND c.from = :anotherUserId)");
	$stmt->bindParam('userId', $userId);
	$stmt->bindParam('anotherUserId', $otherUserId);
	$stmt->bindParam('userId', $userId);
	$stmt->bindParam('anotherUserId', $otherUserId);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$res = $stmt->fetchAll();
	return $res;
}
function sendMsg($from, $to, $msg) {
	global $conn;
	$stmt = $conn->prepare("INSERT into chats (chats.from, chats.to, message) VALUES (:from, :to, :msg)");
	$stmt->bindParam(':from', $from);
	$stmt->bindParam(':to', $to);
	$stmt->bindParam(':msg', $msg);
	$stmt->execute();
}
function getNewMsgs($userId, $lastMsg) {
	global $conn;
	$stmt = $conn->prepare("SELECT c.id, c.message, c.sent, c.recd, c.from, c.to, u.first_name, u.last_name, u.p_img FROM chats c INNER JOIN users u ON u.id = c.from where c.to = :userId AND c.id > :lastMsg");
	$stmt->bindParam('userId', $userId);
	$stmt->bindParam('lastMsg', $lastMsg);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$res = $stmt->fetchAll();
	return $res;
}
function newUser($userId, $users) {
	global $conn;
	$status = 0;
	$stmt = $conn->prepare("SELECT id, status FROM session where user_id = $userId");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetch();
	if(!$result) {
		$stmt = $conn->prepare("INSERT into session (user_id, status) VALUES (:userId, :status)");
		$stmt->bindParam(':userId', $userId);
		$stmt->bindParam(':status', $status);
		$stmt->execute();
	} else {
		$status = $result['status'];
	}
	$stmt = $conn->prepare("SELECT u.id, u.first_name, u.last_name, u.p_img FROM users u where id = $userId");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$res = $stmt->fetch();
	$users[$res['id']]['name'] = $res['first_name'].' '. $res['last_name'];
	$users[$res['id']]['status'] = $status;
	$users[$res['id']]['img'] = $res['p_img'];
	return $users;
}

function getUser($userId) {
	global $conn;
	$stmt = $conn->prepare("SELECT u.id, u.first_name, u.last_name, u.p_img FROM users u where id = $userId");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$res = $stmt->fetch();
	return $res;
}