<?php echo doctype('html5'); ?>
<!-- /*
 *
 * @Author: Jaypee Ignacio
 *
 */ -->
<html>

<head>
<title><?php echo $title; ?></title>
<?php echo meta('description','Password Analyzer'); ?>
<?php echo link_tag('assets/img/lock.ico') ?>
<?php echo link_tag('assets/css/bootstrap.min.css') ?>
<style type="text/css">
	.bod{
		background-color: #B6C1C0;
	}
	.wrap{
		background-color: white;
		margin-top: 25px;
		padding-top: 50px;
		padding-bottom: 50px;
		padding-left: 50px;
		padding-right: 50px;
	}
	.shad{
		-webkit-box-shadow: 0px 10px 17px -2px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 10px 17px -2px rgba(0,0,0,0.75);
		box-shadow: 0px 10px 17px -2px rgba(0,0,0,0.75);
	}
	.mod{
		border-radius: 15px;
	}
	.panel-primary>.panel-heading {

    	background-color: #556E88;

	}
	.btn-success{
		background-color: #48B193;
	}
	.btn-default{
		background-color: #676767;
	}
	.panel-footer {
    background-color: rgb(85, 110, 136);
	}
</style>
<link rel="icon" type="image/x-icon"  href="<?php echo base_url() ?>assets/img/lock.ico">
</head>

<body class="bod">
	<div class="container mod">
		<div class="wrap shad">
		<div class="panel panel-primary">
		<div class="panel-heading">
		<p class="text-center"><img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/img/lock.png"></p>
		<h3 class="text-success text-center">Password Analyzer</h3>
		</div>
		<div class="panel-body">
			<h4 id="how" class="text-center text-success"></h4>
			<h4 id="hows" class="text-center text-danger"></h4>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6" id="progress"></div>
				<div class="col-sm-3"></div>
			</div>
			
			<form>
			
			  <div class="form-group">
			    <input type="text" class="form-control" id="passkey" placeholder="Enter Password">
			  </div>
			  <div id="message">
			  	
			  </div>
			  <button type="button" id="bsave" name="sv" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Save</button>
			  <button type="button"  class="btn btn-default"> <span class="glyphicon glyphicon-erase"></span>  Clear</button>
			</form>
			</div>

			<div id="stats">
				<div class="panel-footer"></div>
			</div>
		</div>
	    </div>
		
	</div>
</body>

<!-- M O D A L -->

<div id="report" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Statistics</h4>
        <p class="text-center text-success">Password saved!</p>
      </div>
      <div class="modal-body">
      	<div id="mod-content">
      		
      	</div>
      </div>
  
    </div>
  </div>
</div>

<!-- M O D A L -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/back.js"></script>

</html>