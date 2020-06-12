<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location
 *
 * @author Tadas
 */
class Location extends AppModel{
        
        public $primaryKey = 'location_id';
        
        public $belongsTo = 'Company';
        public $hasMany = array(
            'Distance' => array(
                'foreignKey'    =>  'from_location_id'
            ),
            'Distance' => array(
                'foreignKey'    =>  'to_location_id'
            )
        );
       
        public $validate = array(
            
            'name' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             )
            
        );

        //put your code here
    }

?>
