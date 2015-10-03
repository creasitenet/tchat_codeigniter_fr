<h2>Tchat - Codeigniter 3</h2>

<div class="col-sm-8">
    <br />
    
	<!-- Messages -->
    <div id="tchatmessages">
       <div id="tchat_messages">
		    <?php if(isset($messages)): ?>
		    	<?php if(!empty($messages)): ?>
		        	<?php include('_messages.php'); ?>
		    	<?php endif; ?>
		    <?php endif; ?>
       </div>
    </div>
    
	<?php if($this->session->userdata('user') || $this->session->userdata('logged') ): ?>
    <div id="newmessage">
    	<form action="#">
    		<div class="input-group"> 
           	<input type="text" class="form-control add" id="texte" name="text" placeholder="" autofocus autocomplete="off" />
           	<span class="input-group-btn">
    	        <button type="button" class="btn btn-primary" onclick="ajax_add('tchat/postAjaxAdd',$('#texte').val(),'#texte')">ENVOYER</button>
           	</span>
           	</div>
        </form>
    </div>
	<?php endif; ?>
	<?php if( !$this->session->userdata('user') || !$this->session->userdata('logged') ): ?>
		<?php include('_login.php'); ?>
	<?php endif; ?>
	<div class="clearfix"></div>
	<br />
	
</div>

<div class="col-sm-4">
	
	<!-- User -->
	<div id="tchatusers">
		<div id="tchat_users">
			<?php if(isset($users)): ?>
			    <?php if(!empty($users)): ?>
			        <?php include('_users.php'); ?>
			      <?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php if($this->session->userdata('user') || $this->session->userdata('logged') ): ?>
		<br />
		<a href="user/logout" class="btn btn-primary btn-sm btn-block">SE DECONNECTER</a>
	<?php endif; ?>
	
</div>
