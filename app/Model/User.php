<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registration
 *
 * @author Tadas_paprastas
 */
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel{
    
     public $primaryKey = 'user_id';
     public $belongsTo = 'Company';
     
     var $virtualFields = array(    
            'user_unique_name' => 'CONCAT(User.name, " ", User.surname)'
     );
     
 

public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}

    
    public $validate = array(
        'email' => array (
            'NotEmptyEmail' => array(
                'rule' => 'notEmpty',
                'message' => 'fill the field'
            ),
            'validEmail' => array(
                'rule'    => array('email', true),
                'message' => 'not valid email' 
            )      
        ),
        'email1' => array (
            'NotEmptyEmail' => array(
                'rule' => 'notEmpty',
                'message' => 'fill the field'
            ),
            'validEmail' => array(
                'rule'    => array('email', true),
                'message' => 'not valid email' 
            )      
        ),
        'email2' => array (
            'NotEmptyEmail' => array(
                'rule' => 'notEmpty',
                'message' => 'fill the field'
            ),
            'validEmail' => array(
                'rule'    => array('email', true),
                'message' => 'not valid email' 
            )      
        ),
        'password' => array(
            'NotEmptyPassword' =>array(
                   'rule'    => 'notEmpty',
                    'message' => 'fill the field'
             ),
            'passwordlength' => array('rule' => array('between', 6, 30),'message' => 'Enter 6-30 chars'),
            'passwordequal'  => array('rule' => 'checkpasswords','message' => 'Passwords do not match')
        ),
        'password_confirm' => array(
            'rule'    => 'notEmpty',
            'message' => 'fill the field'
        ),
        'name' => array(
            'rule'    => 'notEmpty',
            'message' => 'fill the field'
        ),
         'surname' => array(
            'rule'    => 'notEmpty',
            'message' => 'fill the field'
        ),
        
        'current_password' => array(
        'rule' => 'checkCurrentPassword',
        'message' => 'wrong password'
        ),
        
        'password2' => array(
            'rule' => 'passwordsMatch',
            'message' => 'passwords do not match',
        ),
        
        'password3' => array(
            'rule' => 'justCheckPassword',
            'message' => 'wrong password',
        ),
        'email2' => array(
            'rule' => 'emailsMatch',
            'message' => 'emails_do_not_match',
        ),
    );
    
    
     function emailsMatch()
    {
       if(strcmp($this->data['User']['email1'],$this->data['User']['email2']) == 0 )
        {
            return true;
        }
        return false;
    }
    
     function passwordsMatch()
    {
       if(strcmp($this->data['User']['password1'],$this->data['User']['password2']) == 0 )
        {
            return true;
        }
        return false;
    }
    
    
    function changePassword($id = null, $hash = null)
    {
        $success = false;
        if ($id && $hash)
        {
            $this->id = $id;
            $success = $this->saveField('password', $hash);
        }
        return true;
    }
    
    function justCheckPassword(){
         $password_encrypted = AuthComponent::password($this->data['User']['password3']);
        $user = $this->find('first', array('conditions' => array(
            'user_id' => $this->data['User']['user_id'],
            'password' => $password_encrypted)));
        if ($user) {
            return true;
            
        } else {
            return false;
        }
    }
    
    // also changes the password if it's possible
    function checkCurrentPassword(){

         $password_encrypted = AuthComponent::password($this->data['User']['current_password']);
        $user = $this->find('first', array('conditions' => array(
            'User.user_id' => $this->data['User']['user_id'],
            'User.password' => $password_encrypted)));
        if ($user) {
            if(strcmp($this->data['User']['password1'],$this->data['User']['password2']) == 0 ){
                $id = $this->data['User']['user_id'];
                if ($id && $password_encrypted)
                {
                    $this->id = $id;
                    $success = $this->saveField('password', $this->data['User']['password1']);
                }
                return true;
            }else{return true;}
            
        } else {
            return false;
        }

    }
    
    
    function checkpasswords()
    {
       if(strcmp($this->data['User']['password'],$this->data['User']['password_confirm']) == 0 )
        {
            return true;
        }
        return false;
    }

    
    
    function afterSaveFailed() { 
        $failed_constraint = $this->checkFailedConstraint(); 
        if($failed_constraint) { 
            // player has 2 constraints: (email), and (first_name,last_name,date_of_birth,school_id). 
            // let's see if it was the email. 
            if ($failed_constraint == $this->data['User']['email']) { 
                $this->invalidate('email_duplicate'); 
                $this->Session->setFlash(__('email_duplicate'));
            } else { 
                $this->invalidate('everything_else_duplicate'); 
                $this->Session->setFlash(__('everything_else_duplicate'));
            } 
        } 
    } 
    
    
   
    

}

?>
