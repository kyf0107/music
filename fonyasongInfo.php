<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INFO</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">  
	<link href="./dist/css/navbar.css" rel="stylesheet">
  	
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/spin.js/1.2.7/spin.min.js"></script>
  	<script type="text/javascript" src="./dist/js/bootstrap.min.js"></script>
  	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  	<style>
		.panel-default {
		  border-color: #d35400;
		}
		.panel-default > .panel-heading {
		  color: #333;
		  background-color: #e67e22;
		  border-color: #d35400;
		}
		.panel-default > .panel-heading + .panel-collapse > .panel-body {
		  border-top-color: #ddd;
		}
		.panel-default > .panel-heading .badge {
		  color: #f5f5f5;
		  background-color: #333;
		}
		.panel-default > .panel-footer + .panel-collapse > .panel-body {
		  border-bottom-color: #ddd;
		}
  	</style>
</head>
<body style="padding-top: 70px">
	<div class="container-fluid" id="all_div">
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
							<li class="active">
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
				<div class="col-md-10 col-md-offset-1" style="background: rgba(255, 255, 255, 0.8);">
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation"  class="active">
							<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Introduce</a>
						</li>
						<li>
							<a href="#show" aria-controls="show" role="tab" data-toggle="tab">Shows</a>
						</li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home">
							<div style="background-color:#e67e22; color:white;">
								<h1>
									<CENTER></br><strong>風雅頌簡介</strong></br></br></CENTER>
								</h1>
							</div>
							<p class="lead">
								&nbsp;&nbsp;&nbsp;&nbsp;中原大學學士後數位音樂應用學士學位學程 (Postgraduate BS Degree Program in Applied Digital Music) (以下簡稱本學程) 於103學年度通過教育部「大學校院辦理學士後第二專長學士學位學程審核作業要點」審核成立，分為數位音樂編曲創作組 (103學年度起招生)及音樂廣播企劃製作組 (預計105學年度開始招生)。</br>

									&nbsp;&nbsp;&nbsp;&nbsp;-全台灣第一個以流行音樂學系概念來規劃課程，首屆招收20名對數位音樂製作、流行音樂創作、跨界展演有興趣的學員，入學後將用1-2年的時間，隨資深唱片製作人及專業音樂人學習，修滿48學分後將可獲頒學士學位證書。</br>
									&nbsp;&nbsp;&nbsp;&nbsp;-課程使用學校的專業錄音室、攝影棚、數位音樂教室等，紮實的在正規課程中，學習流行音樂創作演奏和唱片製作過程，畢業時每人將寫出自己人生的主打歌，並由業界老師帶領實作和實習課程，完整製作出一張唱片。</br>
									&nbsp;&nbsp;&nbsp;&nbsp;-團隊合作的課程設計，讓學員們可以熟悉流行音樂職場的運作模式，同時培訓中也將融入中原大學注重的人文素養和敬業態度的堅持。</br>

								<strong>(一) 設置宗旨</strong></br>
								&nbsp;&nbsp;&nbsp;&nbsp;本學程設置宗旨為深耕數位音樂教育，促進流行音樂產業及相關廣播傳媒之發展，落實學界與業界之產學媒合，特結合本校及業界專業師資共同規劃課程，並包含專題製作及產學實習，以達到專業能力傳承、團隊合作能力培養、及職場倫理敬業態度之建立。</br>

								<strong>(二) 學位授予</strong></br>
								&nbsp;&nbsp;&nbsp;&nbsp;本學程依教育部「大學校院辦理學士後第二專長學士學位學程審核作業要點」，學生結業後修業期滿，經考核成績及格，可授予「學士後數位音樂應用學程」學士學位。</br>

								<strong>(三) 專業設備</strong></br>
								&nbsp;&nbsp;&nbsp;&nbsp;課程使用本校數位音樂專用教室、文化創意數位錄音室、專業數位編曲後製工作站、專業攝影棚、非同步遠距教室、廣播實習站...等教學及製作空間，搭配符合業界規格之專業軟硬體，具備與業界接軌之專業能力培訓條件。</br>

								<strong>(四) 就業方向</strong></br>
								&nbsp;&nbsp;&nbsp;&nbsp;(1) 唱片製作：音樂製作人、製作助理、唱片企劃、唱片宣傳、文案企畫...等。</br>
								&nbsp;&nbsp;&nbsp;&nbsp;(2) 廣播傳媒：廣播節目製作人、廣播節目企畫、廣播製作剪輯、廣播節目主持、廣播廣告製作、廣 播配樂、音效製作...等。</br>
								&nbsp;&nbsp;&nbsp;&nbsp;(3) 編曲後製：廣告音樂編曲、電影配樂製作、流行音樂編曲、有聲書配樂、手機鈴聲編曲、電玩音樂編曲、兒童音樂編曲...等。</br>
								&nbsp;&nbsp;&nbsp;&nbsp;(4) 錄音工程：專業錄音師、廣播電台錄音剪輯、音樂舞台現場音控...等。</br>
								&nbsp;&nbsp;&nbsp;&nbsp;(5) 音樂表演：錄音室樂手、樂團(古典、現代、跨界、流行)、歌手(流行歌手、錄音室Demo歌手)等。</br>

							</p>
							<div style="background-color:#e67e22; color:white;">
								<h1>
									<CENTER></br><strong>聯絡方式</strong></br></br></CENTER>
								</h1>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="show">
							<div style="background-color:#e67e22; color:white;">
								<h1>
									<CENTER></br><strong>節目表</strong></br></br></CENTER>
								</h1>
							</div>
							<div class="col-md-2 col-md-offset-5" id="show_spin"></div>
							<div id="show_div" style="display:none">
								<table class="table">
									<thead>
										<tr>
											<th style="width: 10%">
												#
											</th>
											<th style="width: 45%">
												Title
											</th>
											<th style="width: 45%">
												Time
											</th>
										</tr>
									</thead>
									<tbody id="showT_body">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title" id="myModalLabel"></h4>
		        </div>
		        <div class="modal-body" id="myModalBody">
		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		    </div>
		  </div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function() {
		spin();
		getShow();
	});

	function spin() {
		var opts = {
            lines: 10, // The number of lines to draw
            length: 5, // The length of each line
            width: 10, // The line thickness
            radius: 50, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            rotate: 0, // The rotation offset
            color: '#d35400', // #rgb or #rrggbb
            speed: 1, // Rounds per second
            trail: 60, // Afterglow percentage
            shadow: false, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            className: 'spinner', // The CSS class to assign to the spinner
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            top: 25, // Top position relative to parent in px
            left: 25 // Left position relative to parent in px
        };
	    var target = document.getElementById('show_spin');
	    var spinner = new Spinner(opts).spin(target);
	};

	function getShow() {
		$.ajax({
			url: 'getShow.php',
			type: 'POST',
			dataType: 'json',
			complete: function() {
				$('#show_spin').remove();
				$('#show_div').show("clip");
			},
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#showT_body').append('<tr id="tr'+ i + '"><td>' + i + '</td><td>' + data[i]["title"] + '</td><td>' + data[i]["time"] + '</td></tr>');
				} // for
			},
			error: function(data) {
				$('#show').append('<CENTER>No result</CENTER>');
			}
		});
	};
</script>
</html>