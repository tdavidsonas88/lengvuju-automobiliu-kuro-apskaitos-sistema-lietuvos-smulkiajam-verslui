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
    /*
     * In cakephp there is no default way for the translation of the validation
     *  messages, that show up under the input fields. But it is pretty easy to 
     * get their translation. For that it is just necessary to create AppModel.php 
     * file in Model directory for cakephp 2.x, and app_model.php in app folder for 
     * cakephp 1.3 - with the following content
     * 
     * After adding this if we write the translation of our validation message in .po 
     * files, then they will be translated on the page as with another text included 
     * in __() function.
     */
    function invalidate($field, $value = true){
        parent::invalidate($field, $value);
        $this->validationErrors[$field] = __($value);
    }

}
