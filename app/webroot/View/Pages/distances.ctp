<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */



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
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo $user; ?></span>
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
						<a href="#"><?php echo __('btn_distances'); ?></a>
					</li>

				</ul>
			</div>

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Introduction</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<h1>Charisma <small>free, premium quality, responsive, multiple skin admin template.</small></h1>
						<p>Its a live demo of the template. I have created Charisma to ease the repeat work I have to do on my projects. Now I re-use Charisma as a base for my admin panel work and I am sharing it with you :)</p>
						<p><b>All pages in the menu are functional, take a look at all, please share this with your followers.</b></p>
						
						<p class="center">
							<a href="http://usman.it/free-responsive-admin-template" class="btn btn-large btn-primary"><i class="icon-chevron-left icon-white"></i> Back to article</a> 
							<a href="http://usman.it/free-responsive-admin-template" class="btn btn-large"><i class="icon-download-alt"></i> Download Page</a>
						</p>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			
			
			
						<div class="row-fluid sortable ">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo __('btn_distances'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                                <div id="scrollable">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th><?php 
                                                                            echo __('Automobile');												 
                                                                       ?>
									</th>
								  	<th>
									<?php 
                                                                            	 echo __('Date');
                                                                        ?>
									</th>
									<th>
									<?php 
                                                                            	 echo __('Project');
                                                                        ?>
									</th>
									<th>
										<?php 
                                                                            	 echo __('Km_at_begining');
                                                                                ?>
									</th>
									<th>
										<?php  echo __('km_at_end'); ?>
									</th>
									<th>
										<?php 
                                                                            	 echo __('from_location');
                                                                        ?>
									</th>
									<th>
										<?php 
                                                                            	 echo __('to_location');
                                                                        ?>
									</th>
									<th>
										<?php 
                                                                            	 echo __('purpose');
                                                                        ?>
									</th>
									<th>
										<?php 
                                                                            	 echo __('km');
                                                                        ?>
									</th>
                                                                        <th>
										<?php 
                                                                            	 echo __('actions');
                                                                        ?>
									</th>
							  </tr>
						  </thead>   
						  <tbody>
						  
						  		<?php	
                                                                
                                                                
                                                             

                                                                        foreach( $distances as $distance ) {
                                                                            
                                                                            
                                                                            echo "<tr>";
										printf('<td id = %s.Distance.auto class="center edit">%s</td> <td id = %s.Distance.date class="center edit">%s</td> <td id = %s.Distance.project class="center edit">%s</td> <td id =%s.Distance.km_begin class="center edit">%s</td> <td id =%s.Distance.km_end class="center edit">%s</td>
										<td id =%s.Distance.from_location class="center edit">%s</td> <td id =%s.Distance.to_location class="center edit">%s</td> <td id =%s.Distance.purpose class="center edit">%s</td> <td id =%s.Distance.km class="center edit">%s</td>' ,$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'auto' ],$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'date' ],$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'project' ],$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'km_begin' ],$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'km_end' ]
										,$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'from_location' ],$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'to_location' ],$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'purpose' ],$distance[ 'Distance' ][ 'id' ], $distance[ 'Distance' ][ 'km' ]);
	
															
										echo '
											<td class="center">
										
										 ';
                                                                                    $distance['model'] = 'Distance';
                                                                                    echo $this->Form->postLink('<i class="icon-trash icon-white"></i>', 
                                                                                            array('action' => 'delete',$distance['Distance']['id'], 'Distance'),
                                                                                            array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger', 'escape' => false)); 
                                                                                                                                                             
									
										echo '</td>
										';	
                                                                            echo "</tr>";
                                                                            
                                                                            
//                                                                            
//                                                                            echo '<li>';
//                                                                            <td class="center">echo $distance[ 'Distance' ][ 'auto' ];</td>
//                                                                            
//                               
//                                                                            echo '</li>';
                                                                        }

                                                                
                                                                /*
									$users_id = getUserId($_SESSION['email']);
									$sql = "SELECT auto, date, project, km_begin, km_end, from_location, to_location, purpose, 
															km FROM distances WHERE users_id = '$users_id'";
										
								
									
																		
									$result = mysql_query($sql);

									while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
										echo "<tr>";
										printf('<td class="center">%s</td> <td class="center">%s</td> <td class="center">%s</td> <td class="center">%s</td> <td class="center">%s</td>
										<td class="center">%s</td> <td class="center">%s</td> <td class="center">%s</td> <td class="center">%s</td>' , $row["auto"], $row["date"], $row["project"], $row["km_begin"], $row["km_end"]
										, $row["from_location"], $row["to_location"], $row["purpose"], $row["km"]);
	
															
											
										echo "</tr>";
										
										
									}
									mysql_free_result($result);
                                                                      */
								?>
						  
						  
							
						  </tbody>
					  </table>   
                                          </div>          
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			
			
			
					
			<div class="row-fluid sortable">
				<div class="box span4">
					<div class="box-header well">
						<h2><i class="icon-th"></i> Tabs</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#info">Info</a></li>
							<li><a href="#custom">Custom</a></li>
							<li><a href="#messages">Messages</a></li>
						</ul>
						 
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="info">
								<h3>Charisma <small>a fully featued template</small></h3>
								<p>Its a fully featured, responsive template for your admin panel. Its optimized for tablet and mobile phones. Scan the QR code below to view it in your mobile device.</p><?php echo $this->Html->image('qrcode136.png', array('alt' => 'QR Code', 'class' => 'charisma_qr center')); ?>
							</div>
							<div class="tab-pane" id="custom">
								<h3>Custom <small>small text</small></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. Nulla tellus elit, varius non commodo eget, mattis vel eros. In sed ornare nulla. Donec consectetur, velit a pharetra ultricies, diam lorem lacinia risus, ac commodo orci erat eu massa. Sed sit amet nulla ipsum. Donec felis mauris, vulputate sed tempor at, aliquam a ligula. Pellentesque non pulvinar nisi.</p>
							</div>
							<div class="tab-pane" id="messages">
								<h3>Messages <small>small text</small></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. Nulla tellus elit, varius non commodo eget, mattis vel eros. In sed ornare nulla. Donec consectetur, velit a pharetra ultricies, diam lorem lacinia risus, ac commodo orci erat eu massa. Sed sit amet nulla ipsum. Donec felis mauris, vulputate sed tempor at, aliquam a ligula. Pellentesque non pulvinar nisi.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor.</p>
							</div>
						</div>
					</div>
				</div><!--/span-->
						
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Member Activity</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
								<li>
									<a href="#">
										<img class="dashboard-avatar" alt="Usman" src="http://www.gravatar.com/avatar/f0ea51fa1e4fae92608d8affee12f67b.png?s=50"></a>
										<strong>Name:</strong> <a href="#">Usman
									</a><br>
									<strong>Since:</strong> 17/05/2012<br>
									<strong>Status:</strong> <span class="label label-success">Approved</span>                                  
								</li>
								<li>
									<a href="#">
										<img class="dashboard-avatar" alt="Sheikh Heera" src="http://www.gravatar.com/avatar/3232415a0380253cfffe19163d04acab.png?s=50"></a>
										<strong>Name:</strong> <a href="#">Sheikh Heera
									</a><br>
									<strong>Since:</strong> 17/05/2012<br>
									<strong>Status:</strong> <span class="label label-warning">Pending</span>                                 
								</li>
								<li>
									<a href="#">
										<img class="dashboard-avatar" alt="Abdullah" src="http://www.gravatar.com/avatar/46056f772bde7c536e2086004e300a04.png?s=50"></a>
										<strong>Name:</strong> <a href="#">Abdullah
									</a><br>
									<strong>Since:</strong> 25/05/2012<br>
									<strong>Status:</strong> <span class="label label-important">Banned</span>                                  
								</li>
								<li>
									<a href="#">
										<img class="dashboard-avatar" alt="Saruar Ahmed" src="http://www.gravatar.com/avatar/564e1bb274c074dc4f6823af229d9dbb.png?s=50"></a>
										<strong>Name:</strong> <a href="#">Saruar Ahmed
									</a><br>
									<strong>Since:</strong> 17/05/2012<br>
									<strong>Status:</strong> <span class="label label-info">Updates</span>                                  
								</li>
							</ul>
						</div>
					</div>
				</div><!--/span-->
						
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list-alt"></i> Realtime Traffic</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div id="realtimechart" style="height:190px;"></div>
							<p class="clearfix">You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
							<p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
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
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="tadas.virtualu.lt" target="_blank">Tadas Davidsonas</a> 2013</p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		
	</div><!--/.fluid-container-->
   <script>
                     $(document).ready(function() {
                    $('.edit').editable('edit', {
                        indicator : 'Saving...',
                        tooltip   : 'Click to edit...'
                 
                    });
                });
                </script>