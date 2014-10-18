<div class="validInfo">
	<form class="form-horizontal" id="formsendemail" name="formsendemail" method="post" action="<?php echo $this->url('Main')?>">
		<div class="control-group">
			<label class="control-label" for="firstname">First Name</label>
			<div class="controls">
				<?php echo $this->firstname?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lastname">Last Name</label>
			<div class="controls">
				<?php echo $this->lastname?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<?php echo $this->email?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="confirmemail">Confirm Email</label>
			<div class="controls">
				<?php echo $this->confirmemail?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="country">Country</label>
			<div class="controls">
				<?php echo $this->country[$this->countryISO] ; ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="town">Town</label>
			<div class="controls">
				<?php echo $this->town[$this->townId];?>
			</div>
		</div>


		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary" name="back" value="back" ><i class="icon-ok-sign icon-white"></i> Back</button>
				<button type="button" class="btn " name="sendemail" value="sendemail" onClick="javascript: window.location.href='<?php echo addslashes($this->url('sendEmail'))?>'" ><i class="icon-ok-sign icon-white"></i> Send Email</button>
			</div>
		</div>
	</form>
</div>