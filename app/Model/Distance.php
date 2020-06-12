<?php

    class Distance extends AppModel{
        
          public  $primaryKey = 'distance_id';
        
         public  $belongsTo = array('Car'
             , 'Project', 
             'Location' => array(
                 'className' => 'Location',
                 'foreignKey'   => 'from_location_id'
            ), 
             'To_location' =>  array(
                 'className' => 'Location',
                 'foreignKey'   =>  'to_location_id'
             )
        );
         
          
        public $validate = array(
            
            'auto' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            'date' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
             'project' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            'km_begin' => array(
                
                'notEmptyKm_begin' => array(
                         'rule'    => 'notEmpty',
                          'message' => 'fill the field'
                 ),
                'isNumberKm_begin' => array(
                         'rule'    => array('decimal'),
                          'message' => 'Enter number'
                 )                           
             ),
            
            'km_end' => array(
                
                'notEmptyKm_end' => array(
                         'rule'    => 'notEmpty',
                          'message' => 'fill the field'
                 ),
                'isNumberKm_end' => array(
                         'rule'    => array('decimal'),
                          'message' => 'Enter number'
                 )                           
             ),
            'from_location' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            'to_location' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            'fuel_left' => array(
                
                'notEmptyFuel_left' => array(
                         'rule'    => 'notEmpty',
                          'message' => 'fill the field'
                 ),
                'isNumberFuel_left' => array(
                         'rule'    => array('decimal'),
                          'message' => 'Enter number'
                 )                           
             )
        );
        

    }
?>
