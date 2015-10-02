    
<p class='instructions'> Recover your forgotten identifiers </p>

<?php echo validation_errors(); ?>


<!-- Form -->
<div id="form">

<center>
    <?php 
    $attributes = array('class' => 'form', 'id' => 'form');
    $usernameoremaildata = array( 'name' => 'information', 'id' => 'information', 'value' => set_value('information'), 'maxlength' => '100', 'size' => '20', );
    //$emaildata = array( 'name' => 'email', 'id' => 'email', 'value' => set_value('email'), 'maxlength' => '100', 'size' => '20', );
    ?>
    
<?php echo form_open('acces/lost_identifiers', $attributes); ?>
<table border="0" align="center" cellspacing="5">
  
<tr>
<td class="label"><?php echo form_label('Username or Email : ', 'information'); ?></td>
</tr>
<tr>
<td><?php echo form_input($usernameoremaildata); ?></td>
</tr> 
  
<tr>
<td>
<?php echo form_submit('lostidentifiers', 'RETRIEVE'); ?>
</td>
</tr>  

</table>
<?php echo form_close(); ?>
</center>

</div>
<!-- Fin Form -->

<!-- Options -->
<div id="options">
<p class="options"><?php echo anchor("acces/login","LOGIN", array('class' => 'lienoptions')); ?></p><br />
</div>
<!-- Fin Options -->