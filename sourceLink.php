<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Source</title>
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
							<li class="active">
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
							<li>
								<?php
									session_start();
									if ( !isset( $_SESSION['username'] ) )
										echo "<a href='./login.php'>登入&nbsp;&nbsp;</a>";
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
								            <li><a href='contactEditor.php'>聯絡方式編輯</a></li>
								            <li><a href='showEditor.php'>節目表編輯</a></li>
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
				<div class="col-sm-offset-2 col-md-8 thumbnail" style="background: rgba(255, 255, 255, 0.9);">
					<h3>實習合作機構一覽：</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/1.png" style="width: 100%">
								</div>
								<div class="caption">
									<h4>
										<a href="http://www.yusmusic.com/" target="_blank">優勢音樂生活事務有限公司</a>
									</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/2.png" style="width: 100%">
								</div>
								<div class="caption">
									<h4>
										<a href="http://www.megaforce.tw/" target="_blank">強力音樂有限公司</a>
									</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/3.png" style="width: 100%">
								</div>
								<div class="caption">
									<h4>
										<a href="http://www.sonata.com.tw" target="_blank">奏鳴曲音樂器樂有限公司</a>
									</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/4.png" style="width: 100%">
								</div>
								<div class="caption">
									<h4>
										<a href="http://asiaway.myweb.hinet.net/about.html" target="_blank">亞蔚創意科技有限公司</a>
									</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/5.png" style="width: 100%">
								</div>
								<div class="caption">
									<h4>
										<a href="http://www.pulse899.com/" target="_blank">新竹勞工之聲廣播股份有限公司</a>
									</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/6.png" style="width: 100%">
								</div>
								<div class="caption">
									<h4>
										<a href="http://www.asiafm.com.tw/index2.php" target="_blank">亞洲電台</a>
									</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/7.png" style="width: 100%">
								</div>
								<div class="caption">
									<h4>
										<a href="http://formoresounds.wix.com/formoresounds" target="_blank">匯聲音樂整合行銷股份有限公司</a>
									</h4>
								</div>
							</div>
						</div>
					</div></br>


					<div class="col-md-12">
						<h3>網站連結：</h3>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/8.png" style="width: 100%">
								</div>
								<div class="caption">
									<h3>
										<a href="http://www.cycu.edu.tw/" target="_blank">中原大學學校首頁</a>
									</h3>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
										<img src="./dist/picture/9.png" style="width: 100%">
									</div>
									<div class="caption">
									<h3>
										<a href="http://www.bamid.gov.tw/bin/home.php" target="_blank">文化局影視及流行音樂產業局</a>
									</h3>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
								<div class="embed-responsive embed-responsive-16by9">
									<img src="./dist/picture/10.png" style="width: 100%">
								</div>
								<!--<div style="width: 100%; height: 200px; z-index: 1;position: relative;"></div>
								<iframe class="frame" src="http://www.tyccc.gov.tw/" width="90%" height="200px" scrolling="no" style="top:5px ;z-index: 0; position: absolute;"></iframe>-->
								<div class="caption">
									<h3>
										<a href="http://www.tyccc.gov.tw/" target="_blank">桃園市政府文化局</a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
</script>
</html>