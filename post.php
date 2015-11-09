<?php
	session_start();
	if ( !isset( $_SESSION['username'] ) )
		echo "<script>alert('請登入'); location.href='./';</script>";
?>
<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POST</title>
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
								<a href="./sourceLink.php">參考連結</a>
							</li>
							<li>
								<a href="./fonyasongInfo.php">風雅頌</a>
							</li>
							<li>
								<a href="./infoSub.php">就業學程</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
						        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">工具 <span class="glyphicon glyphicon-cog"></span>&nbsp;</a>
						        <ul class="dropdown-menu">
						            <li><a href="./manager.php">管理員</a></li>
						            <li role="separator" class="divider"></li>
						            <li><a href="./post.php?type=1">新增公告</a></li>
						            <li><a href="./editor.php?type=1">公告編輯</a></li>
						            <li><a href="./editor.php?type=2">課程編輯</a></li>
						            <li><a href="./teacherEditor.php">師資編輯</a></li>
						            <li><a href="./recruitEditor.php">招生資訊編輯</a></li>
						            <li><a href="./collectionEditor.php">上傳作品</a></li>
						            <li><a href="./contactEditor.php">聯絡方式編輯</a></li>
						            <li><a href="./showEditor.php">節目表編輯</a></li>
						            <li role="separator" class="divider"></li>
						            <li><a href="./logout.php">登出</a></li>
						        </ul>
					        </li>
						</ul>
					</div>
				</nav>
				<div class="col-sm-6 col-sm-offset-3" style="background: rgba(255, 255, 255, 0.9);">
					<h1>
						<CENTER>Post</CENTER>
					</h1>
					<form class="form-horizontal" action="./insertPost.php" method="POST">
						<div class="form-group">
							 
							<label class="col-sm-2 control-label">
								Title:
							</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="inputTitle" required/>
							</div>
						</div>
						<div class="form-group">
							 
							<label class="col-sm-2 control-label">
								Content:
							</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="10" name="inputContent" required></textarea>
								<?php echo "<input type='hidden' name='inputType' value='". $_GET['type'] ."' />"; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">
								Category:
							</label>
							<div class="col-sm-4">
								<select class="form-control" name="category">
								    <!--<option>--Choose a category--</option>-->
								  	<option value="1">Activity</option>
								  	<option value="2">Class</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">
								Top:
							</label>
							<div class="col-sm-4">
								<select class="form-control" name="pin">
								    <!--<option>--Choose a category--</option>-->
								  	<option value="0">No</option>
								  	<option value="1">Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-2">
								<CENTER>
									<button type="submit" class="btn btn-default">
										Submit
									</button>
								</CENTER>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	
</script>
</html>