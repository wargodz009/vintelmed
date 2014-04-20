<?php
$dashboard = array('dashboard');
$dashboard_toolbar = array();
$inventory = array('inventory','items','supplier','batch');
$inventory_toolbar = array(
						'ITEMS'=>'items',
						'SUPPLIER'=>'supplier',
						'INVENTORY ITEMS'=>'batch'
					);
$clients = array('clients','orders');
$clients_toolbar =	array(
						'Orders'=>'orders'
					);
$orders = array('Orders','orders');
$orders_toolbar =	array();
$employees = array(
				'd'=>'items/add',
				'a'=>'items/add',
				's'=>'items/add',
				'h'=>'items/add',
				'b'=>'items/add',
				'o'=>'items/add',
				'a2'=>'items/add',
				'r'=>'items/add',
				'dd'=>'items/add'
			);
$employees_toolbar = array(
						'd'=>'items/add',
						'a'=>'items/add',
						's'=>'items/add',
						'h'=>'items/add',
						'b'=>'items/add',
						'o'=>'items/add',
						'a2'=>'items/add',
						'r'=>'items/add',
						'dd'=>'items/add'
					);
$reports = array('reports');
$reports_toolbar =	array(
						'View Reports'=>'reports/list_all',
					);
$settings = array('setting');
$settings_toolbar = array(
						'Logs'=>'log'
					);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vintel Med Enterprises</title>
<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
<!-- jscroll -->
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/prettify.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.slimscroll.js"></script>
<link href="<?=base_url();?>assets/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script src="<?=base_url();?>assets/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script src="<?=base_url();?>assets/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
<script src="<?=base_url();?>assets/js/jquery.dataTables.js"></script>
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
<script src="<?=base_url();?>assets/js/vanadium.js"></script>
<link href="<?php echo base_url(); ?>assets/css/vanadium.css" rel="stylesheet">
<script src="<?=base_url();?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery_ui_addon_timepicker.js"></script>
<link href="<?=base_url();?>assets/css/jquery_ui_addon_timepicker.css" rel="stylesheet">

<script type="text/javascript" src="<?=base_url();?>assets/js/prettify.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.slimscroll.js"></script>
<script src="<?=base_url();?>assets/js/jquery.custom-scrollbar.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/jquery.custom-scrollbar.css"/>
<script type="text/javascript">
tinyMCE.init({
		mode : "specific_textareas",
		editor_selector : "wysiwyg"
});
</script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$( ".button" ).button();
	$('table.datatable').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": true,
		"bJQueryUI": "redmond"
    });
	$('body').delegate('a.confirm','click',function(e){
		e.preventDefault();
		var ans = confirm($(this).attr('rel'));
		if(ans) {
			window.location = $(this).attr('href');
		}
	});
	$('input#search_button').click(function(){
		$(this).parent('form').submit();
	});
});
</script>
</head>
<body>
<div class="wrapper">
	<div id="vmehldr">
	<!-- TOP -->
	<div id="top">
		<div class="tp1">
			<div class="logo"><a href="" title="Vintel Med Enterprises">Vintel Med Enterprises</a></div>
			<div class="timedate">
				<?php if($this->users->is_logged_in()) { ?>
				<a class="confirm" rel="Are you sure you want to logout?" href="<?=base_url();?>user/logout">Logout</a> <br/>
				<?php } else {?>
				<a class="" href="<?=base_url();?>user/login">Login</a> <br/>
				<?php } ?>
			</div>
			<div class="prflnk">
			<?php if($this->users->is_logged_in()) { $this->load->model('user/user_model'); ?>
			<b>Welcome:</b> <a href="#"><?php echo '<a href="'.base_url().'user/profile">'.$this->user_model->get_single($this->session->userdata('user_id'),false,'username').'</a>';?></a>
			<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="tp2">
			<div class="lbl">Search</div>
			<!-- srchbx -->
			<div class="srchbx">
				<form action="<?=base_url();?>search/" method="post">
				<input name="search" type="text" />
				<input type="button" id="search_button" />
				</form>
				<div class="clear"></div>
			</div>
			<!-- / srchbx -->
			<div class="dropmenu"></div>
			<div class="clear"></div>
		</div>
	</div><!-- / TOP -->
<!-- MID -->
	<div id="mid">
		<!-- sidebar -->
		<div id="sidebar">
			<?php if($this->system->is_open()) { ?>
			<ul>
				<?php if($this->users->is_logged_in()) { ?>
				<li class="<?php echo (in_array($this->uri->segment(1),$dashboard)?'active':''); ?>">
					<div class="lgt"></div>
					<a href="<?=base_url()?>dashboard">
					<div class="icn bg1"></div>
					Dashboard
					</a>
				</li>
				<?php } ?>
				<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>
				<li class="<?php echo (in_array($this->uri->segment(1),$inventory)?'active':''); ?>">
					<div class="lgt"></div>
					<a href="<?=base_url()?>inventory">
					<div class="icn bg2"></div>
					Inventory
					</a>
				</li>
				<?php } ?>
				<?php if($this->users->is_admin() || $this->users->is_msr() || $this->users->is_hrd()) { ?>
				<li class="<?php echo (in_array($this->uri->segment(1),$clients)?'active':''); ?>">
					<div class="lgt"></div>
					<a href="<?=base_url()?>clients">
					<div class="icn bg3"></div>
					Clients
					</a>
				</li>
				<?php } ?>
				<?php if($this->users->is_admin() || $this->users->is_accountant() || $this->users->is_hrd()) { ?>
				<li class="<?php echo (in_array($this->uri->segment(1),$employees)?'active':''); ?>">
					<div class="lgt"></div>
					<a href="<?=base_url()?>user">
					<div class="icn bg4"></div>
					Employees
					</a>
				</li>
				<?php } ?>
				<?php if($this->users->is_logged_in()) { ?>
					<?php if($this->users->is_admin() || $this->users->is_accountant() || $this->users->is_warehouseman()) { ?>
					<li class="<?php echo (in_array($this->uri->segment(1),$reports)?'active':''); ?>">
						<div class="lgt"></div>
						<a href="<?=base_url()?>reports">
						<div class="icn bg5"></div>
						Reports
						</a>
					</li>
					<?php } ?>
				<?php } ?>
				<?php if($this->users->is_logged_in()) { ?>
					<?php if($this->users->is_admin() || $this->users->is_hrd()) { ?>
					<li class="<?php echo (in_array($this->uri->segment(1),$settings)?'active':''); ?>">
						<div class="lgt"></div>
						<a href="<?=base_url()?>setting">
						<div class="icn bg6"></div>
						Settings
						</a>
					</li>
					<?php } ?>
				<?php } ?>
				<?php if($this->users->is_logged_in()) { ?>
					<?php if($this->users->is_accountant()) { ?>
					<li class="<?php echo (in_array($this->uri->segment(1),$orders)?'active':''); ?>">
						<div class="lgt"></div>
						<a href="<?=base_url()?>orders">
						<div class="icn bg7"></div>
						orders
						</a>
					</li>
					<?php } ?>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<!-- / sidebar -->
		<!-- content -->
		<div id="cntnt">
			<?php if($this->system->is_open()) { ?>
			<?php
				if(!$this->users->is_hrd()){
					if(in_array($this->uri->segment(1),$dashboard)) {
						echo generate_menu($dashboard_toolbar);
					} else if(in_array($this->uri->segment(1),$inventory)) {
						echo generate_menu($inventory_toolbar);
					} else if(in_array($this->uri->segment(1),$clients)) {
						echo generate_menu($clients_toolbar);
					} else if(in_array($this->uri->segment(1),$orders)) {
						echo generate_menu($orders_toolbar);
					} else if(in_array($this->uri->segment(1),$employees)) {
						echo generate_menu($employees_toolbar);
					} else if(in_array($this->uri->segment(1),$reports)) {
						echo generate_menu($reports_toolbar);
					} else if(in_array($this->uri->segment(1),$settings)) {
						echo generate_menu($settings_toolbar);
					} else {
						
					}
				}
			?>
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
			<?= '<div id="content_start">'.$contents.'</div>'; ?>
			<?php } else {
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

				$this->session->sess_destroy();
				
				echo '<div id="content_start">'.$contents.'</div>';
			} ?>
		</div><!-- / content -->
		<div class="clear"></div>
	</div><!-- / mid -->
	<div class="clear"></div>
	</div><!-- / vmehldr -->
	<div class="clear"></div>
</div><!-- / wrapper -->
</body>
</html>
<?php
function generate_menu($arr){
	$ret = '';
	if(! empty($arr)) {
		$ret = '<div id="toolbar" class="ui-widget-header">';
		foreach($arr as $k =>$x) {
			$ret .= '<a href="'.base_url().$x.'"><button class="button">'.$k.'</button></a>';
		}
		return $ret.'</div>';
	} else {
		return '';
	}
}
?>