      
        <?php 
            if($role == 'manager'){?>
                 <li><?php  echo $this->Html->link( '<i class="icon-wrench" title='.__('btn_preferences').'></i> <span class="hidden-tablet">'.__('btn_preferences').'</span>',
                    array('controller' => 'pages', 'action' => 'preferences' ),
                        array('class' => 'ajax-link', 'escape' => false)
                ); ?>
                </li>



                  <li><?php  echo $this->Html->link( '<i class="icon-map-marker" title='.__('locations').'></i> <span class="hidden-tablet">'.__('locations').'</span>',
                            array('controller' => 'pages', 'action' => 'locations' ),
                                array('class' => 'ajax-link', 'escape' => false)
                ); ?>
                </li>


<!--                <li><?php  echo $this->Html->link( '<i class="icon-shopping-cart" title='.__('btn_fuel_buy').'></i> <span class="hidden-tablet">'.__('btn_fuel_buy').'</span>',
                            array('controller' => 'pages', 'action' => 'purchases' ),
                                array('class' => 'ajax-link', 'escape' => false)
                ); ?>
                </li>-->


<!--                <li><?php  echo $this->Html->link( '<i class="icon-random" title='.__('btn_distances').'></i> <span class="hidden-tablet">'.__('btn_distances').'</span>',
                            array('controller' => 'pages', 'action' => 'distances' ),
                                array('class' => 'ajax-link', 'escape' => false)
                ); ?>
                </li>       -->

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
                    <li><?php  echo $this->Html->link( '<i class="icon-signal" title='.__('btn_purchases_distances').'></i> <span class="hidden-tablet">'.__('btn_purchases_distances').'</span>',
                    array('controller' => 'pages', 'action' => 'analysis' ),
                    array('class' => 'ajax-link', 'escape' => false)
                ); ?>
                </li>

                <li><?php  echo $this->Html->link( '<i class="icon-print" title='.__('btn_reports').'></i> <span class="hidden-tablet">'.__('btn_reports').'</span>',
                            array('controller' => 'pages', 'action' => 'reports' ),
                                array('class' => 'ajax-link', 'escape' => false)
                ); ?>
                </li>
      <?php  }else{    ?>
        
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
       
      <?php } ?>
