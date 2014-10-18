<?php if(!empty($this->__config['warnings'])) { ?>
<div class="alert alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Oh snap!</h4>
	<?php 
	foreach($this->__config['warnings'] as $message) {
		echo $message . "<br />\n";
	} 
	?>
</div>
<?php } ?>

<?php if(!empty($this->__config['successes'])) { ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Well done!</h4>
	<?php 
	foreach($this->__config['successes'] as $message) {
		echo $message . "<br />\n";
	} 
	?>
</div>
<?php } ?>