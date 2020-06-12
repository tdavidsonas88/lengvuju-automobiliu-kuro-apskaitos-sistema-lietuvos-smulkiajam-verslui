<!DOCTYPE html>
<meta http-equiv="content-type" value="text/html; charset=utf-8" />
	

	<html>
	<head>
            
		
		
		<!-- The styles -->

	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
        
        
		<title>
		</title>
		<script src="js/jquery-1.7.2.min.js"></script>
		<script>
		
		$(document).ready(function(){
			$(".forgot").click(function(){	
					$("#login_main").detach();
					$('#main_start').append('<div id = "structure"></div>');
					$('#structure').load('content/forgot.php');
			});
			
			$(".register").click(function(){	
					$("#login_main").detach();
					$('#main_start').append('<div id = "structure"></div>');
					$('#structure').load('content/register.php');
			});
			
		});                                 
		</script>
		
	</head>
	<body>
                     
	
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div  class="span12 center login-header">
					
					<h2><?php echo __('welcome'); ?></h2>
				<div>
					
                                  
                                  <?php echo $this->Html->link('EN', array('language'=>'eng')); ?>
				<?php echo $this->Html->link('LT', array('language'=>'lit')); ?>
				</div>
				</div><!--/span-->
				
			</div><!--/row-->
			
			<div class="row-fluid" >
				<div id="main_start" class="well span5 center login-box">
				<div id="login_main">
					<div class="alert alert-info">
						<?php echo __('forgot_password_explanation'); ?>					
					</div>
					
					<?php 
//						/if($_GET['lang'] == 'lt' || $_GET['lang'] == ''){
//										echo '<form action="?login=yes" method ="post" class="form-horizontal">';
//									}else{
//										echo '<form action="?lang=en&login=yes" method ="post" class="form-horizontal">';
//									}
//						
							
                                        ?>
						<fieldset>
                                                    
                                                    <?php
                                                     //  echo $this->Form->create('User', array('action' => 'userarea'));
                                                     echo $this->Session->flash('auth'); 
                                                    echo $this->Form->create();
                                                       
                                                     //   echo $this->Form->input('password');
                                                        
                                                      ?>
        
                                                        <?php //echo $this->Form->create('Post'); ?>
							<div class="input-prepend" title="Email" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><?php  echo $this->Form->input('email', array('autofocus' => '','label' => false)); ?>
							</div>
							<div class="clearfix"></div>
                                                        
                                                        
                                                        <p class="center">
                                                                    <button type="reset" class="btn">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo "change_password"; ?> </button>
                                                            </p>
                                                             <?php
                                                                            echo $this->Html->link( __('go_back'),
                                                                                array('controller' => 'users', 'action' => 'index' )
                                                                                    
                                                                            );
                                                                        ?>
                                                        

							
						</fieldset>
						<p><?php //echo error_for('empty_field'); ?> </p>
					</form>
				</div>
				</div><!--/span-->
			</div><!--/row-->


			
	</body>
	
</html>

