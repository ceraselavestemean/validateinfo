<div class="validInfo">
	<form class="form-horizontal" id="formvalidInfo" name="formvalidInfo" method="post" action="<?php echo $this->url('ValidInfo')?>">
		<div class="control-group">
			<label class="control-label" for="firstname">First Name</label>
			<div class="controls">
				<input type="text" id="firstname" name="firstname" placeholder="First Name" maxlength="30" value="<?php echo $this->firstname?>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lastname">Last Name</label>
			<div class="controls">
				<input type="text" id="lastname" name="lastname" placeholder="Last Name" maxlength="30" value="<?php echo $this->lastname?>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<input type="text" id="email" name="email" placeholder="Email" maxlength="128" value="<?php echo $this->email?>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="confirmemail">Confirm Email</label>
			<div class="controls">
				<input type="text" id="confirmemail" name="confirmemail" placeholder="Confirm Email" maxlength="128" value="<?php echo $this->confirmemail?>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="country">Country</label>
			<div class="controls">
				<select name="country" id="country">
					<option value="0">&mdash; Select a country &mdash;</option>
					<?php foreach ($this->country as $countryISO => $countryName) { ?>
					<option value="<?php echo $countryISO?>" <?php if($countryISO==$this->countryISO) {?>selected="selected"<?php }?>><?php echo $countryName?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="town">Town</label>
			<div class="controls">
				<select name="town" id="town">
					<option value="0">&mdash; Select a Town &mdash;</option>
					<?php foreach ($this->town as $townId => $townName) { ?>
					<option value="<?php echo $townId?>" <?php if($townId==$this->townId) {?>selected="selected"<?php }?>><?php echo $townName?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary" name="validate" value="validate" ><i class="icon-ok-sign icon-white"></i> Validate information</button>
			</div>
		</div>
	</form>
</div>