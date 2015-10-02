
    <!-- Messages -->
    <?php if(isset($messages)): ?>
    <?php if(!empty($messages)): ?>
    	
        <?php foreach($messages as $m): ?>
           <div class="message">
                <div class="gravatar"> 
                    <img src="http://www.gravatar.com/avatar/<?php md5(strtolower(trim($m->user->email))); ?>" class="img-responsive" alt="<?php echo $m->user->username; ?>" />
                </div>
                <div class"text">
                    <p class="username"><?php echo $m->user->username; ?> <span class="date">le <?php echo date('d-m-Y à H:i:s', strtotime($m->created_at)); ?></span></p>
                    <p class="textem"><?php echo nl2br(htmlentities($m->text)); ?></p>
                </div>
           <div class="clearfix"></div>
           </div>
        <?php endforeach; ?>                     
           
    <?php endif; ?>
    <?php endif; ?>
    <!-- //Messages -->
