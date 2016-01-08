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
		<div class="panel-heading"><h3 class="text-default text-center">Password Analyzer</h3></div>
		<div class="panel-body">
			<h4 id="how" class="text-center text-success"></h4>
			<h4 id="hows" class="text-center text-danger"></h4>
			<br/>
			<form>
			
			  <div class="form-group">
			    <input type="text" class="form-control" id="passkey" placeholder="Enter Password">
			  </div>
			  <div id="message">
			  	
			  </div>
			  <button type="submit" id="bsave" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Save</button>
			  <button type="submit" id="bclear" class="btn btn-default"> <span class="glyphicon glyphicon-erase"></span>  Clear</button>
			</form>
			</div>

			<div id="stats">
				<div class="panel-footer"></div>
			</div>
		</div>
	    </div>
		
	</div>
</body>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/back.js"></script>

</html>