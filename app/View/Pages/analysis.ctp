

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
                                                
                                                <?php  include('menu.ctp'); ?>
            
                                                
                                                
	
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
						<a href="#"><?php echo __('btn_purchases'); ?></a>
					</li>

				</ul>
			</div>
                        
                          
                        <div class="row-fluid sortable">  
                          <div class="box span12">
				<div class="box-header well normal-cursor" data-original-title>
					<h2><i class="icon-search"></i> Paieška</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
		<form  method="post" class="form-horizontal2">
                <?php //echo $this->Form->create(); ?>
		<fieldset>
		<div class="control-group">
<!--		<label for="searchquery" class="control-label">Ieškomas tekstas</label>
		<div class="controls"><input type="text" value="" id="searchquery" class="input-xlarge focused" name="searchquery"></div>-->
		</div>
		<div class="span3">
                
		<label for="type" class="control-label"><?php echo __('automobile'); ?></label>
                  <?php
//                        echo $this->Form->input('Car.auto', array(
//                             'options' => $list, 'label' => false,
//                           //  'empty' => '(choose one)'
//                         ));
                    ?>
		<div class="controls"><select name="car" style="width: 200px;" id="type" data-rel="chosen" class="input-xlarge"><option label="<?php echo $default_car ?>" value="<?php echo $default_car ?>"><?php echo $default_car ?></option>
            <?php
             //   $i = 0;
                foreach( $cars_list as $item ) { 
                    //$i++;
                    ?><option label="" style="color: black;" value="<?php echo $item;?>"><?php echo $item;?></option>;
<!--                    <option label="Ataskaita" value="5">Ataskaita</option>
                    <option label="Planai" value="6">Planai</option>
                    <option label="Šablonas" value="1">Šablonas</option>
                    <option label="Sutartis" value="2">Sutartis</option>-->
          <?php   } ?>
             ?>
                </select></div>
		</div>
		<div class="span3">
		<label for="category" class="control-label"><?php echo __('project'); ?></label>
		<div class="controls"><select name="project" style="width: 200px;" id="category" data-rel="chosen" class="input-xlarge"><option label="<?php echo $default_project; ?>" value="<?php echo $default_project; ?>"><?php echo $default_project; ?></option>
                  <?php
             //   $i = 0;
                foreach( $projects_list as $item ) { 
                    //$i++;
                    ?><option label="" style="color: black;" value="<?php echo $item;?>"><?php echo $item;?></option>;
<!--                    <option label="Ataskaita" value="5">Ataskaita</option>
                    <option label="Planai" value="6">Planai</option>
                    <option label="Šablonas" value="1">Šablonas</option>
                    <option label="Sutartis" value="2">Sutartis</option>-->
          <?php   } ?>
                        <!--<option label="Įvaizdinė medžiaga" value="7">Įvaizdinė medžiaga</option>
<option label="Mokymo medžiaga" value="6">Mokymo medžiaga</option>
<option label="Sutartys" value="5">Sutartys</option>-->

		</div>
		<div class="span3">
		<label for="state" class="control-label">Būsena</label>
		<div class="controls"><select name="state" id="state" data-rel="chosen" class="input-xlarge">
<!--                        <option label="- Nepasirinkta -" value="-1">- Nepasirinkta -</option>
<option label="Negalioja" value="0">Negalioja</option>
<option label="Galioja" value="1">Galioja</option>-->
                </select></div>
		</div>
		<div class="span3">
		<label for="date_from" class="control-label">Data nuo</label>
		<!--<div class="controls">-->
		<div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span><input type="text" value="" name="date_from" id="date_from" class="input-small datepicker"/></div>
		</div>
                <label for="date_from" class="control-label">Data iki</label>
		<div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span><input type="text" value="" name="date_to" id="date_to" class="input-small datepicker"/></div>
		<!--</div>-->
		</div>
		<div class="form-actions"><button type="submit" class="btn btn-primary"><i class="icon-white icon-search"></i> Ieškoti</button> <a class="btn" href="?search=reset"><i class="icon-refresh"></i> Išvalyti</a></div>
		</fieldset>
		</form>
                 <?php // echo $this->Form->end(); ?>
		</div>
	</div>
<!--</div>-->
				
			<div class="row-fluid sortable ui-sortable ">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo __('btn_purchases'); ?></h2>
						<div class="box-icon"><!--
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                                <div id="scrollable">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th><?php 
                                                                            echo __('Date');												 
                                                                       ?>
									</th>
                                                                        <th>
									<?php 
                                                                            	 echo __('autombile');
                                                                        ?>
									</th>
                                                                        <th>
									<?php 
                                                                            	 echo __('car_number');
                                                                        ?>
									</th>
								  	<th>
									<?php 
                                                                            	 echo __('fuel_type');
                                                                        ?>
									</th>
									<th>
									<?php 
                                                                            	 echo __('litres');
                                                                        ?>
									</th>
									<th>
										<?php 
                                                                            	 echo __('price');
                                                                                ?>
									</th>
									<th>
										<?php  echo __('sum_currency'); ?>
									</th>
									<th>
										<?php 
                                                                            	 echo __('note');
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
                                                                
                                                                
                                                                    

                                                                        foreach( $purchases as $item ) {
                                                                            
                                                                            
                                                                            echo "<tr>";
										printf('<td id = %s.Purchase.date class="center">%s</td> 
                                                                                    <td id = %s.Purchase.car class="center">%s</td>
                                                                                    <td id = %s.Purchase.car_number class="center">%s</td> 
                                                                                    <td id = %s.Purchase.type class="center">%s</td> 
                                                                                    <td id = %s.Purchase.liters class="center">%s</td> 
                                                                                    <td id =%s.Purchase.price class="center">%s</td>
                                                                                    <td id =%s.Purchase.sum class="center">%s</td>
										<td id =%s.Purchase.note class="center edit">%s</td>' 
                                                                                        ,$item[ 'Purchase' ][ 'purchase_id' ], $item[ 'Purchase' ][ 'date' ],
                                                                                        $item[ 'Car' ][ 'car_id' ], $item[ 'Car' ][ 'car' ],
                                                                                        $item[ 'Car' ][ 'car_id' ], $item[ 'Car' ][ 'car_number' ],
                                                                                        $item[ 'Purchase' ][ 'purchase_id' ], $item[ 'Purchase' ][ 'type' ],
                                                                                        $item[ 'Purchase' ][ 'purchase_id' ], $item[ 'Purchase' ][ 'liters' ],
                                                                                        $item[ 'Purchase' ][ 'purchase_id' ], $item[ 'Purchase' ][ 'price' ],
                                                                                        $item[ 'Purchase' ][ 'purchase_id' ], $item[ 'Purchase' ][ 'sum' ]
										,$item[ 'Purchase' ][ 'purchase_id' ], $item[ 'Purchase' ][ 'note' ]);
	
															
										echo '
											<td class="center">
										
										 ';
                                                                                    //$item['model'] = 'Purchase';
                                                                                    echo $this->Form->postLink('<i class="icon-trash icon-white"></i>', 
                                                                                            array('action' => 'delete',$item['Purchase']['purchase_id'], 'Purchase'),
                                                                                            array('confirm' =>  __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger', 'escape' => false)); 
                                                                                                                                                             
									
										echo '</td>
										';	
                                                                            echo "</tr>";
                                              
                                                                        }

                                                                
      
								?>
						  
						  
							
						  </tbody>
                                                  
					  </table>
                                              <div id="metric_table">      
                                         <?php 
                                            echo "<div id = 'suma' align = 'right'>";?> <b><?php echo __('sumOfLT'); ?>:</b> &nbsp; &nbsp;  
                                         <?php 
                                         
                                            echo $sumOfLT;
//                                             foreach( $sumOfLT as $sumLT ) {
//                                                echo $sumLT[ 'Purchase' ][ 'total' ];
//                                              } "</div>"; 
                                           
                                             
                                        ?>
                                           LT 
                                           </div>
                                          </div>
                                          </div>          
					</div>
                                    
                                    
                                    
				</div><!--/span-->
                               
                               
		
		<div class="row-fluid sortable ">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo __('btn_distances'); ?></h2>
						<div class="box-icon">
<!--							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
-->							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                                <div id="scrollable">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>      <th>
									<?php 
                                                                            	 echo __('Date');
                                                                        ?>
									</th>
								  <th><?php 
                                                                            echo __('car');												 
                                                                       ?>
									</th>
                                                                        <th>
									<?php 
                                                                            	 echo __('car_number');
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
						  
						  		
                                                                
                                                               
                                                             

                                                                <?php foreach( $distances as $distance ) {
                                                                            
                                                                            
                                                                            echo "<tr>";
										printf('<td distance_id = %s.cars.car class="center ">%s<td distance_id = %s.cars.car_number class="center ">%s</td> <td distance_id = %s.distances.date class="center ">%s</td> <td distance_id = %s.distances.project class="center ">%s</td> <td distance_id =%s.distances.km_begin class="center ">%s</td> <td distance_id =%s.distances.km_end class="center ">%s</td>
										<td distance_id =%s.distances.from_location class="center ">%s</td> <td distance_id =%s.distances.to_location class="center ">%s</td> <td id =%s.Distance.purpose class="center edit">%s</td> <td distance_id =%s.distances.km class="center ">%s</td>' , $distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Distance' ][ 'date' ],$distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Car' ][ 'car' ], $distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Car' ][ 'car_number' ],
                                                                                        $distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Project' ][ 'project' ],$distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Distance' ][ 'km_begin' ],$distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Distance' ][ 'km_end' ]
										,$distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Location' ][ 'name' ],$distance[ 'Distance' ][ 'distance_id' ], $distance[ 'To_location' ][ 'name' ],$distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Distance' ][ 'purpose' ],$distance[ 'Distance' ][ 'distance_id' ], $distance[ 'Distance' ][ 'km' ]);
	
															
										echo '
											<td class="center">
										
										 ';
                                                                      
                                                                                    echo $this->Form->postLink('<i class="icon-trash icon-white"></i>', 
                                                                                            array('action' => 'delete',$distance['Distance']['distance_id'], 'Distance'),
                                                                                            array('confirm' => __('Are you sure you want to delete this record?'), 'class' => 'btn btn-danger', 'escape' => false)); 
                                                                                                                                                  
									
										echo '</td>
										';	
                                                                            echo "</tr>";
                                                                            
                                                                            
                                                                      }
                                                                      
                                                                   
								?>
                                                           
						  
						
						  </tbody>
                                                  
					  </table> 
                                      <table id = "metric_table" align ="right">
                                          <tr>
                                              <td>
                                                 <?php echo "<div id = 'suma' align = 'right'>";?> <b><?php echo __('sumOfKm'); ?>:</b> &nbsp; &nbsp;  </div>
                                              </td>
                                              <td>
                                                  <div id="suma" align="left">
                                                   <?php 
                                                    foreach( $sumOfKm as $sumKm ) {
                                                       echo $sumKm[ 'Distance' ][ 'total' ];
                                                     }   ?>
                                                   km       
                                                </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <?php  echo "<div id = 'suma' align = 'right'>";?> <b><?php echo __('litres_consumed'); ?>:</b> &nbsp; &nbsp;  
                                              </td>
                                              
                                              <td>
                                                  <div id="suma" align="left">
                                                   <?php 
                                                    echo $sumOfLitres; ?>
                                                   l      
                                                </div>
                                              </td>
                                              
                                             
                                          </tr>
                                        
                                       
                                       
                                   </table> 
    
                                       
				</div><!--/span-->
			
			</div><!--/row-->		
			

			
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
	
</div>
			
</div><!--/row-->
			
			
			
			
		
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
			<p class="pull-left">&copy; <a href="tadas.virtualu.lt" target="_blank">Tadas Davidsonas, Mindaugas Tautkus</a> 2014</p>
			<p class="pull-right"><?php echo __('powered_by'); ?>: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
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