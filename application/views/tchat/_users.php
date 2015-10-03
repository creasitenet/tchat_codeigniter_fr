
    <!-- Users -->
    <?php if (isset($users)): ?> 
    	<?php if(!empty($users)): ?>
		<ul class="users">
			<?php foreach ($users as $u): ?>
				<li class="username"><?php echo $u->username; ?></li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
    <?php endif; ?>
    <!-- //Users -->
