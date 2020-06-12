<?php

    class Purchase extends AppModel{
        
       public $primaryKey = 'purchase_id';
        
        public  $belongsTo = 'Car';
        public $validate = array(
            
            'date' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            'type' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             ),
            
            'price' => array(
                
                'notEmptyPrice' => array(
                         'rule'    => 'notEmpty',
                          'message' => 'fill the field'
                 ),
                'isNumberPrice' => array(
                         'rule'    => array('decimal'),
                          'message' => 'Enter number'
                 )                           
             ),
            'liters' => array(
                
                'notEmptyLiters' => array(
                         'rule'    => 'notEmpty',
                          'message' => 'fill the field'
                 ),
                'isNumberLiters' => array(
                         'rule'    => array('decimal'),
                          'message' => 'Enter number'
                 )                           
             )
        );
        
    }

?>
