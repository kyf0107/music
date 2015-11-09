<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Collection</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">  
	<link href="./dist/css/navbar.css" rel="stylesheet">
  	
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  	<script type="text/javascript" src="./dist/js/bootstrap.min.js"></script>	
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body style="padding-top: 70px">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
						</button> <a class="navbar-brand" href="./"><!--MUSIC@CYCU--> <img alt="Mark" src="./dist/cover/mark.png" style="max-height:100%;"></a>
					</div>
					
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href="./info.php">簡介</a>
							</li>
							<li>
								<a href="./recruit.php">招生資訊</a>
							</li>
							<li>
								<a href="./collection.php">作品集</a>
							</li>
							<li>
								<a href="./contact.php">連絡我們</a>
							</li>
							<li>
								<a href="#">參考連結</a>
							</li>
							<li>
								<a href="#">風雅頌</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<?php
									session_start();
									if ( !isset( $_SESSION['username'] ) )
										echo "<a href='./login.php'>登入</a>";
									else {
										echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>工具 <span class='glyphicon glyphicon-cog'></span>&nbsp;</a>
								        <ul class='dropdown-menu'>
								            <li><a href='./manager.php'>管理員</a></li>
								            <li role='separator' class='divider'></li>
								            <li><a href='./post.php?type=1'>新增公告</a></li>
								            <li><a href='./editor.php?type=1'>公告編輯</a></li>
								            <li><a href='./editor.php?type=2'>課程編輯</a></li>
								            <li><a href='./teacherEditor.php'>師資編輯</a></li>
								            <li><a href='recruitEditor.php'>招生資訊編輯</a></li>
								            <li><a href='collectionEditor.php'>上傳作品</a></li>
								            <li role='separator' class='divider'></li>
								            <li><a href='./logout.php'>登出</a></li>
								        </ul>";
									}

								?>
								<!--<a href="./login.php">登入</a>-->
							</li>
						</ul>
					</div>
				</nav>
				<div class="col-md-10 col-md-offset-1" style="background: rgba(255, 255, 255, 0.9);">
					<div class="page-header">
						<h1>
							<?php 
								include 'db.inc' ;
								/* check connection */
								if ($mysqli->connect_errno) {
								    printf("Connect failed: %s\n", $mysqli->connect_error);
								    exit();
								} // if
								else {
									$query = "SELECT * FROM collection WHERE cid = ". $_GET['id'];
									if ( $result = $mysqli->query($query) ) {
										$obj = $result->fetch_object();

										echo $obj->title ." <small> Created by ". $obj->author ."</small>" ;
										// echo "</br>" . count($data);
									} // if
									else
										echo "No result" ;
								} // else
							?>
						</h1>
					</div>
					<p class="lead" id="content">
						<?php echo str_replace( "\n", "</br>", str_replace( "  ", "&nbsp;&nbsp;&nbsp;&nbsp;", $obj->content ) ) ; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	// Check the main container is ready
	$('#content').ready(function(){
	    // Get each div
        // Get the content
        var str = $('#content').html();
        // Set the regex string
        var regex = /(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/ig
        // Replace plain text links by hyperlinks
        var replaced_text = str.replace(regex, "<a href='$1' target='_blank'>$1</a>");
        // Echo link
        $('#content').html(replaced_text);
	});
</script>
</html>