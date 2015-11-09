<?php
	session_start();
	if ( !isset( $_SESSION['username'] ) )
		echo "<script>alert('請登入'); location.href='./';</script>";
	else if ( !isset( $_GET['type'] ) )
		echo "<script>alert('No get value'); location.href='./manager.php';</script>";
	else
		$type = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="ch">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editor</title>
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
				<div class='col-md-2 col-md-offset-5' id='spin'></div>
				<?php
					if ( $type == 1 ) {
						echo "<div class='col-sm-6 col-sm-offset-3' id='all' style='display:none; background: rgba(255, 255, 255, 0.9);'>
							<h1>
								<CENTER>Post Editor</CENTER>
							</h1>
							<table class='table' id='all_table'>
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
								<tbody id='t_body'>
								</tbody>
							</table>
							<div class='btn-toolbar' role='toolbar'>
								<div class='btn-group' id='all_pageGroup' role='group'></div>
							</div>
						</div>";
					} // if
					else {
						echo "<div class='col-md-10 col-md-offset-1' id='class_div' style='display:none; background: rgba(255, 255, 255, 0.9);'>
							<h1>
								<CENTER>Class Editor</CENTER>
							</h1>
							<CENTER><button class='btn btn-default btn-lg' id='addGroup_btn' data-toggle='modal' data-target='#addGroup' data-type='1'>新增組別 <span class='glyphicon glyphicon-plus'></span></button>
								<button class='btn btn-default btn-lg' id='addCategory_btn' data-toggle='modal' data-target='#addCategory' data-type='1'>新增分類 <span class='glyphicon glyphicon-plus'></span></button>
								<button class='btn btn-default btn-lg' id='addClass_btn' data-toggle='modal' data-target='#addClass' data-type='1'>新增課程 <span class='glyphicon glyphicon-plus'></span></button></br></br>
							</CENTER>

							<ul class='nav nav-tabs nav-justified' role='tablist'>
								<li role='presentation'  class='active'>
									<a href='#class1' aria-controls='home' role='tab' data-toggle='tab'>學士後數位音樂應用學士學位學程</a>
								</li>
								<li>
									<a href='#class2' aria-controls='class' role='tab' data-toggle='tab'>數位音樂應用就業學程</a>
								</li>
							</ul>
							<div class='tab-content'>
								<div role='tabpanel' class='tab-pane fade in active' id='class1'>
								</div>
								<div role='tabpanel' class='tab-pane fade' id='class2'>
								</div>
							</div>


							<div class='modal fade' id='addGroup' tabindex='-1' role='dialog' aria-labelledby='add_title'>
							  <div class='modal-dialog' role='document'>
							    <div class='modal-content'>
							      <div class='modal-header'>
							        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							        <h4 class='modal-title' id='addGroup_title'>新增組別</h4>
							      </div>
							      <div class='modal-body'>
							      	<form class='form-horizontal' id='addGroup_form' method='POST'>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												Name:
											</label>
											<div class='col-sm-10'>
												<input type='hidden' class='form-control' name='type' value='1' required/>
												<input type='text' class='form-control' id='inputGName' name='inputName' required/>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												隸屬學程:
											</label>
											<div class='col-sm-10'>
												<select class='form-control type-sel' id='type1' name='inputType'>
													<option value='1'>學士後數位音樂應用學士學位學程</option>
													<option value='2'>數位音樂應用就業學程</option>
												</select>
											</div>
										</div>
										<div class='modal-footer' id='group_footer'>
									      <button type='button' id='group_close' class='btn btn-default' data-dismiss='modal'>Close</button>
									      <button type='submit' class='btn btn-primary'>Save changes</button>
									    </div>
							      	</form>
							      </div>
							    </div>
							  </div>
							</div>
							<div class='modal fade' id='addCategory' tabindex='-1' role='dialog' aria-labelledby='add_title'>
							  <div class='modal-dialog' role='document'>
							    <div class='modal-content'>
							      <div class='modal-header'>
							        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							        <h4 class='modal-title' id='addCategory_title'>新增分類</h4>
							      </div>
							      <div class='modal-body'>
							      	<form class='form-horizontal' id='addCategory_form' method='POST'>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												分類名稱:
											</label>
											<div class='col-sm-10'>
												<input type='hidden' class='form-control' name='type' value='2' required/>
												<input type='text' class='form-control' id='inputCaName' name='inputName' required/>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												隸屬學程:
											</label>
											<div class='col-sm-10'>
												<select class='form-control type-sel' id='type2' name='inputType'>
													<option value='1'>學士後數位音樂應用學士學位學程</option>
													<option value='2'>數位音樂應用就業學程</option>
												</select>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												隸屬組別:
											</label>
											<div class='col-sm-10'>
												<select class='form-control' id='addCategory_select' name='inputGroup'></select>
											</div>
										</div>
										<div class='modal-footer' id='category_footer'>
									      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
									      <button type='submit' class='btn btn-primary'>Save changes</button>
									    </div>
							      	</form>
							      </div>
							    </div>
							  </div>
							</div>
							<div class='modal fade' id='addClass' tabindex='-1' role='dialog' aria-labelledby='add_title'>
							  <div class='modal-dialog' role='document'>
							    <div class='modal-content'>
							      <div class='modal-header'>
							        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							        <h4 class='modal-title' id='addClass_title'>新增課程</h4>
							      </div>
							      <div class='modal-body'>
							      	<form class='form-horizontal' id='addClass_form' method='POST'>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												Name:
											</label>
											<div class='col-sm-10'>
												<input type='hidden' class='form-control' name='type' value='3' required/>
												<input type='text' class='form-control' id='inputClName' name='inputName' required/>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												Description:
											</label>
											<div class='col-sm-10'>
												<input type='text' class='form-control' name='inputDes' id='inputDes'/>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												URL:
											</label>
											<div class='col-sm-10'>
												<input type='text' class='form-control' name='inputURL' id='inputURL'/>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												隸屬學程:
											</label>
											<div class='col-sm-10'>
												<select class='form-control type-sel' id='type3' name='inputType'>
													<option value='1'>學士後數位音樂應用學士學位學程</option>
													<option value='2'>數位音樂應用就業學程</option>
												</select>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												隸屬組別:
											</label>
											<div class='col-sm-10'>
												<select class='form-control' id='addClass1_select' name='inputGroup'></select>
											</div>
										</div>
							      	  	<div class='form-group'>
											<label class='col-sm-2 control-label'>
												隸屬分類:
											</label>
											<div class='col-sm-10'>
												<select class='form-control' id='addClass2_select' name='inputCategory'></select>
											</div>
										</div>
										<div class='modal-footer' id='class_footer'>
									      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
									      <button type='submit' class='btn btn-primary'>Save changes</button>
									    </div>
							      	</form>
							      </div>
							    </div>
							  </div>
							</div></div>";
					} // else
				?>
				
			</div>
		</div>
	</div>
</body>
<script>
	var temp = <?php echo $type; ?>;
	var all_totalPage = 0;

	$(document).ready(function() {
		spin();
		if ( temp == 1 ) {
			getNews( 1 );
			getPage();
		} // if
		else {
			getGroup(1);
			getGroup(5);
		}
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
			complete: function() {
				$('#all').show("clip");
				$('#spin').remove();
			},
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#t_body').append('<tr id="tr'+ i + '"><td>' + i + '</td><td><a href="./editPost.php?id=' + data[i]["nid"] + '">' + data[i]["title"] + '</td><td>' + data[i]["time"] + '</td><td>' + data[i]["pin"] + '</td></tr>');
					

					if ( i % 2 != 0 )
						$('#tr' + i ).addClass("success");
				} // for
			},
			error: function(data) {
				$('#t_body').append('<CENTER>No result</CENTER>');
			}
		});
	};

	function getPage() {
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
		$('#t_body').empty();
		var page = parseInt( $(this).val() );
		getNews( page );
		//alert( page );
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

	function getGroup(index) {
		$.ajax({
			url: 'getClass.php',
			data: {type: index},
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				if ( index == 1 )
					$('#class1').append('<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true"></div>');
				else
					$('#class2').append('<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true"></div>');

				for ( var i = 0 ; i < data.length ; i++ ) {
					if ( index == 1 )
						$('#accordion1').append('<div class="panel panel-default" id="group'+ data[i]["gid"] +'"><div class="panel-heading" role="tab" id="heading'+ data[i]["gid"] +'"><h4 class="panel-title"><a role="button" style="color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapse'+ data[i]["gid"] +'" aria-expanded="true" aria-controls="collapse'+ data[i]["gid"] +'">'+ data[i]["gname"] +'</a> <button class="btn btn-default" data-toggle="modal" data-target="#addGroup" data-type="2" data-class="1" data-id="'+ data[i]["gid"] +'" data-name="'+ data[i]["gname"] +'">編輯組別 <span class="glyphicon glyphicon-pencil"></span></button></h4></div>');
					else
						$('#accordion2').append('<div class="panel panel-default" id="group'+ data[i]["gid"] +'"><div class="panel-heading" role="tab" id="heading'+ data[i]["gid"] +'"><h4 class="panel-title"><a role="button" style="color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapse'+ data[i]["gid"] +'" aria-expanded="true" aria-controls="collapse'+ data[i]["gid"] +'">'+ data[i]["gname"] +'</a> <button class="btn btn-default" data-toggle="modal" data-target="#addGroup" data-type="2" data-class="2" data-id="'+ data[i]["gid"] +'" data-name="'+ data[i]["gname"] +'">編輯組別 <span class="glyphicon glyphicon-pencil"></span></button></h4></div>');
					
					if ( i == 0 )
						$('#group'+ data[i]["gid"]).append('<div id="collapse'+ data[i]["gid"] +'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+ data[i]["gid"] +'"><div id="panel'+ data[i]["gid"] +'" class="panel-body"></div></div>');
					else
						$('#group'+ data[i]["gid"]).append('<div id="collapse'+ data[i]["gid"] +'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+ data[i]["gid"] +'"><div id="panel'+ data[i]["gid"] +'" class="panel-body"></div></div>');
					if ( index == 1 ) {
						$('#addCategory_select').append('<option value="'+ data[i]["gid"] +'">'+ data[i]["gname"] +'</option>');
						$('#addClass1_select').append('<option value="'+ data[i]["gid"] +'">'+ data[i]["gname"] +'</option>');	
					}
				} // for

				if ( index == 1 )
					getCategory(2);
				else
					getCategory(6);
			},
			error: function(data) {
				if ( index == 1 )
					$('class1').append('<CENTER>No result</CENTER>');
				else
					$('class2').append('<CENTER>No result</CENTER>');
			}
		});
	};

	function getCategory(index) {
		$.ajax({
			url: 'getClass.php',
			data: {type: index},
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					if ( index == 2 )
						$('#panel'+ data[i]["gid"]).append('<div class="col-md-4"><div class="panel panel-default" style="border: 5px solid #d35400"><div class="panel-heading" style="border-radius: 0px; color:white;"><h3><CENTER><strong>'+ data[i]["caname"] +'</strong> <button class="btn btn-default" data-toggle="modal" data-target="#addCategory" data-type="2" data-class="1" data-id="'+ data[i]["caid"] +'" data-gid="'+ data[i]["gid"] +'" data-caname="'+ data[i]["caname"] +'" >編輯分類 <span class="glyphicon glyphicon-pencil"></span></button> </CENTER></h3></div><div><div class="panel-body" id="g'+ data[i]["gid"] +'-ca'+ data[i]["caid"] +'"></div></div></div></div>');
					else
						$('#panel'+ data[i]["gid"]).append('<div class="col-md-4"><div class="panel panel-default" style="border: 5px solid #d35400"><div class="panel-heading" style="border-radius: 0px; color:white;"><h3><CENTER><strong>'+ data[i]["caname"] +'</strong> <button class="btn btn-default" data-toggle="modal" data-target="#addCategory" data-type="2" data-class="2" data-id="'+ data[i]["caid"] +'" data-gid="'+ data[i]["gid"] +'" data-caname="'+ data[i]["caname"] +'" >編輯分類 <span class="glyphicon glyphicon-pencil"></span></button> </CENTER></h3></div><div><div class="panel-body" id="g'+ data[i]["gid"] +'-ca'+ data[i]["caid"] +'"></div></div></div></div>');

					if ( $('#addClass1_select').val() == data[i]["gid"] )
						$('#addClass2_select').append('<option value="'+ data[i]["caid"] +'">'+ data[i]["caname"] +'</option>');
				} // for
				$('#addClass2_select:empty').append('<option value="0">No result</option>');
				if ( index == 2 )
					getClass(3);
				else
					getClass(7);
			},
			error: function(data) {
				if ( index == 2 )
					$('class1').append('<CENTER>No result</CENTER>');
				else
					$('class2').append('<CENTER>No result</CENTER>');
			}
		});
	};

	function getClass(index) {
		$.ajax({
			url: 'getClass.php',
			data: {type: index},
			type: 'GET',
			dataType: 'json',
			complete: function() {
				$('#spin').remove();
				$('#class_div').show("clip");
			},
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					if ( index == 3 )
						$('#g'+ data[i]["gid"] +'-ca'+ data[i]["caid"]).append(data[i]["clname"] +' <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#addClass" data-type="2" data-class="1" data-id="'+ data[i]["cid"] +'" data-gid="'+ data[i]["gid"] +'" data-caid="'+ data[i]["caid"] +'" data-clname="'+ data[i]["clname"] +'" data-des="'+ data[i]["description"] +'" data-url="'+ data[i]["url"] +'" >編輯課程 <span class="glyphicon glyphicon-pencil"></span></button></br>');
					else
						$('#g'+ data[i]["gid"] +'-ca'+ data[i]["caid"]).append(data[i]["clname"] +' <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#addClass" data-type="2" data-class="2" data-id="'+ data[i]["cid"] +'" data-gid="'+ data[i]["gid"] +'" data-caid="'+ data[i]["caid"] +'" data-clname="'+ data[i]["clname"] +'" data-des="'+ data[i]["description"] +'" data-url="'+ data[i]["url"] +'" >編輯課程 <span class="glyphicon glyphicon-pencil"></span></button></br>');
				} // for
			},
			error: function(data) {
				if ( index == 3 )
					$('class1').append('<CENTER>No result</CENTER>');
				else
					$('class2').append('<CENTER>No result</CENTER>');
			}
		});
	};

	$('#addClass1_select').change(function() {
		getindexCategory( $(this).val(), 0 );
	});

	$('.type-sel').change(function() {
		getindexGroup( $(this).val(), 0, 0 );
	});

	function getindexCategory( input, val ) {
		$.ajax({
			url: 'getClass.php',
			data: {type: 4, index: input},
			type: 'GET',
			dataType: 'json',
			beforeSend: function() {
				$('#addClass2_select').empty();
			},
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#addClass2_select').append('<option value="'+ data[i]["caid"] +'">'+ data[i]["caname"] +'</option>');
				} // for

				if ( val != 0 )
					$('#addClass2_select').val( val );
			},
			error: function(data) {
				$('#addClass2_select').append('<option value="0">No result</option>');
			}
		});
	};

	function getindexGroup( input, val1, val2 ) {
		$.ajax({
			url: 'getClass.php',
			data: {type: 8, index: input},
			type: 'GET',
			dataType: 'json',
			beforeSend: function() {
				$('#addCategory_select').empty();
				$('#addClass1_select').empty();
				$('#addClass2_select').empty();
			},
			success: function(data) {
				for ( var i = 0 ; i < data.length ; i++ ) {
					$('#addCategory_select').append('<option value="'+ data[i]["gid"] +'">'+ data[i]["gname"] +'</option>');
					$('#addClass1_select').append('<option value="'+ data[i]["gid"] +'">'+ data[i]["gname"] +'</option>');
				} // for
				if ( val1 != 0 ) {
					$('#addCategory_select').val( val1 );
					$('#addClass1_select').val( val1 );
				}

				getindexCategory( $('#addClass1_select').val(), val2 );
			},
			error: function(data) {
				$('#addCategory_select').append('<option value="0">No result</option>');
				$('#addClass1_select').append('<option value="0">No result</option>');
			}
		});
	};

	$('#addGroup').on('show.bs.modal', function(e) {
		var button = $(e.relatedTarget);
		var type = button.data('type');
		$('#deleteGroup').remove();
		$('#groupInputID').remove();
		if ( type == 2 ) {
			$('#addGroup_title').html('編輯組別');
			$('#addGroup_form').append('<input type="hidden" id="groupInputID" name="inputID" value="'+ button.data('id') +'" required/>');
			$('#group_footer').append('<a class="btn btn-danger" id="deleteGroup" href="./deleteClass.php?type=1&id='+ button.data('id') +'">Delete</a>');
			$('#inputGName').val( button.data('name') ) ;
			$('#type1').val( button.data('class') ) ;
			$('#addGroup_form').attr('action', 'updateClass.php');
		} // if
		else {
			$('#addGroup_title').html('新增組別');
			$('#inputGName').val('');
			$('#type1').val( 1 ) ;
			$('#addGroup_form').attr('action', 'insertClass.php');
		}
	});

	$('#addCategory').on('show.bs.modal', function(e) {
		var button = $(e.relatedTarget);
		var type = button.data('type');
		$('#deleteCategory').remove();
		$('#categoryInputID').remove();
		if ( type == 2 ) {
			$('#addCategory_title').html('編輯分類');
			$('#addCategory_form').append('<input type="hidden" id="categoryInputID" name="inputID" value="'+ button.data('id') +'" required/>');
			$('#category_footer').append('<a class="btn btn-danger" id="deleteCategory" href="./deleteClass.php?type=2&id='+ button.data('id') +'">Delete</a>');
			$('#inputCaName').val( button.data('caname') ) ;
			$('#type2').val( button.data('class') ) ;
			$('#addCategory_select').val( button.data('gid') );
			$('#addCategory_form').attr('action', 'updateClass.php');
		} // if
		else {
			$('#addCategory_title').html('新增分類');
			$('#inputCaName').val('');
			$('#type2').val( 1 ) ;
			$('#addCategory_select').val( 1 );
			$('#addCategory_form').attr('action', 'insertClass.php');
		}
	});

	$('#addClass').on('show.bs.modal', function(e) {
		var button = $(e.relatedTarget);
		var type = button.data('type');
		$('#deleteClass').remove();
		$('#classInputID').remove();
		if ( type == 2 ) {
			$('#addClass_title').html('編輯課程');
			$('#addClass_form').append('<input type="hidden" id="classInputID" name="inputID" value="'+ button.data('id') +'" required/>');
			$('#class_footer').append('<a class="btn btn-danger" id="deleteClass" href="./deleteClass.php?type=3&id='+ button.data('id') +'">Delete</a>');
			$('#inputClName').val( button.data('clname') ) ;
			$('#inputDes').val( button.data('des') ) ;
			$('#inputURL').val( button.data('url') ) ;
			$('#type3').val( button.data('class') ) ;
			getindexGroup( button.data('class'), button.data('gid'), button.data('caid') );
			$('#addClass1_select').val( button.data('gid') );
			// $('#addClass2_select').empty();
			// getindexCategory( button.data('caid') );
			$('#addClass2_select').val( button.data('caid') );
			$('#addClass_form').attr('action', 'updateClass.php');
		} // if
		else {
			$('#addClass_title').html('新增課程');
			$('#inputClName').val('');
			$('#inputDes').val('');
			$('#inputURL').val('');
			$('#type3').val( 1 ) ;
			/*
			$('#addClass1_select').val( $('#addClass1_select').first().val() );
			$('#addClass2_select').empty();
			getindexCategory( $('#addClass1_select').val() );
			*/
			$('#addClass_form').attr('action', 'insertClass.php');
		}
	});
</script>
</html>