<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log in</title>
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
							<li class="active">
								<a href="#">登入</a>
							</li>
						</ul>
					</div>
				</nav>
				<div class="col-sm-offset-3 col-md-6">
					<CENTER>
						<h1>
							Log in
						</h1>
					</CENTER>
					<form class="form-horizontal" role="form" action="./checkAcc.php" method="post">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">
								Account :
							</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="inputAcc" required/>
							</div>
						</div>
						<div class="form-group">
							 
							<label for="inputPassword3" class="col-sm-2 control-label">
								Password :
							</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="inputPassword" required/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<CENTER>
									<button type="submit" class="btn btn-default" style="/*color: #fff;background-color: #e67e22;border-color: #d35400*/">
										Sign in
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