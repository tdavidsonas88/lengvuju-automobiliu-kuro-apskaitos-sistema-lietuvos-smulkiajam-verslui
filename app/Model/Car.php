<?php

    class Car extends AppModel{

        //put your code here
         public $primaryKey = 'car_id';
         
         public $belongsTo = 'Company';
         public $hasMany = array(
            'Purchase'  
//             => array(
//                'className' => 'Purchase',
//                'foreignKey' => 'purchase_id'
//            )
             , 'Distance'
              => array(
                'className' => 'Distance',
                'foreignKey' => 'distance_id'
            ));
      //    public $actsAs = array('Containable');
        // public $hasMany = 'Distance';
                 
                 
        // public $validationDomain = 'validation';
         
//        public $hasMany = array('Distance');
//        
//       
        
         public $validate = array(
            
            'car' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            'car_number' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            'fuel_rate' => array(
                
                'notEmptyFuel_rate' => array(
                         'rule'    => 'notEmpty',
                          'message' => 'fill the field'
                 ),
                'isNumberFuel_rate' => array(
                         'rule'    => array('decimal'),
                          'message' => 'Enter number'
                 )                           
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
        
        var $virtualFields = array(    
            'car_unique_name' => 'CONCAT(Car.car, " | ", Car.car_number)'
        );
    }
?>
