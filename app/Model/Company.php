<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company
 *
 * @author Tadas
 */
class Company extends AppModel {
    //put your code here
    public $primaryKey = 'company_id';
    public $hasMany = array('User', 'Car', 'Project', 'Location');

    public $validate = array(
        'company_name' => array(
            'rule'    => 'notEmpty',
            'message' => 'fill the field'
        ),
         'company_code' => array(
            'rule'    => 'notEmpty',
            'message' => 'fill the field'
        )
    );
    
   
    
}

?>
