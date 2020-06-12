<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    
    
 var $components = array('Session', 'Cookie',
        'Auth' => array(
            'authenticate' => array(
            'Form' => array(
                'fields' => array(
                    'username' => 'email',
                'password' => 'password'),
                
            )
        ),
            'loginRedirect' => array('controller' => 'pages', 'action' => 'distances'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'index')
        ));
 
 
        public $uses = array('User');
 
//    public function beforeFilter() {
//        Configure::write('Config.language', $this->Session->read('Config.language'));
//    }

    function beforeFilter() {
        $this->Auth->allow('index', 'view');
        
        // set cookie options
    $this->Cookie->key = 'qSI232qs*&sXOw!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
    $this->Cookie->httpOnly = true;

    if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
        $cookie = $this->Cookie->read('remember_me_cookie');

        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.username' => $cookie['email'],
                'User.password' => $cookie['password']
            )
        ));

        if ($user && !$this->Auth->login($user)) {
            $this->redirect('/users/logout'); // destroy session & cookie
        }
    }
        
        
        //debug($this->data);
        
        $this->_setLanguage();
    }

    function _setLanguage() {

        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        }
        else if (isset($this->params['language']) && ($this->params['language']
                 !=  $this->Session->read('Config.language'))) {

            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }
    }
    
}
