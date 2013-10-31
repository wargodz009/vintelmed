<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITE TITLE</title>
<link href="<?=base_url();?>assets/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script src="<?=base_url();?>assets/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script src="<?=base_url();?>assets/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
<script src="<?=base_url();?>assets/js/jquery.dataTables.js"></script>
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
<script src="<?=base_url();?>assets/js/vanadium.js"></script>
<link href="<?php echo base_url(); ?>assets/css/vanadium.css" rel="stylesheet">
<script src="<?=base_url();?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinyMCE.init({
		mode : "specific_textareas",
		editor_selector : "wysiwyg"
});
</script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('table.datatable').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": true
    });
	$('body').delegate('a.confirm','click',function(e){
		e.preventDefault();
		var ans = confirm($(this).attr('rel'));
		if(ans) {
			window.location = $(this).attr('href');
		}
	});
});
</script>
<style type="text/css">

body{
margin:0;
padding:0;
line-height: 1.5em;
font: 70% "Trebuchet MS", sans-serif;
}

#topsection{
background: #EAEAEA;
height: 90px; /*Height of top section*/
}

#topsection h1{
margin: 0;
padding-top: 15px;
}

#contentwrapper{
float: left;
width: 100%;
}

#contentcolumn{
margin-left: 200px; /*Set left margin to LeftColumnWidth*/
}

#leftcolumn{
float: left;
width: 200px; /*Width of left column*/
margin-left: -100%;
background: #C8FC98;
min-height:526px;
}

#footer{
clear: left;
width: 100%;
background: black;
color: #FFF;
text-align: center;
padding: 4px 0;
}

#footer a{
color: #FFFF80;
}

.innertube{
margin: 2px; /*Margins for inner DIV inside each column (to provide padding)*/
margin-top: 0;
}
</style>
<script>
$(function() {
	$( ".button" ).button();
});
</script>
</head>
<body>
<div id="maincontainer">
	<div id="topsection">
		<div class="innertube">
			<h1>SITE NAME - LOGO</h1>
		</div>
	</div>
	<div id="contentwrapper">
		<div id="contentcolumn">
			<div class="innertube">
				<div id="toolbar" class="ui-widget-header ui-corner-all">
					<button class='button'>A</button>
					<button class='button'>B</button>
					<button class='button'>C</button>
					<button class='button'>D</button>
				</div>
			</div>
			<div class="innertube">
			<?php
				if($this->session->flashdata('error') != ''){
					echo '<div class="ui-widget">
						<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
							<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
							'.$this->session->flashdata('error').'</p>
						</div>
					</div>';
				}
				if($this->session->flashdata('notice') != ''){
					echo '<div class="ui-widget">
						<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
							<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
							'.$this->session->flashdata('notice').'</p>
						</div>
					</div>';
				}
			?>
			<?= $contents ?>
			</div>
		</div>
	</div>
	<div id="leftcolumn">
		<div class="innertube">
			<a href="<?=base_url();?>items">items</a> <br/>
			<a href="<?=base_url();?>user">users</a> <br/>
			<a href="<?=base_url();?>batch">batch</a> <br/>
			<a href="<?=base_url();?>supplier">supplier</a> <br/>
			<a href="<?=base_url();?>district">district</a> <br/>
		</div>
	</div>
	<div id="footer"><a href="">Vintelmed System &copy; 2013</a></div>
</div>
</body>
</html>
