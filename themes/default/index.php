<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="shortcut icon" href="<?php echo($this->imagePath('favicon.ico')); ?>" />
<base href="<?php echo(SITE_URL); ?>" />

	
<link href="<?php echo($this->cssPath('bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo($this->cssPath('bootstrap-responsive.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo($this->cssPath('global.css')); ?>" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo($this->jsPath('jquery-1.9.1.js')); ?>"></script>
<script type="text/javascript" src="<?php echo($this->jsPath('bootstrap.js')); ?>"></script>
	
	
<!-- JS Files -->
<?php foreach ($this->__config['jss'] as $v) { ?> 
	<script type="text/javascript" src="<?php echo($v); ?>"></script>
<?php } ?>
<!-- CSS Files -->
<?php foreach ($this->__config['css'] as $v) { ?> 
	<link href="<?php echo($v); ?>" rel="stylesheet" type="text/css" />
<?php } ?>


<title>Valid Info</title>
<body>
<table class="containerWrapper">
	<tr class="wrapper">
		
		<td id="contentWrap">
			<div class="content container-fluid" id="content">
				<div class="modWrap">
					<!-- Begin Alerts -->
					<?php include($this->themeFilePath('layout/alerts.php')); ?>
					<!-- End of Alerts -->
					
					<!-- Begin Content -->
					<div class="row-fluid" id="Mod<?php echo($this->__config['page']); ?>">
						<?php 
						include($this->viewPageFilePath($this->__config['body']));
						
						?>
						</div>
					</div>
					<!--End of Content-->
			</div>
		</td>
	</tr>
</table>

<!-- Begin Footer -->
<?php include($this->themeFilePath('layout/footer.php')); ?>
<!--End of Footer-->

</body>
</html>