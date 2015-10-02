
	<?php if(isset($error)):?>
    	<div class="error">
    		<?php echo $error;?>
		</div>
    <?php endif;?>
                 	
    <?php echo form_open('user/login',array('class'=>'form'));?>
    	<div class="col-sm-4">
    		<div class="form-group <?php if(form_error('pseudo')): echo 'has-error has-feedback'; endif; ?>">
	            <div class="input-group">
		     		<input type="text" class="form-control" name="pseudo" value="<?php echo set_value('pseudo');?>" placeholder="Pseudo" />
			      	<?php echo form_error('pseudo','<span class="help-block">','</span>');?>
			    </div>
	      	</div>
	    </div>
	    <div class="col-sm-4">  
	    	<div class="form-group <?php if(form_error('email')): echo 'has-error has-feedback'; endif; ?>">
	            <div class="input-group">
			      	<input type="text" class="form-control" name="email" value="<?php echo set_value('email');?>" placeholder="Adresse email" />
			      	<?php echo form_error('email','<span class="help-block">','</span>');?>
			    </div>
	      	</div>
	    </div>
	    <div class="col-sm-4">  	          
	      	<input type="submit" class="btn btn-primary btn-sm btn-block" value="S'IDENTIFIER" />
	    </div>
     <?php echo form_close();?>
      