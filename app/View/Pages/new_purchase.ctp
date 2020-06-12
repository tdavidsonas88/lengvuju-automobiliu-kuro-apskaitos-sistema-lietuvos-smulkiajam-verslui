

<?php
     echo $this->Html->script('jquery-1.7.2.min');
  //   echo FULL_BASE_URL;
?>
 <script>
 $(document).ready(function() {
                         
               //$("select#CarAuto").onLoad(getCarFuelType);          
                $("select#CarAuto").change(getCarFuelType);
//              //   $("select#DistanceAuto").change(getLatestToLocation);
//
//
                $.post("getCarFuelType", { auto_nr: $('#CarAuto').val()},function(data) {
                 $('#PurchaseType').val(data);
                });

//                $.post("getLatestToLocation", { auto_nr: $('#DistanceAuto').val()},function(data) {
//                 $('#DistanceFromLocation').val(data);
//                });
//
//                $("#DistanceFromLocation").autocomplete('<?php echo FULL_BASE_URL ?>'+"/Pages/find", {
//                 minChars: 1, matchInside: false
//                 });
//                 $("#DistanceToLocation").autocomplete('<?php echo FULL_BASE_URL ?>'+"/Pages/find", {
//                 minChars: 1, matchInside: false
//                 });

//                                

         });


         function getCarFuelType(e)
         {
             //   if($('#CarAuto').val() != '' || $('#CarAuto').val() != null){
                    $.post("getCarFuelType", { auto_nr: $('#CarAuto').val()},function(data) {
                    $('#PurchaseType').val(data);
                   });
             //   }
         }

                      
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
						<i class="icon-user"></i><span class="hidden-phone"><?php echo $user; ?></span>
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
												
						<?php include('menu.ctp'); ?>
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
						<a href="#"><?php echo __('btn_new_purchase'); ?></a> 
					</li>
				</ul>
			</div>
			
			

				<div class ="row-fluid ">
				
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php  echo __('btn_new_purchase'); ?></h2>
						<div class="box-icon">
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					
						  <fieldset>
                                                      
                                                      
                                                     
                                                      <?php echo $this->Form->create(); ?>
                                                      <div class="control-group form-horizontal">
                                                          <label class="control-label"><?php echo __('date'); ?></label>
                                                          <div  class="controls form-horizontal">
                                                            <?php  echo $this->Form->input('Purchase.date', array('label' => false,
                                                                'class' => 'datepicker', 'type' => 'text') ); ?>
                                                          </div> 
                                                      </div>
                                                        <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('automobile'); ?></label>
                                                           <div class="controls form-horizontal">
                                                               <?php
                                                                    if(!empty($list)){
                                                                        echo $this->Form->input('Car.auto', array(
                                                                             'options' => $list, 'label' => false,
                                                                           //  'empty' => '(choose one)'
                                                                         ));
                                                                    }
                                                                ?>
                                                               
                                                               
                                                               
                                                               
                                                               <?php // echo $this->Form->input('Purchase.car_id', array('value' => '14', 'label' => false, 'type' => 'hidden')); ?>
                                                                <?php  echo $this->Form->input('Distance.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                            </div>
                                                      </div>
                                                      <div class="control-group form-horizontal">
                                                                        <label class="control-label" for="focusedInput"><?php echo __('fuel_type'); ?></label>
                                                           <div class="controls form-horizontal">
                                                               <?php
                                                                     if(!empty($list)){
                                                                        echo $this->Form->input('Purchase.type', array(
                                                                           //  'options' => $list2, 
                                                                            'readonly' => 'readonly',
                                                                            'default'   => $car_fuel_type,
                                                                            'label' => false,
                                                                         //    'empty' => '(choose one)'
                                                                         ));
                                                                     }
                                                                ?>  
                                                                <?php  echo $this->Form->input('Purchase.user_id', array('value' => $user_id, 'label' => false, 'type' => 'hidden')); ?>
                                                            </div>
                                                      </div>
                                                      
                                                      
                                                      <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('liters'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('Purchase.liters', array('label' => false) ); ?>
                                                           </div>
                                                      </div>
                                                      
                                                      
                                                      <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('price'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('Purchase.price', array('label' => false) ); ?>
                                                               <?php  echo $this->Form->input('Purchase.currency', array('value' => 'LT', 'label' => false, 'type' => 'hidden')); ?>
                                                           </div>
                                                      </div>
                                                      
                                                       <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('sum'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('Purchase.sum', array('type' => 'text',
                                                                    'readonly' => 'readonly', 'label' => false) ); ?>
                                                           </div>
                                                      </div>
                                                      
                                                      
                                                       <div class="control-group form-horizontal">
                                                           <label class="control-label" for="focusedInput"><?php echo __('note'); ?></label>
                                                           <div class="controls form-horizontal">
                                                                <?php  echo $this->Form->input('Purchase.note', array('label' => false, 'class' => 'focused', 'type' => 'textarea') ); ?>
                                                           </div>
                                                      </div>
                                                      
                                                      
                                                                        
                                                          
                                                
							

							<div class="form-actions">
                                                            
                                                            <p class="center">
                                                                    <button type="reset" class="btn"><?php echo __('cancel'); ?></button>
                                                                    <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
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
			<p class="pull-left">&copy; <a href="tadas.virtualu.lt" target="_blank">Tadas Davidsonas, Mindaugas Tautkus</a> 2014</p>
			<p class="pull-right"><?php echo __('powered_by'); ?>: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		
	</div><!--/.fluid-container-->
          