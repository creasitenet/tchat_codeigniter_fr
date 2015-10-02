    
<p class='instructions'> Connect to administration </p>

<?php echo validation_errors(); ?>

<!-- Form -->
<div id="form">

<center>
    <?php 
    $attributes = array('class' => 'form', 'id' => 'form');
    $usernamedata = array( 'name' => 'username', 'id' => 'username', 'value' => set_value('username'), 'maxlength' => '20', 'size' => '20', );
    $passworddata = array( 'name' => 'password', 'id' => 'password', 'value' => '', 'maxlength' => '20', 'size' => '20', );
    ?>
    
<?php echo form_open('acces/login', $attributes); ?>
<table border="0" align="center" cellspacing="5">
  
<tr>
<td class="label"><?php echo form_label('User Name : ', 'username'); ?></td>
</tr>
<tr>
<td><?php echo form_input($usernamedata); ?></td>
</tr>
  
<tr>
<td class="label"><?php echo form_label('Password : ', 'password'); ?></td>
</tr>
<tr>
<td><?php echo form_password($passworddata); ?></td>
</tr> 
  
<tr>
<td>
<?php echo form_submit('connect', 'CONNECT'); ?>
</td>
</tr>  

</table>
<?php echo form_close(); ?>
</center>

</div>
<!-- Fin Form -->

<!-- Options -->
<div id="options">
<p class="options"><?php echo anchor("acces/lost_identifiers","LOST IDENTIFIERS ?", array('class' => 'lienoptions')); ?></p><br />
</p>
</div>
<!-- Fin Options -->
