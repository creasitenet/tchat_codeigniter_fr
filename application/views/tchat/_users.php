
    <!-- Users -->
    <?php if (isset($users)): ?> 
    	<?php if(!empty($users)): ?>
			<?php foreach ($users as $u): ?>
				<li class="username"><?php echo $u->username; ?></li>
			<?php endforeach; ?>
		<?php endif; ?>
    <?php endif; ?>
    <!-- //Users -->
