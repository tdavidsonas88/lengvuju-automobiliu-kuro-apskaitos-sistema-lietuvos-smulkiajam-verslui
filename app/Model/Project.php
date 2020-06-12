<?php

    class Project extends AppModel{
        
        public $primaryKey = 'project_id';
        public $hasMany = array('Distance'
                  => array(
                'className' => 'Distance',
                'foreignKey' => 'distance_id')
            );
   //     public $actsAs = array('Containable');
         public $belongsTo = 'Company';
        
//        public $hasMany = array(
//        'Distance' => array(
//            'className' => 'Distance'
//        )
//    );
        
        public $validate = array(
            
            'project' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             )
            
        );

        //put your code here
    }
?>