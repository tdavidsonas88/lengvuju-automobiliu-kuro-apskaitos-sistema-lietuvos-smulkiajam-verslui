<?php

?>
<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"><?php echo $this->Html->image('logo20.png', array('alt' => 'Charisma Logo')); ?> <span>Charisma</span></a>
				

				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"><?php echo $user; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
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
					<ul class="nav">
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
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
						<li class="nav-header hidden-tablet">Main</li>
						
						
						  <li><?php  echo $this->Html->link( '<i class="icon-wrench" title='.__('btn_preferences').'></i> <span class="hidden-tablet">'.__('btn_preferences').'</span>',
                                                            array('controller' => 'pages', 'action' => 'preferences' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>
                                                
                                                <li><?php  echo $this->Html->link( '<i class="icon-briefcase" title='.__('btn_projects').'></i> <span class="hidden-tablet">'.__('btn_projects').'</span>',
                                                            array('controller' => 'pages', 'action' => 'projects' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>
                                                
                                                <li><?php  echo $this->Html->link( '<i class="icon-road" title='.__('btn_auto').'></i> <span class="hidden-tablet">'.__('btn_auto').'</span>',
                                                            array('controller' => 'pages', 'action' => 'cars' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>
                                                
                                                <li><?php  echo $this->Html->link( '<i class="icon-shopping-cart" title='.__('btn_fuel_buy').'></i> <span class="hidden-tablet">'.__('btn_fuel_buy').'</span>',
                                                            array('controller' => 'pages', 'action' => 'purchases' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>
 
                                                    
                                                <li><?php  echo $this->Html->link( '<i class="icon-random" title='.__('btn_distances').'></i> <span class="hidden-tablet">'.__('btn_distances').'</span>',
                                                            array('controller' => 'pages', 'action' => 'distances' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>       
                                                
                                                <li><?php  echo $this->Html->link( '<i class="icon-check" title='.__('btn_new_purchase').'></i> <span class="hidden-tablet">'.__('btn_new_purchase').'</span>',
                                                            array('controller' => 'pages', 'action' => 'new_purchase' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>   
                                                
                                                <li><?php  echo $this->Html->link( '<i class="icon-arrow-right" title='.__('btn_new_distance').'></i> <span class="hidden-tablet">'.__('btn_new_distance').'</span>',
                                                            array('controller' => 'pages', 'action' => 'new_distance' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>
                                                
                                                <li><?php  echo $this->Html->link( '<i class="icon-print" title='.__('btn_reports').'></i> <span class="hidden-tablet">'.__('btn_reports').'</span>',
                                                            array('controller' => 'pages', 'action' => 'reports' ),
                                                                array('class' => 'ajax-link', 'escape' => false)
                                                ); ?>
                                                </li>
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
						<a href="#"><?php echo __('btn_projects'); ?></a> 
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">
				
	
				<div class="box span6">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo __('btn_projects'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
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
										printf('<td id = %s.Project.project class="center edit">%s</td> ' , $project_name[ 'Project' ][ 'id' ], $project_name[ 'Project' ][ 'project' ]);
                                                                               echo '
											<td class="center">
										
										 ';
                                                                              
										 echo $this->Form->postLink('<i class="icon-trash icon-white"> </i> Delete', 
                                                                                            array('action' => 'delete',$project_name['Project']['id'], 'Project'),
                                                                                            array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger', 'escape' => false));					
										echo '</td>
										';	
                                                                                 
                                                                                 
                                                                               
                                                                            echo "</tr>";
                                                                            
                                         
                                                                        }
                                                                
                                                                
                                             
								?>  
						  
						  
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
				
				
				
				<div class="box span6">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php  echo __('btn_projects'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					
						  <fieldset>
                                                      
                                                      
                                                     
                                                      <?php echo $this->Form->create(); ?>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('new_project'); ?></label>
                                                                        <div class="controls form-horizontal">
                                                                     <?php  echo $this->Form->input('Project.project', array('label' => false, 'class' => 'input-xlarge focused') ); ?>
                                                                    <?php  echo $this->Form->input('Project.users_id', array('value' => $users_id, 'label' => false, 'type' => 'hidden')); ?>
                                                                          
                                                                        </div>
                                                                     </div>
                                                      
                                                       
                                                         
							

							<div class="form-actions">
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </p>
                                                            
                                                            
							 
							</div>
                                                      
                                                      
                                                      
                                            
                                 
                                                  <?php // pr($this->validationErrors); ?>     
							
                                                        
                                                        
                                                        
                                                      
                                                      
                                                      
                                                      
						  </fieldset>
						

					</div>

				</div><!--/span-->
			
			</div><!--/row-->	
			
	
			
			
			
			
			
			

		

			
				  

		  
       
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
				<a href="#" class="btn btn-primary" >Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="tadas.virtualu.lt" target="_blank">Tadas Davidsonas</a> 2013</p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		
	</div><!--/.fluid-container-->
