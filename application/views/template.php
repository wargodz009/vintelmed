<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Vintel Med Enterprises</title><link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" /><!-- jscroll --><script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script><script type="text/javascript" src="<?=base_url();?>assets/js/prettify.js"></script><script type="text/javascript" src="<?=base_url();?>assets/js/jquery.slimscroll.js"></script><link href="<?=base_url();?>assets/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet"><script src="<?=base_url();?>assets/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script><script src="<?=base_url();?>assets/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script><script src="<?=base_url();?>assets/js/jquery.dataTables.js"></script><link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet"><script src="<?=base_url();?>assets/js/vanadium.js"></script><link href="<?php echo base_url(); ?>assets/css/vanadium.css" rel="stylesheet"><script src="<?=base_url();?>assets/js/tinymce/tinymce.min.js"></script><script type="text/javascript">tinyMCE.init({		mode : "specific_textareas",		editor_selector : "wysiwyg"});</script><script type="text/javascript" charset="utf-8">$(document).ready(function() {	$( ".button" ).button();	$('table.datatable').dataTable({        "bPaginate": false,        "bLengthChange": false,        "bFilter": false,        "bSort": true,        "bInfo": false,        "bAutoWidth": true    });	$('body').delegate('a.confirm','click',function(e){		e.preventDefault();		var ans = confirm($(this).attr('rel'));		if(ans) {			window.location = $(this).attr('href');		}	});});</script></head><body><div class="wrapper">	<div id="vmehldr">	<!-- TOP -->	<div id="top">		<div class="tp1">			<div class="logo"><a href="" title="Vintel Med Enterprises">Vintel Med Enterprises</a></div>			<div class="timedate">				<?php if($this->users->is_logged_in()) { ?>				<a class="confirm" rel="Are you sure you want to logout?" href="<?=base_url();?>user/logout">Logout</a> <br/>				<?php } else {?>				<a class="" href="<?=base_url();?>user/login">Login</a> <br/>				<?php } ?>			</div>			<div class="prflnk">			<?php if($this->users->is_logged_in()) { $this->load->model('user/user_model'); ?>			<b>Welcome:</b> <a href="#"><?php echo '<a href="'.base_url().'user/view">'.$this->user_model->get_single($this->session->userdata('user_id'),false,'username').'</a>';?></a>			<?php } ?>			</div>			<div class="clear"></div>		</div>		<div class="tp2">			<div class="lbl">Search</div>			<!-- srchbx -->			<div class="srchbx">				<input name="" type="text" />				<input name="submit" type="button" />				<div class="clear"></div>			</div>			<!-- / srchbx -->			<div class="dropmenu"></div>			<div class="clear"></div>		</div>	</div><!-- / TOP --><!-- MID -->	<div id="mid">		<!-- sidebar -->		<div id="sidebar">			<ul>				<?php				$dashboard = array('dashboard');				$inventory = array('inventory');				$clients = array('clients');				$employees = array('employees','user');				$reports = array('reports');				?>				<?php if($this->users->is_logged_in()) { ?>				<li class="<?php echo (in_array($this->uri->segment(1),$dashboard)?'active':''); ?>">					<div class="lgt"></div>					<a href="<?=base_url()?>dashboard">					<div class="icn bg1"></div>					Dashboard					</a>				</li>				<?php } ?>				<?php if($this->users->is_admin() || $this->users->is_warehouseman()) { ?>				<li class="<?php echo (in_array($this->uri->segment(1),$inventory)?'active':''); ?>">					<div class="lgt"></div>					<a href="<?=base_url()?>inventory">					<div class="icn bg2"></div>					Inventory					</a>				</li>				<?php } ?>				<?php if($this->users->is_admin() || $this->users->is_msr()) { ?>				<li class="<?php echo (in_array($this->uri->segment(1),$clients)?'active':''); ?>">					<div class="lgt"></div>					<a href="<?=base_url()?>clients">					<div class="icn bg3"></div>					Clients					</a>				</li>				<?php } ?>				<?php if($this->users->is_admin()) { ?>				<li class="<?php echo (in_array($this->uri->segment(1),$employees)?'active':''); ?>">					<div class="lgt"></div>					<a href="<?=base_url()?>user">					<div class="icn bg4"></div>					Employees					</a>				</li>				<?php } ?>				<?php if($this->users->is_logged_in()) { ?>					<?php if($this->users->is_admin() || ! $this->users->is_client()) { ?>					<li class="<?php echo (in_array($this->uri->segment(1),$reports)?'active':''); ?>">						<div class="lgt"></div>						<a href="<?=base_url()?>reports">						<div class="icn bg5"></div>						Reports						</a>					</li>					<?php } ?>				<?php } ?>			</ul>		</div>		<!-- / sidebar -->		<!-- content -->		<div id="cntnt">			<div id="toolbar" class="ui-widget-header">				<button class='button'>A</button>				<button class='button'>B</button>				<button class='button'>C</button>				<button class='button'>D</button>			</div>			<?php			if($this->session->flashdata('error') != ''){				echo '<div class="ui-widget">					<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">						<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>						'.$this->session->flashdata('error').'</p>					</div>				</div>';			}			if($this->session->flashdata('notice') != ''){				echo '<div class="ui-widget">					<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">						<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>						'.$this->session->flashdata('notice').'</p>					</div>				</div>';			}			?>			<?= $contents ?>		</div><!-- / content -->		<div class="clear"></div>	</div><!-- / mid -->	<div class="clear"></div>	</div><!-- / vmehldr -->	<div class="clear"></div></div><!-- / wrapper --></body></html>