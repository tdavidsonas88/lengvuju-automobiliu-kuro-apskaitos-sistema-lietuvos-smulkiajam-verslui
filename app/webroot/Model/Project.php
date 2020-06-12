<?php

    class Project extends AppModel{
        
        public $validate = array(
            
            'project' => array(
                'rule'    => 'notEmpty',
                'message' => 'fill the field'
             )
            
        );

        //put your code here
    }
?>