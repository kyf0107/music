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
	<title>Shows Editor</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="./dist/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="./dist/css/navbar.css" rel="stylesheet">
  	
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/spin.js/1.2.7/spin.min.js"></script>
  	<script type="text/javascript" src="./dist/js/bootstrap.min.js"></script>
  	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script type="text/javascript" src="./dist/js/moment.js"></script>
    <script type="text/javascript" src="./dist/js/collapse.js"></script>
    <script type="text/javascript" src="./dist/js/transition.js"></script>
    <script type="text/javascript" src="./dist/js/bootstrap-datetimepicker.min.js"></script>
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
				<div class="col-md-8 col-md-offset-2" style="background: rgba(255, 255, 255, 0.9);">
					<CENTER><h1>Shows Table Editor</h1>
						<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal" data-type="1">
							新增節目<span class="glyphicon glyphicon-plus"></span>
						</button>
					</CENTER></br></br>
					<div class="col-md-2 col-md-offset-5" id="spin"></div>
					<div class="row" id="show_div" style="display:none">
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
										Edit
									</th>
								</tr>
							</thead>
							<tbody id="t_body">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		    <div class="modal-dialog" role="document">
			    <div class="modal-content">
			        <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">新增節目</h4>
			        </div>
			        <div class="modal-body">
			        	<form class="form-horizontal" id="form" action="./insertShow.php" method="POST">
							<div class="form-group">
								 
								<label class="col-sm-2 control-label">
									Title:
								</label>
								<div class="input-group col-sm-9">
									<input type="text" class="form-control" name="inputTitle" id="inputTitle" required/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Time:
								</label>
				                <div class='input-group col-sm-9 date' id='datetimepicker1'>
				                    <input type='text' class="form-control" name="inputTime" id="inputTime" />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
							<div class="modal-footer" id="class_footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Save changes</button>
						    </div>
						</form>
			        </div>
			    </div>
		    </div>
		</div>
	</div>
</body>
<script>
	$('#datetimepicker1').datetimepicker({
		format: 'YYYY-MM-DD HH:mm'
	});

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
	    var target = document.getElementById('spin');
	    var spinner = new Spinner(opts).spin(target);
	};

	function getShow() {
		$.ajax({
			url: 'getShow.php',
			type: 'POST',
			dataType: 'json',
			complete: function() {
				$('#spin').remove();
				$('#show_div').show("clip");
			},
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#t_body').append('<tr id="tr'+ i + '"><td>' + i + '</td><td>' + data[i]["title"] + '</td><td>' + data[i]["time"] + '</td><td><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal" data-type="2" data-id="'+ data[i]["id"] +'" data-title="'+ data[i]["title"] +'" data-time="'+ data[i]["time"] +'"><span class="glyphicon glyphicon glyphicon-pencil"></span></button></td></tr>');
				} // for
			},
			error: function(data) {
				$('#show_div').append('<CENTER>No result</CENTER>');
			}
		});
	};

	
	$('#myModal').on('show.bs.modal', function(e) {
		var button = $(e.relatedTarget);
		var type = button.data('type');
		if ( type == 2 ) {
			$('#myModalLabel').html('編輯節目');
			$('#form').append('<input type="hidden" class="form-control" name="inputID" id="inputID" value="'+ button.data('id') +'" requered/>');
			$('#inputTitle').val( button.data('title') );
			$('#inputTime').val( button.data('time') );
			$('#form').attr('action', 'updateShow.php');
		} // if
		else {
			$('#myModalLabel').html('新增節目');
			$('#inputID').remove();
			$('#inputTitle').val('');
			$('#inputTime').val('');
			$('#form').attr('action', 'insertShow.php');
		}
	});
</script>
</html>