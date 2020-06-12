<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
    
        
   
    
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
                
                echo $this->Html->css('jquery-ui-1.8.21.custom');
                 
                echo $this->Html->css('fullcalendar');
                 
                echo $this->Html->css('fullcalendar.print');
                
               echo $this->Html->css('chosen');
                
                echo $this->Html->css('uniform.default');
                
                echo $this->Html->css('colorbox');
                
                echo $this->Html->css('jquery.cleditor');
                
                echo $this->Html->css('jquery.noty');
                
                echo $this->Html->css('noty_theme_default');
                
                echo $this->Html->css('elfinder.min');
                
                echo $this->Html->css('elfinder.theme');
                
                echo $this->Html->css('jquery.iphone.toggle');
                
                echo $this->Html->css('opa-icons');
                
                echo $this->Html->css('uploadify');
                
                 
                
                
                
              ?>  
     <style type="text/css">
            .sidebar-nav {
                padding: 9px 0;
                }
	</style>   

        
        
      
       
        
        
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
	<?php //echo $this->element('sql_dump'); 
        
        
              
 
                
                echo $this->Js->writeBuffer(); // Write cached scripts

        
        
        ?>
    
</body>
</html>

<?php
 echo $this->Html->script('jquery-1.7.2.min');
                
                echo $this->Html->script('jquery-ui-1.8.21.custom.min');
                
                echo $this->Html->script('bootstrap-transition');
                echo $this->Html->script('bootstrap-alert');
                
                 echo $this->Html->script('bootstrap-modal');
                
                echo $this->Html->script('bootstrap-dropdown');
                
                echo $this->Html->script('bootstrap-scrollspy');
                echo $this->Html->script('bootstrap-tab');
                
                
                 echo $this->Html->script('bootstrap-tooltip');
                
                echo $this->Html->script('bootstrap-popover');
                
                echo $this->Html->script('bootstrap-button');
                echo $this->Html->script('bootstrap-collapse');
                
                
                 echo $this->Html->script('bootstrap-carousel');
                
                echo $this->Html->script('bootstrap-typeahead');
                
                echo $this->Html->script('bootstrap-tour');
                echo $this->Html->script('jquery.cookie');
                
                 echo $this->Html->script('fullcalendar.min');
                
                echo $this->Html->script('jquery.dataTables.min');
                
                echo $this->Html->script('excanvas');
                echo $this->Html->script('jquery.flot.min');
                
                
                 echo $this->Html->script('jquery.flot.pie.min');
                echo $this->Html->script('jquery.flot.stack');
                
                 echo $this->Html->script('jquery.flot.resize.min');
                
                echo $this->Html->script('jquery.chosen.min');
                
                echo $this->Html->script('jquery.uniform.min');
                echo $this->Html->script('jquery.colorbox.min');
                
                 echo $this->Html->script('jquery.cleditor.min');
                
                echo $this->Html->script('jquery.noty');
                
                echo $this->Html->script('jquery.elfinder.min');
                echo $this->Html->script('jquery.raty.min');
                
                
                 echo $this->Html->script('jquery.iphone.toggle');
                echo $this->Html->script('jquery.autogrow-textarea');
                
                 echo $this->Html->script('jquery.uploadify-3.1.min');
                
                echo $this->Html->script('jquery.history');
                
                echo $this->Html->script('charisma');
                
                 echo $this->Html->script('jquery.jeditable');
                 
                 ?>


 <script>
                     $(document).ready(function() {
                         

                
                  		
                            $("#PurchaseLiters").keyup(calculateSum);
                            $("#PurchasePrice").keyup(calculateSum);
                            
                             $("#DistanceKmBegin").keyup(calculateDistance);
                            $("#DistanceKmEnd").keyup(calculateDistance);
                            
                            
                            $('.edit').editable('edit', {
                                indicator : 'Saving...',
                                tooltip   : 'Click to edit...'

                            });


                          //  $("#datepicker").datepicker();


                        });

                        function calculateSum(e)
                        {
                                $('#PurchaseSum').val(($('#PurchaseLiters').val() * $('#PurchasePrice').val()).toFixed(2));
                        }
                        
                        function calculateDistance(e)
                        {
                                $('#DistanceKm').val($('#DistanceKmEnd').val() - $('#DistanceKmBegin').val());
                        }
                        
</script>
                         
                         
