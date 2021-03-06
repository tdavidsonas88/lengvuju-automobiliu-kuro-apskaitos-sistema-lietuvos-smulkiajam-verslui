<?php 

class UsersController extends AppController {
    
    
  //   var $components=array("Email","Session");
     var $helpers = array('Html', 'Form', 'Translation', 'Session');
    
    public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('register'); // Letting users register themselves
    $this->Auth->allow('forgot');
    $this->Auth->allow('login');
    $this->Auth->allow('reset');
    $this->Auth->allow('new_user_complete_registration');
    $this->Auth->allow('new_user_confirm');
}

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                
                if($this->request->data['User']['remember_me'] != null){
                    if ($this->request->data['User']['remember_me'] == 1) {
                    // remove "remember me checkbox"
                    unset($this->request->data['User']['remember_me']);

                    // hash the user's password
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);

                    // write the cookie
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                }
                }
                    // did they select the remember me checkbox?
                
                
                
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid_username_or_password,_try_again'));
            }
        }
    }
    
    
    
    
    

    public function logout() {
        
        // clear the cookie (if it exists) when logging out
         $this->Cookie->delete('remember_me_cookie');
        $this->redirect($this->Auth->logout());
    }
    

    
    public function index() {
       
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
        
        if ($this->request->is('post')) {
            
            if ($this->User->validates()) {    
                if ($this->Auth->login()) {
                    
                     $userId = $this->Auth->user('user_id');
                    if($this->request->data['User']['remember_me'] != null){
                            if ($this->request->data['User']['remember_me'] == 1) {
                            // remove "remember me checkbox"
                            unset($this->request->data['User']['remember_me']);

                            // hash the user's password
                            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);

                            // write the cookie
                            $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                        }
                    }
                    
                    // jeigu vartotojas aktyvuotas tuomet jį prijungti prie sistemos
                    
                    
                    $user_status = $this->User->query("SELECT active FROM users AS User WHERE user_id = '$userId'");
                    
                   
                //    debug($user_status);

                    //echo $user_status[0]['User']['active'];
                    
                    if($user_status['0']['User']['active']){
                        $this->redirect($this->Auth->redirect());
                    }else{
                     // echo  $user_status[0]['User']['active'];
                        $this->Session->setFlash(__('please_login_to_your_email_and_confirm_your_registration'));
                       //  $this->Session->setFlash(__($user_status[0]['User']['active']));
                    }
                    
                } else {
                    $this->Session->setFlash(__('Invalid_username_or_password_try_again'));
                }
            }
         }
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid_user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function register() {
        if ($this->request->is('post')) {
            
           
            $this->loadModel('Company');
            $company_data = $this->request->data('Company');
            
           
           // debug($company_data);
            $this->Company->create();
            $this->Company->save($company_data);
            
            $company_id = $this->Company->find('first',array(
                'fields'    =>  array('company_id'),
                'conditions'    =>  array('Company.company_code' => $company_data['company_code'])
            ));
            
            
            $user_data = $this->request->data;
            
           // debug($company_id);
           
            $user_data['User']['company_id'] = $company_id['Company']['company_id'];
            
            $this->User->create();
           // debug($user_data);
           // debug($this->request->data);
            
            if ($this->User->save($user_data)) {
                $this->Session->setFlash(__('The_user_has_been_registered_please_login_to_your_email
                    account_to_confirm_the_registration'));
                $email=$this->data['User']['email'];
                $fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
                if($fu)
                {
              //      debug($fu);
                    if(!$fu['User']['active'])
                    {
                        $key = Security::hash(String::uuid(),'sha512',true);
                        $hash=sha1($fu['User']['name'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'new_user_confirm'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);
                        //debug($url);
                        $user_id = $fu['User']['confirmation_code']=$key;
                      //  $this->User->user_id=$user_id;
                        
//                        $key = mysql_real_escape_string($key);
//                        $user_id = mysql_real_escape_string($user_id);
//                        $result = $this->User->query("Update users SET confirmation_code = '$key' WHERE user_id = '$user_id'");
//                        debug($result);
                      //  $this->User->saveField('confirmation_code',$fu['User']['confirmation_code']);
                        if($this->User->saveField('confirmation_code',$fu['User']['confirmation_code'])){
   //                      if($this->User->query){
                            //============Email================//
                            /* SMTP Options */
                            $this->Email->smtpOptions = array(
                                'port'=>'465',
                                'timeout'=>'30',
                                'host' => 'ssl://smtp.gmail.com',
                                'username'=>'programu.testavimas@gmail.com',
                                    'password'=> 'KaunasVilnius'
                                  );
                              $this->Email->template = 'confirm_registration';
                            $this->Email->from    = 'Your Email <accounts@example.com>';
                            $this->Email->to      = $fu['User']['name'].'<'.$fu['User']['email'].'>';
                            $this->Email->subject = 'Confirm your account registration';
                            $this->Email->sendAs = 'both';
 
                                $this->Email->delivery = 'smtp';
                                $this->set('ms', $ms);
                                $this->Email->send();
                                $this->set('smtp_errors', $this->Email->smtpError);
                            $this->Session->setFlash(__('Check_Your_Email_To_Activate_Your_Account', true));
 
                            //============EndEmail=============//
                        }
                        else{
                            $this->Session->setFlash(__("Error_Generating_Account_Activation_Link"));
                        }
                    }
                    else
                    {
                        $this->Session->setFlash(__('This_Account_is_not_Active_yet_Check_Your_mail_to_activate_it'));
                    }
                }
                else
                {
                    $this->Session->setFlash(__('Email_does_Not_Exist'));
                }
                
                
                
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The_user_could_not_be_saved_Please_try_again.'));
            }
        }
    }
    
        
    public function forgot(){
        
        
        //$this->layout="signup";
        $this->User->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['User']['email']))
            {
                $this->Session->setFlash(__('Please_Provide_Your_Email_Address_that_You_used_to_Register_with_Us'));
            }
            else
            {
                $email=$this->data['User']['email'];
                $fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
                if($fu)
                {
                    //debug($fu);
                    if($fu['User']['active'])
                    {
                        $key = Security::hash(String::uuid(),'sha512',true);
                        $hash=sha1($fu['User']['name'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);
                        //debug($url);
                        $fu['User']['confirmation_code']=$key;
                        $this->User->id=$fu['User']['user_id'];
                        if($this->User->saveField('confirmation_code',$fu['User']['confirmation_code'])){
 
                            //============Email================//
                            /* SMTP Options */
                            $this->Email->smtpOptions = array(
                                'port'=>'465',
                                'timeout'=>'30',
                                'host' => 'ssl://smtp.gmail.com',
                                'username'=>'programu.testavimas@gmail.com',
                                'password'=> 'KaunasVilnius'
                                  );
                              $this->Email->template = 'resetpw';
                            $this->Email->from    = 'Your Email <accounts@example.com>';
                            $this->Email->to      = $fu['User']['name'].'<'.$fu['User']['email'].'>';
                            $this->Email->subject = 'Reset Your Example.com Password';
                            $this->Email->sendAs = 'both';
 
                                $this->Email->delivery = 'smtp';
                                $this->set('ms', $ms);
                                $this->Email->send();
                                $this->set('smtp_errors', $this->Email->smtpError);
                            $this->Session->setFlash(__('Check_Your_Email_To_Reset_your_password', true));
 
                            //============EndEmail=============//
                        }
                        else{
                            $this->Session->setFlash(__("Error_Generating_Reset_link"));
                        }
                    }
                    else
                    {
                        $this->Session->setFlash(__('This_Account_is_not_Active_yet_Check_Your_mail_to_activate_it'));
                    }
                }
                else
                {
                    $this->Session->setFlash(__('Email_does_Not_Exist'));
                }
            }
        }
        
        
        
    }
    /**
     * 
     * @param type $token
     */
    function new_user_confirm($token=null){
       $this->User->recursive=-1;
        if(!empty($token)){
            $u=$this->User->findByconfirmation_code($token);
            if($u){
              $user_id = $this->User->id=$u['User']['user_id'];
               // $key = mysql_real_escape_string($key);
//                      $user_id = mysql_real_escape_string($user_id);
//                      $this->User->query("Update users SET active = '1' WHERE user_id = '$user_id'");
                if($this->User->saveField('active', '1'))
                        {
                             $this->Session->setFlash(__('registration_confirmation_completed_successfully'));
                             $this->redirect(array('action' => 'index'));
                        }
                
            }
        }  
    }
    
    
    function new_user_complete_registration($token=null){
       $this->User->recursive=-1;
        if(!empty($token)){
            $u=$this->User->findByconfirmation_code($token);
            if($u){
              $user_id = $this->User->id=$u['User']['user_id'];
               // $key = mysql_real_escape_string($key);
//                      $user_id = mysql_real_escape_string($user_id);
//                      $this->User->query("Update users SET active = '1' WHERE user_id = '$user_id'");
                if($this->User->saveField('active', '1'))
                        {
                             
                           
                           //  $this->Session->setFlash(__('registration_confirmation_completed_successfully'));
                           //  $this->redirect(array('action' => 'index'));
                        }
                
            }
        }
        
        if ($this->request->is('post')) {
          //  $this->User->create();
         //  $this->
            $user_data = $this->request->data;
            $this->User->saveField('password', $user_data['User']['password']);
             $this->Session->setFlash(__('The_user_has_been_registered'));
              $this->redirect(array('controller'=>'users','action'=>'login'));
             
        }
           if ($this->User->save($this->request->data)) {
              
        
    }
    }
    
    /**
     * 
     * @param type $token
     */
    function reset($token=null){
        //$this->layout="Login";
        $this->User->recursive=-1;
        if(!empty($token)){
            $u=$this->User->findByconfirmation_code($token);
            if($u){
                $user_id = $this->User->user_id=$u['User']['user_id'];
                if(!empty($this->data)){
                   // $this->User->data['User']=$this->data;
                   // $this->User->data['User']['name']=$u['User']['name'];
                    $new_hash=sha1($u['User']['name'].rand(0,100));//created token
                    $this->User->data['User']['confirmation_code']=$new_hash;
                    if($this->User->validates(array('fieldList'=>array('password','password_confirm')))){
                        
                        
                        $user_data = $this->request->data;
                        
                        
                        $password =  $user_data['User']['password'];
                        $passwordHash = Security::hash($password,'sha512',true);                        
                        
                        $password_res = mysql_real_escape_string($passwordHash);
                        
                        $user_id = mysql_real_escape_string($user_id);
                        
                        $new_hash_mres = mysql_real_escape_string($new_hash);
                        
                      //  debug($password_res);
                        
                        $this->User->query("UPDATE users SET password = '$password_res' 
                            WHERE user_id = '$user_id'");
                        
                        
                         $this->User->query("UPDATE users SET confirmation_code = '$new_hash' 
                            WHERE user_id = '$user_id'");
                        
                        
//                        if($this->User->save($this->User->data))
//                        {
                            $this->Session->setFlash(__('Password_Has_been_Updated'));
                            $this->redirect(array('controller'=>'users','action'=>'login'));
               //         }
 
                    }
                    else{
 
                        $this->set('errors',$this->User->invalidFields());
                    }
                }
            }
            else
            {
                $this->Session->setFlash(__('Token_Corrupted_Please_Retry_the_reset_link_work_only_for_once'));
            }
        }
 
        else{
            $this->redirect('/');
        }
    }
    

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The_user_has_been_saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The_user_could_not_be_saved_Please_try_again'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid_user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User_deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User_was_not_deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    function change_password() {
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('Password has been changed.');
                // call $this->redirect() here
            } else {
                $this->Session->setFlash('Password could not be changed.');
            }
        } else {
            $this->data = $this->User->findById($this->Auth->user('id'));
        }
    }
}

?>
