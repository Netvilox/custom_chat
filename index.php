<?php 
require_once 'functions.php';
$basePath = '/ch/';
$cssPath = $basePath . 'assets/css/';
$jsPath = $basePath . 'assets/js/';
$imgPath = $basePath . 'assets/img/';
$userId = $_GET['uid']; //get this userId from session
changeUserStatus($userId, 1); //this function will change status of user in session table
$chatList = getChatList($userId);
if(isset($_GET['rid'])) {
	$receiverId = trim($_GET['rid']);
	$users = array_keys($chatList);
	if(!in_array($receiverId, $users)) {
		$chatList = newUser($receiverId, $chatList);
	}
}
$lastMsgId = getLatestMsg($userId);
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
<script type="text/javascript">
        //window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        var lastMs = '<?php echo $lastMsgId;?>';
        var list = '<?php echo json_encode(array_keys($chatList));?>';
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
        	<?php if(isset($receiverId)) { ?>
        	setTimeout(function(){ $("#chat-<?php echo $receiverId;?>").trigger("click"); }, 300);
          	<?php } ?>
          $('.loadchat').click(function(){
			$("#msgtxt").val('');
			$('.loadchat').each(function( index ) {
				$(this).removeClass('active');
			});
			$(this).removeClass('newchat');
			$(this).addClass('active');
              var liId = $(this).attr('id');
              var id = liId.replace("chat-", "");
				$.ajax({
					url: "<?php echo $basePath;?>getmsgs.php",
					type: "post",
					data:"u1=<?php echo $userId?>&u2="+id,
					success: function(result){
						$("#chat_area").html(result);
						$('#chat_area').scrollTop($('#chat_area')[0].scrollHeight);
						$('#msgArea').show();
						$('#sendbtn').attr('data-uid', id);
						//$("#chat_area").animate({ scrollTop: $('#chat_area').prop("scrollHeight")}, 1000);
					},
					beforeSend : function(){
				       //show loader
						$("#chat_area").html('<img src="<?php echo $imgPath;?>ajax-loader.gif" alt="Loading...">');
				    }
	      		});
           });
			$("#sendbtn").click(function(){
				var msg = $("#msgtxt").val();
				var id = $(this).attr('data-uid');
				var obj = $(this);
				if(msg != ""){
					$.ajax({
						url: "<?php echo $basePath;?>sendmsg.php",
						type: "post",
						data:"u1=<?php echo $userId?>&u2="+id+"&msg="+msg,
						success: function(result){
							if($("#chat_area").find('ul').length)
								$("#chat_area").find('ul').append(result);
							else {
								$("#chat_area").html('<ul class="list-unstyled">'+result+"</ul>");
							}
							$('#chat_area').scrollTop($('#chat_area')[0].scrollHeight);
							$("#msgtxt").val('');
							obj.html('Send');
						},
						beforeSend : function(){
							obj.html('Sending...');
					    }
		      		});	
				}
			});
			function seekChannel() {
				var pass_data=5;
				var currChat = $("#sendbtn").attr('data-uid');
				$.ajax({
			        url: "<?php echo $basePath;?>seek.php",
			        //async:false, // set async false to wait for previous response
			        type: "post",
			        dataType: "json",
			        data:"u1=<?php echo $userId;?>&lastMsg="+lastMs+"&currChat="+currChat+"&list="+list,
			        success: function(data) {
				        if(data) {
					        if(data.lastMsg)
				        		lastMs = data.lastMsg;
				        	if(data.newChats) {
				        		var arr = Object.values(data.newChats);
								$.each(arr, function(index, value){
									$("#chat-"+value).addClass('newchat');
								})
				        	}
				        	if(data.chatHTML) {
				        		if($("#chat_area").find('ul').length)
									$("#chat_area").find('ul').append(data.chatHTML);
								else {
									$("#chat_area").html('<ul class="list-unstyled">'+data.chatHTML+"</ul>");
								}
								$('#chat_area').scrollTop($('#chat_area')[0].scrollHeight);
				        	}
				        	if(data.newsides) {
				        		var arr1 = Object.values(data.newsides);
								$.each(arr1, function(index, value){
									$("#chat-list").append(value);
									$(".loadchat").unbind().bind("click", function(){
										$("#msgtxt").val('');
										$('.loadchat').each(function( index ) {
											$(this).removeClass('active');
										});
										$(this).removeClass('newchat');
										$(this).addClass('active');
							              var liId = $(this).attr('id');
							              var id = liId.replace("chat-", "");
											$.ajax({
												url: "<?php echo $basePath;?>getmsgs.php",
												type: "post",
												data:"u1=<?php echo $userId?>&u2="+id,
												success: function(result){
													$("#chat_area").html(result);
													$('#chat_area').scrollTop($('#chat_area')[0].scrollHeight);
													$('#msgArea').show();
													$('#sendbtn').attr('data-uid', id);
													//$("#chat_area").animate({ scrollTop: $('#chat_area').prop("scrollHeight")}, 1000);
												},
												beforeSend : function(){
											       //show loader
													$("#chat_area").html('<img src="<?php echo $imgPath;?>ajax-loader.gif" alt="Loading...">');
											    }
								      		});
									});
								});
								
				        	}
				        }
				        //lastMs = '50';
			        }
				});
			}
			setInterval(function(){ seekChannel(); }, 5000);
        });
    </script>
</head>
<body>
	<script src="<?php echo $jsPath;?>45e03a14ce.js"></script>
	<div class="main_section">
		<div class="container">
			<div class="chat_container">
				<div class="col-sm-3 chat_sidebar">
					<div class="row">
						<div id="custom-search-input">
							<div class="input-group col-md-12">
								<input type="text" class="  search-query form-control"
									placeholder="Conversation" />
								<button class="btn btn-danger" type="button">
									<span class=" glyphicon glyphicon-search"></span>
								</button>
							</div>
						</div>
						<div class="dropdown all_conversation">
							<button class="dropdown-toggle" type="button" id="dropdownMenu2"
								data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class="fa fa-weixin" aria-hidden="true"></i> All
								Conversations <span class="caret pull-right"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<li><a href="#"> All Conversation </a>
									<ul class="sub_menu_ list-unstyled">
										<li><a href="#"> All Conversation </a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li><a href="#">Separated link</a></li>
									</ul></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
						<div class="member_list">
							<?php if($chatList):?>
							<ul id="chat-list" class="list-unstyled">
								<?php foreach($chatList as $userId => $list):?>
								<li id="chat-<?php echo $userId;?>" class="left clearfix loadchat">
									<span class="chat-img pull-left"> <img
											src="<?php echo $imgPath.$list['img'];?>"
											alt="User Avatar" class="img-circle">
									</span>
									<div class="chat-body clearfix">
										<div class="header_sec">
											<strong class="primary-font"><?php echo $list['name']?></strong>
											<strong class="pull-right"><?php echo $list['status'] ? '<img src="'.$imgPath.'green.png" alt="Online">' : '<img src="'.$imgPath.'grey.png" alt="Offline">'?></strong>
										</div>
										<div class="contact_sec">
											<strong class="primary-font">(123) 123-456</strong> <span
												class="badge pull-right">3</span>
										</div>
									</div>
								</li>
								<?php endforeach;?>
							</ul>
							<?php endif;?>
						</div>
					</div>
				</div>
				<!--chat_sidebar-->


				<div class="col-sm-9 message_section">
					<div class="row">
						<div class="new_message_head">
							<div class="pull-right">
								<div class="dropdown">
									<button class="dropdown-toggle" type="button"
										id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
										<i class="fa fa-cogs" aria-hidden="true"></i> Setting <span
											class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right"
										aria-labelledby="dropdownMenu1">
										<li><a href="<?php echo $basePath?>logout.php">Logout</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!--new_message_head-->

						<div class="chat_area" id="chat_area">
						<ul class="list-unstyled">
							<h2 style="text-align: center;">You're all set for the Day</h2>
							<h3 style="text-align: center;">Please choose conversation from the left.</h3>
							</ul>
						</div>
						<!--chat_area-->
						<div class="message_write" id="msgArea" style="display: none;">
							<textarea class="form-control" id="msgtxt" placeholder="type a message"></textarea>
							<div class="clearfix"></div>
							<div class="chat_bottom">
								<a href="javascript:void(0);" data-uid="0" id="sendbtn" class="pull-right btn btn-success"> Send</a>
							</div>
						</div>
					</div>
				</div>
				<!--message_section-->
			</div>
		</div>
	</div>
	<script type="text/javascript">
	
	</script>
</body>
</html>
