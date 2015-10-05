<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MUSIC</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">  
	<link href="./dist/css/bootstrap-theme.min.css" rel="stylesheet">
  	
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  	<script type="text/javascript" src="./dist/js/bootstrap.min.js"></script>	
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
						</button> <a class="navbar-brand" href="#">MUSIC@CYCU</a>
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
								<a href="#">連絡我們</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#">登入</a>
							</li>
						</ul>
					</div>
					
				</nav>
				<div class="jumbotron">
					<h2>
						<strong>數位音樂學程</strong>
					</h2>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;全台灣第一個以流行音樂學系概念來規劃課程的---學士後數位音樂應用學士學位學程, 即日起在中原大學熱烈招生中!</br></br>
 
						第二屆招收20名對數位音樂製作、流行音樂創作、跨界展演有興趣的學員, 入學後將用1-2年的時間, 隨資深唱片製作人及專業音樂人學習,
						修滿48學分後將可獲頒學士學位證書! 課程使用學校的專業錄音室、攝影棚、數位音樂教室...等, 紮實的在正規課程中, 學習流行音樂創作演奏和唱片製作過程, 
						畢業時每人將寫出自己人生的主打歌, 並由業界老師帶領實作和實習課程, 完整製作出一張唱片!</br></br>
 
						團隊合作的課程設計, 讓學員們可以熟悉流行音樂職場的運作模式, 同時培訓中也將融入中原大學注重的人文素養和敬業態度的堅持。</br></br>
 
						並首屆招收20名音樂廣播製作組學生。
					</p>
					<p>
						<a class="btn btn-primary btn-large" href="#">Learn more</a>
					</p>
				</div>
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="#">News</a></li>
					<li role="presentation"><a href="#">More</a></li>
				</ul>
				<table class="table">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th>
								Title
							</th>
							<th>
								Time
							</th>
							<th>
								Pin
							</th>
						</tr>
					</thead>
					<tbody id="t_body">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function() {
		getNews();
	});

	function getNews() {
		$.ajax({
			url: 'getNews.php',
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#t_body').append('<tr id="tr'+ i + '"><td>' + i + '</td><td>' + data[i]["title"] + '</td><td>' + data[i]["time"] + '</td><td>' + data[i]["pin"] + '</td></tr>');

					if ( i % 2 != 0 )
						$('#tr' + i ).addClass("success");
				} // for
			},
			error: function(data) {
				$('#t_body').append('<CENTER>No question</CENTER>');
			}
		});
	};
</script>
</html>