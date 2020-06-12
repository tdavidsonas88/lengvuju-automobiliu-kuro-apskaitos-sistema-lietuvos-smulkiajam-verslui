<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
          // First, we override save(). On a successful save(),  
    // afterSave() is called. But we want something to be  
    // called on a NOT-successful save(). 
    function save($data = null, $validate = true, $fieldList = array()) { 
        $returnval = parent::save($data, $validate, $fieldList); 
        if(false === $returnval) {
           
            $this->afterSaveFailed(); 
        } 
         //$this->Session->setFlash(__('email_duplicate'));
        return $returnval; 
    } 

    // This is a stub which is called after a save has failed.  
    // You will override this in the model. 
    function afterSaveFailed() { 
    } 

    // This is a (MySQL specific) check to see if a  
    // constraint was violated as the last error. If it was, 
    // the VALUE of the field which failed is returned. 
    // this is not ideal, but will do for most situations. 
    // The logic to work out the specific field which failed 
    // requires more MySQL specific SQL (such as 'show keys from...' 
    // so I shall leave it out. Most tables only have one  
    // unique constraint anyway, although our example above 
    // has 2. 
    function checkFailedConstraint() { 
        $db =& ConnectionManager::getDataSource($this->useDbConfig);  
        $lastError = $db->lastError(); 

        // this is MYSQL SPECIFIC 
        if(preg_match('/^\d+: Duplicate entry \'(.*)\' for key \d+$/i', $lastError, $matches)) { 
            return $matches[1]; 
        } 

        return false; 
    } 

}
