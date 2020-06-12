<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
    
    
    <style type="text/css">
        .input-prepend{
            width: 185px;
            margin-left:auto;
            margin-right: auto;
         }
	</style>
    
        <?php echo $scripts_for_layout; ?> 
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                
                //echo $this->Html->css('cake.generic.css');

		//echo $this->Html->css('style');
                
                
                
               
                
                echo $this->Html->css('bootstrap-slate');
                
                echo $this->Html->css('bootstrap-responsive');
                
                 echo $this->Html->css('charisma-app');

	//	echo $this->fetch('meta');
	//	echo $this->fetch('css');
	//	echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
