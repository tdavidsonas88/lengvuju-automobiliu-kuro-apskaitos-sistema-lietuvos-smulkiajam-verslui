<?php

?>


    <script>
    </script>
    <div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"><?php //echo $this->Html->image('logo20.png', array('alt' => 'Charisma Logo')); ?> 
                                    <span><?php echo __("logo_title");?></span></a>

				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo $user; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--<li><a href="#">Profile</a></li>-->
						<li class="divider"></li>
						<!--<li><a href="login.html">Logout</a>-->
						<li>
						<?php
                                                        
                                                           echo $this->Html->link( __('Logout'),
                                                                array('controller' => 'users', 'action' => 'logout')
                                                            );
                                                
						?>
						</li>
						
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
<!--					<ul class="nav">
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>-->
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet"><?php echo __('Main'); ?></li>
                                                
                                                
                                                
                                               <?php
                                                
                                                          include('menu.ctp'); 
                                             ?>
                                              
                                                
                                                
	
					</ul>
					<!--<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>-->
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#"><?php echo __('btn_preferences'); ?></a>
					</li>

				</ul>
			</div>
                        
                        
                        
                        <div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> <?php echo __('intruduction') ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<p><b><?php echo __('introduction_about_fuel_accounting_system') ?></b></p>
						
<!--						<p class="center">
							<a href="http://usman.it/free-responsive-admin-template" class="btn btn-large btn-primary"><i class="icon-chevron-left icon-white"></i> Back to article</a> 
							<a href="http://usman.it/free-responsive-admin-template" class="btn btn-large"><i class="icon-download-alt"></i> Download Page</a>
						</p>-->
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<div class="row-fluid sortable">
				
	
				<div class="box span8">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo __('btn_cars'); ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            <div id="scrollable">
						<table class="table table-striped table-bordered row-fluid sortable ui-sortable">
						  		<thead>
								  <tr>
									  <th><?php echo __('car'); ?></th>
                                                                          <th><?php echo __('car_number'); ?></th>
                                                                          <th><?php echo __('fuel_rate'); ?></th>
                                                                          <th><?php echo __('fuel_type'); ?></th>
                                                                          <th><?php echo __('fuel_left'); ?></th>
									  <th><?php echo __('actions'); ?></th>                                       
								  </tr>
							  </thead> 
						  <tbody>
						  
						  		<?php
                                                                
                                                                         foreach( $list as $car ) {
                                                                            
                                                                            
                                                                            echo "<tr>";
										printf('<td id = %s.Car.car class="center edit">%s</td> <td id = %s.Car.car_number class="center edit">%s</td>
                                                                                    <td id = %s.Car.fuel_rate class="center edit">%s</td><td id = %s.Car.fuel_type class="center">%s</td>
                                                                                    <td id = %s.Car.fuel_left class="center edit">%s</td>'
                                                                                        , $car[ 'Car' ][ 'car_id' ], $car[ 'Car' ][ 'car' ], $car[ 'Car' ][ 'car_id' ], $car[ 'Car' ][ 'car_number' ],
                                                                                        $car[ 'Car' ][ 'car_id'] , $car[ 'Car' ][ 'fuel_rate' ], $car[ 'Car' ][ 'car_id'] , $car[ 'Car' ][ 'fuel_type' ],
                                                                                         $car[ 'Car' ][ 'car_id'], $car[ 'Car' ][ 'fuel_left' ]);
                                                                               echo '
											<td class="center">
										
										 ';
                                                                              
										 echo $this->Form->postLink('<i class="icon-trash icon-white"> </i>', 
                                                                                            array('action' => 'delete',$car['Car']['car_id'], 'Car'),
                                                                                            array('confirm' => __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger', 'escape' => false));					
										echo '</td>
										';	                                                                               
                                                                            echo "</tr>";
                                                                            
                                         
                                                                        }
                                                                
                                                                
                                             
								?>  
						  
						  
							
						  </tbody>
					  </table>            
					</div>
                                    </div>
				</div><!--/span-->
				
				
				
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php  echo __('btn_cars'); ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content form-horizontal">
					
						  <fieldset>
                                                      
                                                      
                                                     
                                                      <?php echo $this->Form->create(); ?>
                                                      
                                                      
                                                      <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('new_car'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('Car.car', array('label' => false, 'class' => 'focused') ); ?>
                                                                <?php  echo $this->Form->input('Car.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                           </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('car_number'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('Car.car_number', array('label' => false, 'class' => 'focused') ); ?>
                                                                    <?php  echo $this->Form->input('Car.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('fuel_rate'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('Car.fuel_rate', array('label' => false, 'class' => 'focused') ); ?>
                                                                    <?php  echo $this->Form->input('Car.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('fuel_type'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->select('Car.fuel_type' ,  array(__('petrol') => __('petrol'), __('diesel') => __('diesel'), __('gas') => __('gas'), __('petrol_gas') => __('petrol_gas'), __('diesel_gas') => __('diesel_gas'), __('electric') => __('electric')),
                                                                             array( 'default' => __('petrol'), 'empty' => false)); ?>
                                                                    <?php  echo $this->Form->input('Car.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                            
                                                                          
                                                                        </div>
                                                      </div>
                                                       <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('fuel_left'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('Car.fuel_left', array('label' => false, 'class' => 'focused') ); ?>
                                                                    <?php  echo $this->Form->input('Car.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                      </div>
                                                      
                                                       
                                                         
							

							<div class="form-actions">
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn"><?php echo __('cancel'); ?></button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
                                                            </p>
                                                            
                                                          <?php  echo $this->Form->end(); ?>
							 
							</div>
                                                      
                                                      
                                                      
                                            
                                 
                                                  <?php // pr($this->validationErrors); ?>     
							
                                                        
                                                        
                                                        
                                                      
                                                      
                                                      
                                                      
						  </fieldset>
						

					</div>

				</div><!--/span-->

                                
                                
                                </div>
                                <div class="row-fluid sortable">
                                
                                
                                
                                
                                
                                	<div class="box span8">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo __('btn_projects'); ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered ">
						  		<thead>
								  <tr>
									  <th><?php echo __('project'); ?></th>
									  <th><?php echo __('actions'); ?></th>                                       
								  </tr>
							  </thead> 
						  <tbody>
						  
						  		<?php
                                                                
                                                                         foreach( $projects_list as $project_name ) {
                                                                            
                                                                            
                                                                            echo "<tr>";
                                                                                
										printf('<td id = %s.Project.project class="center edit">%s</td> ' , $project_name[ 'Project' ][ 'project_id' ], $project_name[ 'Project' ][ 'project' ]);
                                                                               echo '
											<td class="center">
										
										 ';
                                                                              
										 echo $this->Form->postLink('<i class="icon-trash icon-white"> </i>', 
                                                                                            array('action' => 'delete',$project_name['Project']['project_id'], 'Project'),
                                                                                            array('confirm' => __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger', 'escape' => false));					
										echo '</td>';
                                                                                    
                                                                                                                                                      
//                                                                                 echo $this->Form->postLink('<i class="icon-trash icon-white"> </i> Delete', 
//                                                                                            array('action' => 'delete',$car['Car']['id'], 'Car'),
//                                                                                            array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger', 'escape' => false));	
                                                                               
                                                                            echo "</tr>";
                                                                            
                                         
                                                                        }
                                                                
                                                                
                                             
								?>  
						  
						  
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
				
				
				
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php  echo __('btn_projects'); ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content form-horizontal">
					
						  <fieldset>
                                                      
                                                      
                                                     
                                                      <?php echo $this->Form->create(); ?>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('new_project'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('Project.project', array('label' => false, 'class' => 'input-xlarge focused') ); ?>
                                                                    <?php  echo $this->Form->input('Project.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                                     </div>
                                                      
                                                       
                                                         
							

							<div class="form-actions">
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn"><?php echo __('cancel'); ?></button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
                                                            </p>
                                                            
                                                            
							 
							</div>
                                                      
                                                        <?php echo $this->Form->end(); ?>
                                                      
                                            
                                 
                                                  <?php // pr($this->validationErrors); ?>     
							
                                                        
                                                        
                                                        
                                                      
                                                      
                                                      
                                                      
						  </fieldset>
						

					</div>

				</div><!--/span-->
                                

			</div><!--/row-->	
                        
                        
                        <!-- ------------------------------------------- -->
                        
                     
                        <div class="row-fluid sortable">
                                
                                
                                
                                
                                
                                	<div class="box span8">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo __('personnel'); ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            
                                            <div id="scrollable">
						<table class="table table-striped table-bordered ">
						  		<thead>
								  <tr>
                                                                          <th><?php echo __('name'); ?></th>
									  <th><?php echo __('surname'); ?></th>
                                                                          <th><?php echo __('email'); ?></th>
									  <th><?php echo __('actions'); ?></th>                                       
								  </tr>
							  </thead> 
						  <tbody>
						  
						  		<?php
                                                                
                                                                         foreach( $employees_list as $employee ) {
                                                                            
                                                                            
                                                                            echo "<tr>";
                                                                                
										printf('<td id = %s.User.name class="center">%s</td><td id = %s.User.surname class="center">%s</td> 
                                                                                    <td id = %s.User.email class="center">%s</td> ' , $employee[ 'User' ][ 'user_id' ], $employee[ 'User' ][ 'name' ],
                                                                                        $employee[ 'User' ][ 'user_id' ], $employee[ 'User' ][ 'surname' ], $employee[ 'User' ][ 'user_id' ], $employee[ 'User' ][ 'email' ]);
                                                                               echo '
											<td class="center">
										
										 ';
                                                                              
										 echo $this->Form->postLink('<i class="icon-trash icon-white"> </i>', 
                                                                                            array('action' => 'delete',$employee['User']['user_id'], 'User'),
                                                                                            array('confirm' => __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger', 'escape' => false));					
										echo '</td>';
                                                                                    
                                                                                                                                                      
//                                                                                 echo $this->Form->postLink('<i class="icon-trash icon-white"> </i> Delete', 
//                                                                                            array('action' => 'delete',$car['Car']['id'], 'Car'),
//                                                                                            array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger', 'escape' => false));	
                                                                               
                                                                            echo "</tr>";
                                                                            
                                         
                                                                        }
                                                                
                                                                
                                             
								?>  
						  
						  
							
						  </tbody>
					  </table>            
					</div>
                                   </div>
				</div><!--/span-->
				
				
				
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php  echo __('personnel'); ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content form-horizontal">
					
						  <fieldset>
                                                      
                                                      
                                                     
                                                      <?php echo $this->Form->create(); ?>
                                                      
                                                      
                                                      
 
                                                        <div class="control-group form-horizontal">
                                                            <label class="control-label" for="focusedInput"><?php echo __('new_user_name'); ?></label>
                                                            <div class="controls form-horizontal">
                                                              <?php  echo $this->Form->input('User.name', array('label' => false, 'class' => 'input-xlarge focused') ); ?>
                                                              <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-horizontal">
                                                            <label class="control-label" for="focusedInput"><?php echo __('new_user_surname'); ?></label>
                                                            <div class="controls form-horizontal">
                                                              <?php  echo $this->Form->input('User.surname', array('label' => false, 'class' => 'input-xlarge focused') ); ?>
                                                              <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-horizontal">
                                                            <label class="control-label" for="focusedInput"><?php echo __('new_user_email'); ?></label>
                                                            <div class="controls form-horizontal">
                                                              <?php  echo $this->Form->input('User.email', array('label' => false, 'class' => 'input-xlarge focused') ); ?>
                                                              <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                            </div>
                                                        </div>
                                                      <?php  echo $this->Form->input('User.role', array('value' => 'employee', 'label' => false, 'type' => 'hidden')); ?>
                                                      <?php  echo $this->Form->input('Company.company_name', array('value' => $company_name, 'label' => false, 'type' => 'hidden')); ?>
                                                       <?php  echo $this->Form->input('Company.company_code', array('value' => $company_code, 'label' => false, 'type' => 'hidden')); ?>
                                                      
                                                       <?php 
                                                            $confirm_code = md5(uniqid(rand()));
                                                            echo $this->Form->hidden('User.confirmation_code', array('value' => $confirm_code));
                                                        ?>
                                                      
                                                      
							<div class="form-actions">
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn"><?php echo __('cancel'); ?></button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
                                                            </p>
                                                            
                                                            
							 
							</div>
                                                      
                                                        <?php echo $this->Form->end(); ?>
                                                      
                                            
                                 
                                                  <?php // pr($this->validationErrors); ?>     
							
                                                        
                                                        
                                                        
                                                      
                                                      
                                                      
                                                      
						  </fieldset>
						

					</div>

				</div><!--/span-->
                                

			</div><!--/row-->	
                        
                        
                        <!-- ------------------------------------------- -->
                        
                        
                        
                        
                        
                        
			
                        
                        <div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> <?php echo __('personal_information') ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						
                                                
                                                
                                                <div class="box-content span6 form-horizontal">
                                                    
                                                     <p class="center"><b><?php echo __('change_password') ?></b></p>
					
						  <fieldset>
                                                      
                                                     
                                                     
                                                      <?php echo $this->Form->create(); ?>
                                                      
                                                      <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('old_password'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('User.current_password', array('label' => false, 'class' => 'focused', 'type' => 'password') ); ?>
                                                                <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                           </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('new_password'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('User.password1', array('label' => false, 'class' => 'focused', 'type' => 'password') ); ?>
                                                                    <?php  echo $this->Form->input('User.userid', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('repeat_new_password'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('User.password2', array('label' => false, 'class' => 'focused', 'type' => 'password') ); ?>
                                                                    <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                      </div>
                                                      
                                                       
                                                         
							

							<div class="center">
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn"><?php echo __('cancel'); ?></button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
                                                            </p>
                                                            
                                                          <?php  echo $this->Form->end(); ?>
							 
							</div>
                                                      
                                                      
                                                      
                                            
                                 
                                                  <?php // pr($this->validationErrors); ?>     
							
                                                        
                                                        
                                                        
                                                      
                                                      
                                                      
                                                      
						  </fieldset>
						

					</div>
                                                
                                                <div class="box-content form-horizontal">
                                                       
                                                  <p class="center"><b><?php echo __('change_email') ?></b></p>  
                                                    
						  <fieldset>
                                                      
                                                      
                                                     
                                                      <?php echo $this->Form->create(); ?>
                                                      <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('password'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('User.password3', array('label' => false, 'class' => 'focused', 'type' => 'password') ); ?>
                                                                <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                           </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('new_email'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('User.email1', array('label' => false, 'class' => 'focused') ); ?>
                                                                <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                           </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('repeat_new_email'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('User.email2', array('label' => false, 'class' => 'focused') ); ?>
                                                                    <?php  echo $this->Form->input('User.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                      </div>
                               
                                                      
                                                       
                                                         
							

							<div class="center">
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn"><?php echo __('cancel'); ?></button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
                                                            </p>
                                                            
                                                          <?php  echo $this->Form->end(); ?>
							 
							</div>
                                                      
                                                      
                                                      
                                            
                                 
                                                  <?php // pr($this->validationErrors); ?>     
							
                                                        
                                                        
                                                        
                                                      
                                                      
                                                      
                                                      
						  </fieldset>
						

					</div>
						
<!--						<p class="center">
							<a href="http://usman.it/free-responsive-admin-template" class="btn btn-large btn-primary"><i class="icon-chevron-left icon-white"></i> Back to article</a> 
							<a href="http://usman.it/free-responsive-admin-template" class="btn btn-large"><i class="icon-download-alt"></i> Download Page</a>
						</p>-->
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			
			
			
			
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
                                
                                
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary"><?php echo __('save_changes'); ?></a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="tadas.virtualu.lt" target="_blank">Tadas Davidsonas, Mindaugas Tautkus</a> 2014</p>
			<p class="pull-right"><?php echo __('powered_by'); ?>: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		
	</div><!--/.fluid-container-->
   