<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All News</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="./dist/css/navbar.css" rel="stylesheet">
  	
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/spin.js/1.2.7/spin.min.js"></script>
  	<script type="text/javascript" src="./dist/js/bootstrap.min.js"></script>
  	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
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
							</li>
						</ul>
					</div>
				</nav>
				<div class="col-md-2 col-md-offset-5" id="spin"></div>
				<div class="col-md-8 col-md-offset-2" id="news_div" style="display:none;background: rgba(255, 255, 255, 0.9);"></br>
					<ul class="nav nav-tabs">
						<li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">綜合公告</a></li>
						<li role="presentation"><a href="#class" aria-controls="class" role="tab" data-toggle="tab">課程公告</a></li>
						<li role="presentation"><a href="#activity" aria-controls="activity" role="tab" data-toggle="tab">活動公告</a></li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="all">
							<table class="table" id="all_table">
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
								<tbody id="allT_body">
								</tbody>
							</table>
							<div class="btn-toolbar" role="toolbar">
								<div class="btn-group" id="all_pageGroup" role="group"></div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade in" id="class">
							<table class="table" id="class_table">
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
								<tbody id="classT_body">
								</tbody>
							</table>
							<div class="btn-toolbar" role="toolbar">
								<div class="btn-group" id="class_pageGroup" role="group"></div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade in" id="activity">
							<table class="table" id="act_table">
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
								<tbody id="activityT_body">
								</tbody>
							</table>
							<div class="btn-toolbar" role="toolbar">
								<div class="btn-group" id="act_pageGroup" role="group"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	var all_totalPage = 0;
	var class_totalPage = 0;
	var act_totalPage = 0;

	$(document).ready(function() {
		spin();
		getNews( 1 );
		getPage();
		getClassNews( 1 );
		getClPage();
		getActNews( 1 );
		getActPage();
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
	    var target = document.getElementById('spin');
	    var spinner = new Spinner(opts).spin(target);
	};

	function getNews(index) {
		$.ajax({
			url: 'getNews.php',
			data: {type: 3, page: index},
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#allT_body').append('<tr id="tr'+ i + '"><td>' + data[i]["nid"] + '</td><td><a href="./news.php?id=' + data[i]["nid"] + '">' + data[i]["title"] + '</td><td>' + data[i]["time"] + '</td></tr>');
					

					if ( i % 2 != 0 )
						$('#tr' + i ).addClass("success");
				} // for
			},
			error: function(data) {
				$('#allT_body').append('<CENTER>No result</CENTER>');
			}
		});
	};

	function getClassNews(index) {
		$.ajax({
			url: 'getNews.php',
			data: {type: 4, page: index},
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#classT_body').append('<tr id="classTr'+ i + '"><td>' + data[i]["nid"] + '</td><td><a href="./news.php?id=' + data[i]["nid"] + '">' + data[i]["title"] + '</td><td>' + data[i]["time"] + '</td></tr>');
					
					if ( i % 2 != 0 )
						$('#classTr' + i ).addClass("success");
				} // for
			},
			error: function(data) {
				$('#classT_body').append('<CENTER>No result</CENTER>');
			}
		});
	};

	function getActNews(index) {
		$.ajax({
			url: 'getNews.php',
			data: {type: 5, page: index},
			type: 'GET',
			dataType: 'json',
			complete: function() {
				$('#spin').remove();
				$('#news_div').show("clip");
			},
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#activityT_body').append('<tr id="activityTr'+ i + '"><td>' + data[i]["nid"] + '</td><td><a href="./news.php?id=' + data[i]["nid"] + '">' + data[i]["title"] + '</td><td>' + data[i]["time"] + '</td></tr>');
					
					if ( i % 2 != 0 )
						$('#activityTr' + i ).addClass("success");
				} // for
			},
			error: function(data) {
				$('#activityT_body').append('<CENTER>No result</CENTER>');
			}
		});
	};

	function getPage() {	// Page of all news
		$.ajax({
			url: 'getPage.php',
			data: {type: 0},
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				all_totalPage = parseInt( data[0]["total"] );
				for ( var i = 1 ; i <= data[0]["total"] && i <= 5 ; i++ ) {
					if ( i == 1 )
						$('#all_pageGroup').append('<button class="btn btn-default all-pagebtn" value="' + i +'" disabled="disabled">'+ i +'</button>');
					else
						$('#all_pageGroup').append('<button class="btn btn-default all-pagebtn" value="' + i +'">'+ i +'</button>');
				} // for
			},
			error: function(data) {
				$('#all').append('<CENTER>No result</CENTER>');
			}
		});
	};

	$(document).delegate('.all-pagebtn', 'click', function() {
		$('#all_table').hide("drop");
		$('#allT_body').empty();
		var page = parseInt( $(this).val() );
		getNews( page );
		$('#all_pageGroup').empty();
		var start = 1;
		if ( page > 2 )
			start = page - 2 ;
		var end = start + 4 ;
		if ( end > all_totalPage ) {
			start = start - ( end - all_totalPage );
			end = all_totalPage;
		}
		for ( var i = start ; i <= end ; i++ ) {
			$('#all_table').show('drop');
			if ( i == page )
				$('#all_pageGroup').append('<button class="btn btn-default all-pagebtn" value="' + i +'" disabled="disabled">'+ i +'</button>');
			else
				$('#all_pageGroup').append('<button class="btn btn-default all-pagebtn" value="' + i +'">'+ i +'</button>');
		} // for
	});

	function getClPage() {	// Page of class news
		$.ajax({
			url: 'getPage.php',
			data: {type: 1},
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				class_totalPage = parseInt( data[0]["total"] );
				for ( var i = 1 ; i <= data[0]["total"] && i <= 5 ; i++ ) {
					if ( i == 1 )
						$('#class_pageGroup').append('<button class="btn btn-default class-pagebtn" value="' + i +'" disabled="disabled">'+ i +'</button>');
					else
						$('#class_pageGroup').append('<button class="btn btn-default class-pagebtn" value="' + i +'">'+ i +'</button>');
				} // for
			},
			error: function(data) {
				$('#class').append('<CENTER>No result</CENTER>');
			}
		});
	};

	$(document).delegate('.class-pagebtn', 'click', function() {
		$('#class_table').hide("drop");
		$('#classT_body').empty();
		var page = parseInt( $(this).val() );
		getClassNews( page );
		// alert( page );
		$('#class_pageGroup').empty();
		var start = 1;
		if ( page > 2 )
			start = page - 2 ;
		var end = start + 4 ;
		if ( end > class_totalPage ) {
			start = start - ( end - class_totalPage );
			end = class_totalPage;
		}
		for ( var i = start ; i <= end ; i++ ) {
			$('#class_table').show('drop');
			if ( i == page )
				$('#class_pageGroup').append('<button class="btn btn-default class-pagebtn" value="' + i +'" disabled="disabled">'+ i +'</button>');
			else
				$('#class_pageGroup').append('<button class="btn btn-default class-pagebtn" value="' + i +'">'+ i +'</button>');
		} // for
	});

	function getActPage() {	// Page of activity news
		$.ajax({
			url: 'getPage.php',
			data: {type: 2},
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				act_totalPage = parseInt( data[0]["total"] );
				for ( var i = 1 ; i <= data[0]["total"] && i <= 5 ; i++ ) {
					if ( i == 1 )
						$('#act_pageGroup').append('<button class="btn btn-default act-pagebtn" value="' + i +'" disabled="disabled">'+ i +'</button>');
					else
						$('#act_pageGroup').append('<button class="btn btn-default act-pagebtn" value="' + i +'">'+ i +'</button>');
				} // for
			},
			error: function(data) {
				$('#activity').append('<CENTER>No result</CENTER>');
			}
		});
	};

	$(document).delegate('.act-pagebtn', 'click', function() {
		$('#act_table').hide("drop");
		$('#activityT_body').empty();
		var page = parseInt( $(this).val() );
		getActNews( page );
		// alert( page );
		$('#act_pageGroup').empty();
		var start = 1;
		if ( page > 2 )
			start = page - 2 ;
		var end = start + 4 ;
		if ( end > act_totalPage ) {
			start = start - ( end - act_totalPage );
			end = act_totalPage;
		}
		for ( var i = start ; i <= end ; i++ ) {
			$('#act_table').show('drop');
			if ( i == page )
				$('#act_pageGroup').append('<button class="btn btn-default act-pagebtn" value="' + i +'" disabled="disabled">'+ i +'</button>');
			else
				$('#act_pageGroup').append('<button class="btn btn-default act-pagebtn" value="' + i +'">'+ i +'</button>');
		} // for
	});
</script>
</html>