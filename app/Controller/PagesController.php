<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
//test
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    
    var $helpers = array('Html', 'Form', 'Translation', 'Session', 'Js' => array('Jquery'), 'Number');
    var $layout = 'pages';
    
    
/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void

 */

	public function display() {
            
                // testuojam 
                        
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
                
                    
                 
                 $this->loadModel('Distance');

                 
                 $distances = $this->Distance->find( 'all', array(
                        'conditions'    => array('Distance.user_id' => $userId)
                     )
                         
                  );
                   
                 $this->set('distances',  $distances);
                
       
		$this->render(implode('/', $path));

	}
        
        public function distances(){

                 $userName = $this->Auth->user('name');
                
                 $userId = $this->Auth->user('user_id');
                 
                 $company_id = $this->Auth->user('company_id');
                 
                 $userRole = $this->Auth->user('role');
             
                $this->set('role', $userRole);
                
                 $this->set('user', $userName );
                 
                 $this->loadModel('Distance');

                  $distances = $this->Distance->find('all', array(
                    'conditions'    =>  array('Car.company_id'  => $company_id,
                         'Distance.user_id' => $userId)
                ));
                  
                //  debug($distances);
                 
//                 $distances = $this->Distance->query("SELECT * FROM distances
//                    INNER JOIN cars ON distances.car_id = cars.car_id
//                    INNER JOIN projects ON distances.project_id = projects.project_id
//                    INNER JOIN locations AS from_location ON distances.from_location_id = from_location.location_id
//                    INNER JOIN locations AS to_location ON distances.to_location_id = to_location.location_id WHERE
//                     cars.user_id = '$userId'");
                 
                 

                 
                 $this->set('distances',  $distances);

                 
                $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
                $sumOfKm = $this->Distance->find('all', array(
                    'fields' => array('total'),
                    'conditions' => array('Car.company_id' => $company_id, 'Distance.user_id' => $userId )
                    )                  
                        );
                
        //        debug($sumOfKm);
                 
                 
                 $this->set('sumOfKm', $sumOfKm);                
                 $this->set('distances',  $distances);
                 
                 
        }
        
        
     
        
        public function projects(){
            
             $userId = $this->Auth->user('user_id');
              
             $this->set('user_id', $userId);
             
             $userRole = $this->Auth->user('role');
             
             $this->set('role', $userRole);
              
             $this->loadModel('Project');
            
             $data = array(
                    'Project' => array(
                        'user_id' => $userId
                    )
                );
        
            if(!empty($this->request->data)){    
                $this->Project->create();
                if ($this->Project->save($this->request->data)) {
                   $this->Session->setFlash(__('saved'));
                  //  $this->redirect(array('action' => 'index'));
                } else {
                 //   $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }

            $userName = $this->Auth->user('name');
                
            $userId = $this->Auth->user('user_id');

            $this->set('user', $userName );

            $projects_list = $this->Project->find( 'all', array(
                        'conditions'    => array('Project.user_id' => $userId)
                     )
                         
                  );
               
            $this->set('projects_list',  $projects_list);
            
            
                 
        }
        
        public function locations(){
            $userId = $this->Auth->user('user_id');
              
             $this->set('user_id', $userId);
             
             $company_id = $this->Auth->user('company_id');
             
             $userRole = $this->Auth->user('role');
             
             $this->set('role', $userRole);
              
             $this->loadModel('Location');
             
             $data = $this->request->data;
             
             
            
//             $data = array(
//                    '$this->request->data' => array(
//                        'company_id' => $company_id
//                    )
//                );
             
             
        
            if(!empty($data)){    
                $data['Location']['company_id'] = $company_id;
                $this->Location->create();
                if ($this->Location->save($data)) {
                   $this->Session->setFlash(__('saved'));
                  //  $this->redirect(array('action' => 'index'));
                } else {
                  //  $this->Session->setFlash(__('failed'));
                }
            }else{

               //  $this->Session->setFlash('test');
            }

            $userName = $this->Auth->user('name');
                
            $this->set('user', $userName );

            $locations_list = $this->Location->find( 'all', array(
                        'conditions'    => array('Location.company_id' => $company_id)
                     )
                         
                  );
               
            $this->set('locations_list',  $locations_list);
        }
        
        
        
        public function cars(){
            
            $userId = $this->Auth->user('id');
              
             $this->set('user_id', $userId);
              
             $this->loadModel('Car');
            
             $data = array(
                    'Car' => array(
                        'user_id' => $userId
                    )
                );
        
            if(!empty($this->request->data)){    
                $this->Car->create();
                if ($this->Car->save($this->request->data)) {
                    $this->Session->setFlash('Saved.');
                  //  $this->redirect(array('action' => 'index'));
                } else {
                   // $this->Session->setFlash('FAILED');
                   }
            }else{

               //  $this->Session->setFlash('test');
            }

            $userName = $this->Auth->user('name');
                
            $this->set('user', $userName );

            $list = $this->Car->find( 'all', array(
                        'conditions'    => array('Car.user_id' => $userId)
                     )
                         
                  );
               
            $this->set('list',  $list);
            
        }
        
        
        public function getCarFuelType(){
            
            $auto = $this->request->data['auto_nr'];
            
            list($car, $car_number) = explode(' | ', $auto);
            
            $this->loadModel('Car');
            
            $car_fuel_type = $this->Car->find('first',array(
                'fields' => array('fuel_type'),
                'conditions' => array('car_number' => $car_number)
            ));
           // $auto = "Wolkwagen | CRT826";
            $this->layout = 'empty';
            

             $this->set('car_fuel_type', $car_fuel_type['Car']['fuel_type']);
             
            
        }
        
        
        public function getLatestKmEnd(){
            
            $auto = $this->request->data['auto_nr'];
            
            list($car, $car_number) = explode(' | ', $auto);
            
            $this->loadModel('Car');
            
            $car_id = $this->Car->find('first',array(
                'fields' => array('car_id'),
                'conditions' => array('car_number' => $car_number)
            ));
           // $auto = "Wolkwagen | CRT826";
            $this->layout = 'empty';
            
             $userId = $this->Auth->user('id');
              
             $this->set('user_id', $userId);
              
             $this->loadModel('Distance');
             
             $latestKmEnd = $this->Distance->field('km_end', array('car_id'=>$car_id['Car']['car_id']),'created DESC');
             
//             $latestKmEnd = $this->Distance->find('first', array(
//                'conditions'=>array('auto'=>$auto),
//                'fields'=>array('km_end')
//            ));
             
             $this->set('latestKmEnd', $latestKmEnd);
             
            
        }
        
        public function getLatestToLocation(){
            $latestFromLocation = "";
             $this->set('latestFromLocation', $latestFromLocation);
            
            $auto = 'null';
            if(!empty($this->request->data['auto_nr'])){
                $auto = $this->request->data['auto_nr'];
            }
            
            
       //     $this->Session->setFlash($auto);
            
       //     debug($auto);
            
      //      echo $auto;
            
            if($auto != null || $auto != ''){
               //  $this->Session->setFlash('labas');
                
                list($car, $car_number) = explode(' | ', $auto);            
                $this->loadModel('Car');
                
                 $car_id = $this->Car->find('first',array(
                    'fields' => array('car_id'),
                    'conditions' => array('car_number' => $car_number)
                 ));
            
                  $this->layout = 'empty';
                 $userId = $this->Auth->user('user_id');
                if(!empty($car_id)){
                     $this->set('user_id', $userId);

                    $this->loadModel('Distance');

                    $latestFromLocation_id = $this->Distance->field('to_location_id', array('car_id'=>$car_id['Car']['car_id']),'created DESC');

                     if(!empty($car_id)){
                           $this->loadModel('Location');

                           $latestFromLocation = $this->Location->field('name', array('location_id' => $latestFromLocation_id));

                           $this->set('latestFromLocation', $latestFromLocation);
                     }else{
                         $latestFromLocation = "";
                     }


                   }else{
                       $latestFromLocation = "";
                   }

            }

       }
        
        
        public function new_distance(){
            
            $userId = $this->Auth->user('user_id');
              
             $this->set('user_id', $userId);
             
             $company_id = $this->Auth->user('company_id');
             
             $userRole = $this->Auth->user('role');
             
             $this->set('role', $userRole);
              
             $this->loadModel('Car');
             
             $userName = $this->Auth->user('name');
                
             $this->set('user', $userName );
             
             $list = $this->Car->find( 'list', array(
                        
                        'fields'     => array('car_unique_name', 'car_unique_name'),
                 'conditions'    => array('Car.company_id' => $company_id )
                     )
                         
             );
               
            $this->set('list',  $list);
            
            $this->loadModel('Project');
            
            $list2 = $this->Project->find( 'list', array(
                       
                        'fields'     => array('Project.project','Project.project'),
                         'conditions'    => array('Project.company_id' => $company_id)
                     )
                         
             );
               
            $this->set('list2', $list2);
            
            $this->loadModel('Distance');
            
            $distance_data = $this->request->data;
            
            if(!empty($distance_data)){
                
                
                
                $car_and_car_number = $distance_data['Distance']['auto'];
                list($car, $car_number) = explode(' | ', $car_and_car_number);
                
                $car_id = $this->Car->find('first', array(
                        'fields' => array('car_id'),
                        'conditions' => array('Car.car_number' => $car_number)
                    )
                );
                
                $distance_data['Distance']['car_id'] = $car_id['Car']['car_id'];
                
              //  $this->loadModel('Project');
                
                $project_id = $this->Project->find('first', array(
                    'fields' => array('project_id'),
                    'conditions' => array('Project.project' => $distance_data['Distance']['project'])
                ));
                
             //   debug($project_id);
                
                $distance_data['Distance']['project_id'] = $project_id['Project']['project_id'];
                
                $this->loadModel('Location');
                
                $from_location_id = $this->Location->find('first', array(
                    'fields' => array('location_id'),
                    'conditions' => array('Location.name' => $distance_data['Distance']['from_location'])
                ));
                
            //   insert new location if there is no such a default location in the database table Locations      
                
                $new_from_location_data['Location']['name'] = $distance_data['Distance']['from_location'];
                $new_from_location_data['Location']['company_id'] = $company_id;
                if(empty($from_location_id)){
                    $this->Location->save($new_from_location_data);
                    
                    $from_location_id = $this->Location->find('first', array(
                        'fields' => array('location_id'),
                        'conditions' => array('Location.name' => $distance_data['Distance']['from_location'])
                    ));
                    
                    $distance_data['Distance']['from_location_id'] = $from_location_id['Location']['location_id'];
                }else{
                     $distance_data['Distance']['from_location_id'] = $from_location_id['Location']['location_id'];
                }
           // ---------------------------------------------------------------------     
               
                
                $to_location_id = $this->Location->find('first', array(
                    'fields' => array('location_id'),
                    'conditions' => array('Location.name' => $distance_data['Distance']['to_location'])
                ));
                
                $new_to_location_data['Location']['name'] = $distance_data['Distance']['to_location'];
                $new_to_location_data['Location']['company_id'] = $company_id;
                if(empty($to_location_id)){
                    $this->Location->save($new_to_location_data);
                    
                    $to_location_id = $this->Location->find('first', array(
                        'fields' => array('location_id'),
                        'conditions' => array('Location.name' => $distance_data['Distance']['to_location'])
                    ));
                    
                    $distance_data['Distance']['to_location_id'] = $to_location_id['Location']['location_id'];
                }else{
                     $distance_data['Distance']['to_location_id'] = $to_location_id['Location']['location_id'];
                }
                
                
               
                
                $this->Distance->create();
                
                if ($this->Distance->save($distance_data)) {
                    
                    $this->Car->id = $car_id['Car']['car_id'];
                    $this->Car->saveField('fuel_left', $distance_data['Distance']['fuel_left']);
                    
                    $this->Session->setFlash(__('saved'));
                    if($userRole == 'employee'){
                         $this->redirect(array('action' => 'distances'));
                    }else{
                        $this->redirect(array('action' => 'analysis'));
                    }
                   
                  //  $this->redirect(array('action' => 'index'));
                } else {
                  //  $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }
            
            
             
             
        }
        
        
         public function new_purchase(){
             $userId = $this->Auth->user('user_id');
             $company_id = $this->Auth->user('company_id');
              
             $this->set('user_id', $userId);
             
             $userRole = $this->Auth->user('role');
             
             $this->set('role', $userRole);
             
              $userName = $this->Auth->user('name');
             
            // $car_id = $this->Car->find()
                
             $this->set('user', $userName );
             
             $this->loadModel('Car');
             
             $first_car_number = $this->Car->find('first', array(
                 'fields'   =>  array('car_number'),
                 'conditions'   =>  array('Car.company_id' => $company_id)
             ));
             
             if(!empty($first_car_number)){
                  $car_fuel_type = $this->Car->find('first',array(
                'fields' => array('fuel_type'),
                'conditions' => array('car_number' => $first_car_number['Car']['car_number'])
                ));
             
             $this->set('car_fuel_type', $car_fuel_type['Car']['fuel_type']);
             
            
             
             $list = $this->Car->find( 'list', array(
                        
                        'fields'     => array('car_unique_name', 'car_unique_name'),
                 'conditions'    => array('Car.company_id' => $company_id)
                     )
                         
             );
               
            $this->set('list',  $list);
              
             $this->loadModel('Purchase');
             
          
              
              $purchase_data = $this->request->data;
              if(!empty($purchase_data)){
                //debug($purchase_data);
                $car_and_car_number = $purchase_data['Car']['auto'];
                list($car, $car_number) = explode(' | ', $car_and_car_number);
                
                $car_id = $this->Car->find('first', array(
                        'fields' => array('car_id'),
                        'conditions' => array('Car.car_number' => $car_number)
                    )
                );
                
                $purchase_data['Purchase']['car_id'] = $car_id['Car']['car_id'];
                
              // debug($car_id['Car']['car_id']);
                $this->Purchase->create();
                if ($this->Purchase->save($purchase_data)) {
                    $this->Session->setFlash(__('saved'));
                    
                    if($userRole == 'employee'){
                        $this->redirect(array('action' => 'purchases'));
                    }else{
                        $this->redirect(array('action' => 'analysis'));
                    }
                    
                    
                  //  $this->redirect(array('action' => 'index'));
                } else {
                //    $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }
             }
             
            
        }
        
        
        public function purchases(){
                $userName = $this->Auth->user('name');
                
                 $userId = $this->Auth->user('user_id');
                 
                 
                 $company_id = $this->Auth->user('company_id');
                 
                 $userRole = $this->Auth->user('role');
                 
                
                $this->set('role', $userRole);
                
                 $this->set('user', $userName );
                 
                 $this->loadModel('Purchase');
                 
                 
             
                 
                $purchases = $this->Purchase->find('all', array(
                    'conditions'    =>  array('Car.company_id'  => $company_id, 'Purchase.user_id' => $userId)
                ));
                
                 $this->Purchase->virtualFields['total'] = 'SUM(Purchase.sum)';
                    $sumOfLT = $this->Purchase->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id, 'Purchase.user_id' => $userId )
                        )                  
                            );
                     App::uses('CakeNumber', 'Utility');
                    $sumOfLT =  CakeNumber::format($sumOfLT['0']['Purchase']['total'], array(
                        'places' => 2,
                        'before' => ''
                    ));

                  

                     $this->set('sumOfLT', $sumOfLT);
                
                // debug($purchases);
               //  $userId_mres = mysql_real_escape_string($userId);
                 
                 
                 
//                 $purchases = $this->Purchase->query("SELECT * FROM purchases
//                    INNER JOIN cars ON purchases.car_id = cars.car_id WHERE
//                    'cars.company_id' = $company_id");
                 
//                 $purchases = $this->Purchase->query("SELECT * FROM purchases
//                     WHERE purchases.car_id = (SELECT cars.car_id FROM cars
//                     WHERE user_id = '$userId' LIMIT 1)");
                 
//                 $purchases = $this->Purchase->find( 'all', array(
//                        'conditions'    => array('Purchase.user_id' => $userId)
//                     )
//                         
//                  );
//                 debug($userId_mres);
//                 debug($purchases);

                 
                 $this->set('purchases',  $purchases);
        }
        
        
        public function analysis(){
            
             $userName = $this->Auth->user('name');
                
                 $userId = $this->Auth->user('user_id');
                 
                 
                 $company_id = $this->Auth->user('company_id');
                 
                 $userRole = $this->Auth->user('role');
             
                 $this->set('role', $userRole);
                
                 $this->set('user', $userName );
                 
                     $this->loadModel('Car');
                 
                   $cars_list = $this->Car->find( 'list', array(

                            'fields'     => array('car_unique_name', 'car_unique_name'),
                     'conditions'    => array('Car.company_id' => $company_id)
                         )

                 );

             //    debug($cars_list);

                $this->set('cars_list',  $cars_list);


                  $this->loadModel('Project');
                  
                  $sumOfLitres = 0;
                  
                  $this->set('sumOfLitres', $sumOfLitres);
                         

                 $projects_list = $this->Project->find( 'list', array(

                            'fields'     => array('project'),
                     'conditions'    => array('Project.company_id' => $company_id)
                         )

                 );

             //    debug($cars_list);

                $this->set('projects_list',  $projects_list);
                       
                $searchForm_data = $this->request->data;
                $this->loadModel('Purchase');
                $this->loadModel('Distance');
               
                 $default_car = 'Nepasirinkta';
                 $this->set('default_car',  $default_car);
                 
                 $default_project = 'Nepasirinkta';
                 $this->set('default_project',  $default_project);
           
           if(!empty($searchForm_data)){
                if($searchForm_data['car'] == "Nepasirinkta" && $searchForm_data['project'] == "Nepasirinkta"){
                   // $car_number = '';
                    //list($car, $car_number) = explode(' | ', $searchForm_data['car']);
                    $from_date = $searchForm_data['date_from'];
                    $to_date = $searchForm_data['date_to'];
                    $project = $searchForm_data['project'];
                    $this->set('purchases',  null);
                    $default_car = $searchForm_data['car'];
                   // debug($default_car);
                    $this->set('default_car',  $default_car);
                     $default_project = $project;
                     $this->set('default_project',  $default_project);

                   $purchases = $this->Purchase->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                          //  'Car.car_number' => $car_number,
                           'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date
                                )
                    ));

                     $this->set('purchases',  $purchases);

                      $this->set('ditances',  null);

                   $distances = $this->Distance->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                         //   'Car.car_number' => $car_number,
                          //  'Project.project'   => $project,
                           'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date

                                )
                    ));

                     $this->set('distances',  $distances);
                     
                     
                     
                        $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
                    $sumOfKm = $this->Distance->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                      //  'Car.car_number' => $car_number,
                      //   'Project.project'   => $project,   
                       'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date )
                        )                  
                            );


                     $this->set('sumOfKm', $sumOfKm);
                     
                     
                     $this->Purchase->virtualFields['total'] = 'SUM(Purchase.sum)';
                    $sumOfLT = $this->Purchase->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                     //   'Car.car_number' => $car_number,
                       'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date )
                        )                  
                            );
                    //debug($sumOfLT);
                    
                    App::uses('CakeNumber', 'Utility');
                    $sumOfLT =  CakeNumber::format($sumOfLT['0']['Purchase']['total'], array(
                        'places' => 2,
                        'before' => ''
                    ));

                //     $sumOfLT = $this->Number->precision($sumOfLT, 2);
                     $this->set('sumOfLT', $sumOfLT);
                     
                     
                }else if($searchForm_data['car'] == "Nepasirinkta"){
                  //  list($car, $car_number) = explode(' | ', $searchForm_data['car']);
                    $from_date = $searchForm_data['date_from'];
                    $to_date = $searchForm_data['date_to'];
                    $project = $searchForm_data['project'];
                    $this->set('purchases',  null);
                    $default_car = $searchForm_data['car'];
                   // debug($default_car);
                    $this->set('default_car',  $default_car);
                     $default_project = $project;
                     $this->set('default_project',  $default_project);

                   $purchases = $this->Purchase->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                         //   'Car.car_number' => $car_number,
                           'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date
                                )
                    ));

                     $this->set('purchases',  $purchases);

                      $this->set('ditances',  null);

                   $distances = $this->Distance->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                     //       'Car.car_number' => $car_number,
                            'Project.project'   => $project,
                           'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date

                                )
                    ));

                     $this->set('distances',  $distances);
                     
                      $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
                    $sumOfKm = $this->Distance->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                     //   'Car.car_number' => $car_number,
                         'Project.project'   => $project,   
                       'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date )
                        )                  
                            );


                     $this->set('sumOfKm', $sumOfKm);
                     
                     
                     $this->Purchase->virtualFields['total'] = 'SUM(Purchase.sum)';
                    $sumOfLT = $this->Purchase->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                     //   'Car.car_number' => $car_number,
                       'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date )
                        )                  
                            );
                    
                    App::uses('CakeNumber', 'Utility');
                    $sumOfLT =  CakeNumber::format($sumOfLT['0']['Purchase']['total'], array(
                        'places' => 2,
                        'before' => ''
                    ));

                     $sumOfLT = $this->Number->precision($sumOfLT, 2);
                     $this->set('sumOfLT', $sumOfLT);
                }elseif($searchForm_data['project'] == "Nepasirinkta"){
                //    echo 'projektas Nep';
                    list($car, $car_number) = explode(' | ', $searchForm_data['car']);
                    $from_date = $searchForm_data['date_from'];
                    $to_date = $searchForm_data['date_to'];
                   // $project = $searchForm_data['project'];
                    $this->set('purchases',  null);
                    $default_car = $searchForm_data['car'];
                   // debug($default_car);
                    $this->set('default_car',  $default_car);
                     //$default_project = $project;
                     $this->set('default_project',  $default_project);

                   $purchases = $this->Purchase->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                            'Car.car_number' => $car_number,
                           'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date
                                )
                    ));

                     $this->set('purchases',  $purchases);

                      $this->set('ditances',  null);

                   $distances = $this->Distance->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                            'Car.car_number' => $car_number,
                      //      'Project.project'   => $project,
                           'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date

                                )
                    ));

                     $this->set('distances',  $distances);
                     
                      $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
                    $sumOfKm = $this->Distance->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                        'Car.car_number' => $car_number,
                      //   'Project.project'   => $project,   
                       'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date )
                        )                  
                            );
                    
                    
                     $fuel_rate = $this->Car->find('first', array(
                         'fields'   =>  array('fuel_rate'),
                         'conditions'   =>  array('Car.car_number' => $car_number )
                     ));
                     
                  //   debug($fuel_rate);
                     
                     $sumOfLitres = ($sumOfKm['0']['Distance']['total'] * $fuel_rate['Car']['fuel_rate']) / 100;
                     
                     $this->set('sumOfLitres', $sumOfLitres);
                    


                     $this->set('sumOfKm', $sumOfKm);
                     
                     
                     $this->Purchase->virtualFields['total'] = 'SUM(Purchase.sum)';
                    $sumOfLT = $this->Purchase->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                        'Car.car_number' => $car_number,
                       'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date )
                        )                  
                            );

                     App::uses('CakeNumber', 'Utility');
                    $sumOfLT =  CakeNumber::format($sumOfLT['0']['Purchase']['total'], array(
                        'places' => 2,
                        'before' => ''
                    ));
                     $this->set('sumOfLT', $sumOfLT);
                    
                }else{
                    list($car, $car_number) = explode(' | ', $searchForm_data['car']);
                    $from_date = $searchForm_data['date_from'];
                    $to_date = $searchForm_data['date_to'];
                    $project = $searchForm_data['project'];
                    $this->set('purchases',  null);
                    $default_car = $searchForm_data['car'];
                   // debug($default_car);
                    $this->set('default_car',  $default_car);
                     $default_project = $project;
                     $this->set('default_project',  $default_project);

                   $purchases = $this->Purchase->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                            'Car.car_number' => $car_number,
                           'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date
                                )
                    ));
                   
                  // debug($purchases);
                   //  if($purchases['Purchase']['purchase_id'] != null){
                         $this->set('purchases',  $purchases);
                   //  }
                     

                      $this->set('ditances',  null);

                   $distances = $this->Distance->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id,
                            'Car.car_number' => $car_number,
                            'Project.project'   => $project,
                           'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date

                                )
                    ));
                   
                 //  debug($distances);

                     $this->set('distances',  $distances);
                     
                      $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
                    $sumOfKm = $this->Distance->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                        'Car.car_number' => $car_number,
                         'Project.project'   => $project,   
                       'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date )
                        )                  
                            );


                     $this->set('sumOfKm', $sumOfKm);
                     
                      $fuel_rate = $this->Car->find('first', array(
                         'fields'   =>  array('fuel_rate'),
                         'conditions'   =>  array('Car.car_number' => $car_number )
                     ));
                     
                  //   debug($fuel_rate);
                     
                     $sumOfLitres = ($sumOfKm['0']['Distance']['total'] * $fuel_rate['Car']['fuel_rate']) / 100;
                     
                     $this->set('sumOfLitres', $sumOfLitres);
                     
                    
                     
                     
                     
                    $this->Purchase->virtualFields['total'] = 'SUM(Purchase.sum)';
                    $sumOfLT = $this->Purchase->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id,
                        'Car.car_number' => $car_number,
                       'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date )
                        )                  
                            );
                    
                  //  $sumOfLT = $this->Number->precision($sumOfLT, 2);
                    
                    App::uses('CakeNumber', 'Utility');
                    $sumOfLT =  CakeNumber::format($sumOfLT['0']['Purchase']['total'], array(
                        'places' => 2,
                        'before' => ''
                    ));

                   // debug($sumOfLTs);
                     $this->set('sumOfLT', $sumOfLT);
            
                }                
           }else{
               
               
                  //  $this->loadModel('Purchase');
                    $purchases = $this->Purchase->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id)
                    ));

                     $this->set('purchases',  $purchases);



                     /*
                      * the begining of the distances table
                      */




                 //    $this->loadModel('Distance');

                      $distances = $this->Distance->find('all', array(
                        'conditions'    =>  array('Car.company_id'  => $company_id)
                    ));



                     $this->set('distances',  $distances);


                    $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
                    $sumOfKm = $this->Distance->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id )
                        )                  
                            );


                     $this->set('sumOfKm', $sumOfKm);
                     
                     $this->Purchase->virtualFields['total'] = 'SUM(Purchase.sum)';
                    $sumOfLT = $this->Purchase->find('all', array(
                        'fields' => array('total'),
                        'conditions' => array('Car.company_id' => $company_id )
                        )                  
                            );
                    // $sumOfLT = $this->Number->precision($sumOfLT, 2);
                    
                  //  $sumOfLT = (double) $sumOfLT;
                  
                   // debug($sumOfLT);
                    
                    App::uses('CakeNumber', 'Utility');
                    $sumOfLT =  CakeNumber::format($sumOfLT['0']['Purchase']['total'], array(
                        'places' => 2,
                        'before' => ''
                    ));

                     $this->set('sumOfLT', $sumOfLT);


           }

        }
        
          
       
       public function delete($id, $model) {
          
         $this->loadModel($model);
        // $this->Session->setFlash($id + " tarpas" + $model);
        //  $this->Session->setFlash('Trying to delte the item');
       //  $this->Session->setFlash("tarpas");
          
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
   //     debug($model);
        if ($this->$model->delete($id)) {
            $this->Session->setFlash(__('the_item_has_been_deleted'));
            if($model == "Project" || $model == "Car" || $model == "User" ){
                 $this->redirect(array('action' => 'preferences'));
            }else if($model == "Purchase" || $model == "Distance"){
                $this->redirect(array('action' => 'analysis'));
            }else{
                $this->redirect(array('action' => $model.'s'));
            }
           
        }else{
            $this->Session->setFlash(__('deletion_not_successful'));
        }
       }
       
       
       //id=elements_id&value=user_edited_content
       public function edit(){
           
           $this->layout = 'empty';
           
           $idAndField = $this->request->data['id'];
           
          //  debug($idAndField);
           //echo $idAndField;
           list($id, $model, $field) = explode('.', $idAndField); 
           $value = $this->request->data['value'];
           
            $this->loadModel($model);
                      if(!$id){
				throw new NotFoundException(__('Invalid post'));
			}
                        switch ($model)
                        {
                        case "Car":
                          $post = $this->$model->findByCarId($id);
                          $fieldas = 'car_id';  
                          break;
                        case "Project":
                          $post = $this->$model->findByProjectId($id);
                            $fieldas = 'project_id'; 
                          break;
                        case "Location":
                          $post = $this->$model->findByLocationId($id);
                          $fieldas = 'location_id'; 
                          break;
                      case "Purchase":
                          $post = $this->$model->findByPurchaseId($id);
                          $fieldas = 'purchase_id'; 
                          break;
                       case "Distance":
                          $post = $this->$model->findByDistanceId($id);
                          $fieldas = 'distance_id'; 
                          break;
                        }
                         
                       // }
		//	$post = $this->$model->findByCarId($id);
			if(!$post){
				throw new NotFoundException(__('Invalid post'));
			}
			if($this->request->is('post') || $this->request->is('put')){
				//$this->$model->cars_id = $id;
                                
                                $table_name = strtolower($model) . 's';
				//if($this->$model->saveField($field, $value)){
                                $result = $this->$model->query("UPDATE $table_name SET $field = '$value' WHERE $fieldas = $id");
                                //debug($result);

                                //echo $result;
                                if(true){
					//$this->Session->setFlash('Your post has been updated.');
                                       $this->set('value', $value);
					//$this->redirect(array('action' => 'distances'));
				}else{
					$this->Session->setFlash('Unable to update your post.');
				}
			}
			if(!$this->request->data){
				$this->request->data = $post;
			}
       }
        
        
        
        public function preferences(){
            

             $userId = $this->Auth->user('user_id');
             $company_id = $this->Auth->user('company_id');
             
              $this->set('company_id', $company_id);
              
             $this->set('user_id', $userId);
             
             $userRole = $this->Auth->user('role');
             
             $this->set('role', $userRole);
             
          //   debug($userRole);
             
            
             
              
             $this->loadModel('Car');
            
//             $data = array(
//                    'Car' => array(
//                        'user_id' => $userId
//                    )
//                );
             $data = $this->request->data('Car');
//             debug($data);
             
            if(!empty($data)){
                
               $data['company_id'] =  $company_id;
             //   debug($data);
               // debug($data);
                $this->Car->create();
                
                
               try {
                     if($this->Car->save($data)){
                        $this->Session->setFlash(__('new_car_saved'));
               } 
                 
                    
                } catch (PDOException $e) {
                     $this->Session->setFlash(__('duplicate_car_number_entry'));
                   // echo __("duplicate_car_number_entry");
                    //echo 'Connection failed: ' . $e->getMessage();
                }
                
               
            }else{

               //  $this->Session->setFlash('test');
            }

            $userName = $this->Auth->user('name');
                
            $this->set('user', $userName );

            $list = $this->Car->find( 'all', array(
                        'conditions'    => array('Car.company_id' => $company_id)
                     )
            );
            
            //debug($list);
               
        //    debug($list);
            $this->set('list',  $list);
            
            
            
            $userId = $this->Auth->user('user_id');
              
             $this->set('user_id', $userId);
            
            $this->loadModel('Project');
            
//             $data = array(
//                    'Project' => array(
//               //         'user_id' => $userId
//                    )
//                );
            $project_data =  $this->request->data('Project');
            
            if(!empty($project_data)){    
                $project_data['company_id'] = $company_id;
                $this->Project->create();
                if ($this->Project->save($project_data)) {
                    $this->Session->setFlash(__('new_project_saved'));
                  //  $this->redirect(array('action' => 'index'));
                } else {
                  //  $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }


            $projects_list = $this->Project->find( 'all', array(
                        'conditions'    => array('Project.company_id' => $company_id)
                      //  'conditions'    => array('Project.user_id' => $userId)
                     )
                         
                  );
               
            $this->set('projects_list',  $projects_list);
            
           /* ------------------------------------------------
              New employee classificator
           --------------------------------------------------- */ 
            
           $this->loadModel('Company');
           
            $company_info = $this->Company->find('first', array(
                'fields'    =>  array('company_name', 'company_code'),
                 'conditions'    => array('Company.company_id' => $company_id)
              //  'conditions'    =>  array('user_id' => $userId)
            ));
            
            $company_name = $company_info['Company']['company_name'];
            $company_code = $company_info['Company']['company_code'];
            
            $this->set('company_name', $company_name);
            $this->set('company_code', $company_code);
           
           
       //    $employee_data['User']['email'] = "";
            $employee_data = null;
           if(!empty($this->request->data)){
               $employee_data = $this->request->data;
               $employee_data['User']['user_id'] = '';
           }
   //      
        //   debug($employee_data);
           
           
           if(!empty($employee_data) && !empty($employee_data['User']['email'])){    
       //     if(!empty($employee_data)){ 
               
              //  $project_data =  $this->request->data('Project');
            $employee_data['User']['company_id'] = $company_id;
                $this->User->create();
                if ($this->User->save($employee_data)) {
                    $this->Session->setFlash(__('new_employee_saved'));
                    
                    
//                     $email=$this->$employee_data['User']['email'];
//                    $fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
//                    debug($fu);
//                    if($fu)
//                    {
//                  //      debug($fu);
//                        if(!$fu['User']['active'])
//                        {
                            $key = Security::hash(String::uuid(),'sha512',true);
                            $hash=sha1($employee_data['User']['name'].rand(0,100));
                            $url = Router::url( array('controller'=>'users','action'=>'new_user_complete_registration'), true ).'/'.$key.'#'.$hash;
                            $ms=$url;
                            $ms=wordwrap($ms,1000);
                            //debug($url);
                            $user_id = $employee_data['User']['confirmation_code']=$key;
                          //  $this->User->user_id=$user_id;

    //                        $key = mysql_real_escape_string($key);
    //                        $user_id = mysql_real_escape_string($user_id);
    //                        $result = $this->User->query("Update users SET confirmation_code = '$key' WHERE user_id = '$user_id'");
    //                        debug($result);
                          //  $this->User->saveField('confirmation_code',$fu['User']['confirmation_code']);
                            if($this->User->saveField('confirmation_code',$employee_data['User']['confirmation_code'])){
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
                                  $this->Email->template = 'complete_registration';
                                $this->Email->from    = 'programu.testavimas@gmail.com';
                                $this->Email->to      = $employee_data['User']['name'].'<'.$employee_data['User']['email'].'>';
                                $this->Email->subject = __('complete_your_account_registration');
                                $this->Email->sendAs = 'both';

                                    $this->Email->delivery = 'smtp';
                                    $this->set('ms', $ms);
                                    $this->Email->send();
                                    $this->set('smtp_errors', $this->Email->smtpError);
                                $this->Session->setFlash(__('your_employee_has_received_the_confirmation_email', true));

                                //============EndEmail=============//
                            }
                            else{
                                $this->Session->setFlash(__("Error_Generating_Account_Activation_Link"));
                            }
                        }
//                        else
//                        {
//                            $this->Session->setFlash(__('This_Account_is_not_Active_yet_Check_Your_mail_to_activate_it'));
//                        }
                        }

            /*
             *  Then end of new employee classificator
             */
                        
            $employees_list = $this->User->find( 'all', array(
                        'fields'   =>  array('user_id', 'name', 'surname', 'email'),
                        'conditions'    => array(
                              'User.role' => 'employee',
                               'User.company_id' => $company_id
                            )
                         //  'conditions'    => array('Project.company_id' => $company_id)
                     )
                         
                  );
           // debug($employees_list);
               
            $this->set('employees_list',  $employees_list);

            
           
            
            if (!empty($this->data) && !empty($this->data['User']['password1'])) {
                 $this->User->user_id = $userId;
                 if ($this->User->save($this->data['User'])) {
                    $this->Session->setFlash('password_has_been_changed.');
                    // call $this->redirect() here
                } else {
                    $this->Session->setFlash('password_could_not_be_changed.');
                }
            } 
            
              if (!empty($this->data) && !empty($this->data['User']['password3'])) {
   
                 if ($this->User->save($this->data)) {
                          $id = $this->data['User']['user_id'];
                    if ($id)
                    {
                        $this->User->data['User']['user_id'] = $id;
                        $success = $this->User->saveField('email', $this->data['User']['email1']);
                    }
                    if($success){
                         $this->Session->setFlash('email_changed');
                    }else{
                         $this->Session->setFlash('email_not_changed_error_or_already_taken');
                    }
                   
                }
            } 
            
                 
        }
        

        
        public function reports(){
            $userName = $this->Auth->user('name');
            
            $userSurname = $this->Auth->user('surname');
                
             $userId = $this->Auth->user('user_id');
             
             $company_id = $this->Auth->user('company_id');
             
             $userRole = $this->Auth->user('role');
             
             $this->set('role', $userRole);
                 
                          
             $this->set('user_id', $userId);
                
             $this->set('user', $userName );
                 
                 
             $this->loadModel('Car');
             
             $userName = $this->Auth->user('name');
                
             $this->set('user', $userName );
             
             $list = $this->Car->find( 'list', array(
                        
                        'fields'     => array('car_unique_name'),
                        'conditions'    => array('Car.company_id' => $company_id)
                     )
                         
             );
             
            
             
        //     debug($drivers_list);
             
             if($userRole == 'manager'){
                  $drivers_list = $this->User->find('list', array(
                    'fields'   =>  array('user_unique_name'),
                    'conditions'    => array('User.company_id' => $company_id)
                  ));
                 $this->set('drivers_list', $drivers_list);
             }else{
                 
                 $drivers_list = $this->User->find('list', array(
                    'fields'   =>  array('user_unique_name'),
                    'conditions'    => array('User.company_id' => $company_id, 'User.user_id'   =>  $userId)
                  ));
                 $this->set('drivers_list', $drivers_list);
                 
//                 $driver = $userName.' '.$userSurname;
//                // debug($driver);
//                 $this->set('driver', $driver);
             }
             
             
                         
           //  debug($list);
               
            $this->set('list',  $list);
                 
                 
            $this->loadModel('Distance');
                 
                //  $date = $this->request->data['Distance']['date'];
                 
             // $this->redirect(array('action' => 'distances'));   
             
        }
        
        
        public function find() {
            
            $this->loadModel('Location');
            $this->Location->recursive = -1;
            if ($this->request->is('ajax')) {
              $this->autoRender = false;
              $results = $this->Location->find('all', array(
                'fields' => array('Location.name'),
                //remove the leading '%' if you want to restrict the matches more
                'conditions' => array('Location.name LIKE ' => '%' . $this->request->query['q'] . '%')
              ));
              
             // debug($results);
              foreach($results as $result) {
                echo $result['Location']['name'] . "\n";
              }

            } else {
                  //if the form wasn't submitted with JavaScript
              //set a session variable with the search term in and redirect to index page
              $this->Session->write('locationName',$this->request->data['Location']['name']);
              $this->redirect(array('action' => 'new_distance'));
            }
      }
        
        
        
        
        
        public function create_report(){
            
            $userId = $this->Auth->user('user_id');
            
            $company_id = $this->Auth->user('company_id');
            
            $this->loadModel('Distance');
            
            $userRole = $this->Auth->user('role');
             
             $this->set('role', $userRole);
            
            
            $data = $this->request->data('Distance');
            
            //debug($data);
            
         //   $company = $data['Distance']['company'];
            
            
            
         //   $company_code = $data['Distance']['company_code'];
            $date = $data['date'];
             list($year, $month, $day) = explode('-', $date);
          //  $year = $this->request->data['Distance']['date']['year'];
          //  $month = $this->request->data['Distance']['date']['month'];
             
            $from_date =  $data['from_date'];
            $to_date =  $data['to_date'];
             
            $car_id = $data['car'];
            $driver = $data['driver'];
            $travel_page_writer = $data['travel_page_writer'];
            
            $this->loadModel('Car');
            
            $car_info = $this->Car->find('first', array(
                'fields'    =>  array('car', 'car_number'),
                'conditions'    =>  array('Car.car_id' =>  $car_id)
            ));
            
            $car = $car_info['Car']['car'];
            $auto_nr = $car_info['Car']['car_number'];
            
            //list($car, $auto_nr) = explode(' | ', $carAndauto_nr); 
            
            $this->loadModel('Company');
            
            $company_info = $this->Company->find('first', array(
                'fields'    =>  array('company_name', 'company_code'),
                'conditions'    =>  array('company_id' => $company_id)
            ));
            
           // debug($company_info);
            
            $company = $company_info['Company']['company_name'];
            $company_code = $company_info['Company']['company_code'];
            

            require('../webroot/misc/tcpdf/config/lang/eng.php');
            require('../webroot/misc/tcpdf/tcpdf.php');
            //ob_clean();
            //ob_end_clean();
            $pdf = new TCPDF('L', 'pt', 'A4',  true, 'UTF-8', false);
            
          //  $fontname = $pdf->addTTFfont('../webroot/misc/tcpdf/fonts/DejaVuSans.ttf', 'TrueTypeUnicode', '', 32);
          //  $pdf->SetFont($fontname );
            //$pdf->SetFont('times','', null, '', 'default', true );
            $pdf->SetFont('dejavusans','', null, '', 'default', true );
            $pdf->SetFontSize(8);
            $pdf->AddPage();
            $pdf->Line(345, 30, 500, 30);
            $pdf->Text(30, 30, '(įmonės pavadinimas)', false, false, true, 0, 0, 'C');


            $pdf->Line(345, 60, 500, 60);
            $pdf->Text(30, 60, '(įmonės kodas)', false, false, true, 0, 0, 'C');

            $pdf->SetFontSize(12);
            $pdf->Text(30, 15, $company, false, false, true, 0, 0, 'C');
            $pdf->Text(30, 45, $company_code, false, false, true, 0, 0, 'C');
            
         //   debug($driver);
            $driver_nr = $driver;
            
            if(!empty($driver)){
                
                
                
                 $distances = $this->Distance->find('all',array(
                'conditions' =>  array('Car.company_id' => $company_id,
                                            'Car.car_number' => $auto_nr,
                                            'Distance.user_id' => $driver,
                                            'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date
                                            )
            ));
              
              
//              $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
//                $sumOfKm = $this->Distance->find('all', array(
//                    'fields' => array('total'),
//                    'conditions' => array('Car.company_id' => $company_id, 'Distance.user_id' => $userId )
//                    )                  
//                        );
              
              
               $this->loadModel('Purchase');
              
               $this->Purchase->virtualFields['total'] = 'Sum(Purchase.liters)';
               $liters_bought = $this->Purchase->find('all',array(
                'fields'    => array('total'),
                'conditions' =>  array('Car.company_id' => $company_id,
                                            'Car.car_number' => $auto_nr,
                                            'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date)
                ));
               
               $this->loadModel('User');
               $drivers_name = $this->User->find('first', array(
                   'fields' => array('name', 'surname'),
                   'conditions' => array('user_id' => $driver)
               ));
               
               $driver = $drivers_name['User']['name']. " " . $drivers_name['User']['surname'];
               
            }else{
                 $distances = $this->Distance->find('all',array(
                'conditions' =>  array('Car.company_id' => $company_id,
                                            'Car.car_number' => $auto_nr,
                                            'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date)
            ));
              
              
//              $this->Distance->virtualFields['total'] = 'SUM(Distance.km)';
//                $sumOfKm = $this->Distance->find('all', array(
//                    'fields' => array('total'),
//                    'conditions' => array('Car.company_id' => $company_id, 'Distance.user_id' => $userId )
//                    )                  
//                        );
              
              
               $this->loadModel('Purchase');
              
               $this->Purchase->virtualFields['total'] = 'Sum(Purchase.liters)';
               $liters_bought = $this->Purchase->find('all',array(
                'fields'    => array('total'),
                'conditions' =>  array('Car.company_id' => $company_id,
                                            'Car.car_number' => $auto_nr,
                                            'Purchase.date <=' => $to_date, 'Purchase.date >=' => $from_date)
                ));
            }

            
         $tbl2 = '';   
         $nr = 0;
         $allKm = 0;
        // debug($distances);
     


            $pdf->SetFontSize(9);

            $tbl = '
            <br><br><br><br>
            <table>
                    <tr>
                            <td style="width: 690px;">
                            </td>
                            <td style="width: 120px;">
                                    <table align="right">
                                    <tr>
                                            <td style=" width: 95px; height: 40px;  text-align:center"><b>Degalų suvartojimas litrais</b></td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">Likutis laikotarpio pradžioje</td>	
                                    </tr>
                                    <tr>
                                            <td  style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center; ">
                          
                                          
                           
                                        </td>	
                                        
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center; ">
                                            Kelionės metu pilta degalų</td>	
                                    </tr>
                                    <tr>
                                       <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center; vertical-align: middle;">
                                           
                                        </td>	
                                    
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
                                            Likutis laikotarpio pabaigoje</td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
                                            Faktinis suvartojimas</td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
                                            Suvartojimas pagal vadovo patvirtintą normą</td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
                                            Ekonomija</td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
                                            Pereikvojimas</td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
                                    </tr>

                                    </table>

                            </td>
                    </tr>

            </table>
            ';
            $pdf->writeHTML($tbl, true, false, false, false, 'R');

            $pdf->SetFontSize(12);


            $pdf->Text(0, 120, 'LENGVOJO AUTOMOBILIO KELIONĖS LAPAS', false, false, true, 0, 0, 'C');
            $pdf->Line(285, 155, 325, 155);
            $pdf->Text(287, 140, $year, false, false, true, 0, 0, 'L');
            $pdf->Text(380, 140, $month, false, false, true, 0, 0, 'L');
            $pdf->Text(180, 178, $car, false, false, true, 0, 0, 'L');
            $pdf->Text(180, 198, $auto_nr, false, false, true, 0, 0, 'L');
            $pdf->Text(140, 218, $driver, false, false, true, 0, 0, 'L');
            $pdf->Text(450, 205, $travel_page_writer, false, false, true, 0, 0, 'L');
            
            


            $pdf->SetFontSize(10);

            $pdf->Text(330, 145, 'm.', false, false, true, 0, 0);
            $pdf->Line(355, 155, 415, 155);
            $pdf->Text(420, 145, 'mėn. Nr.', false, false, true, 0, 0);
            $pdf->Line(470, 155, 530, 155);
            $pdf->Text(30, 180, 'Automobilis:', false, false, true, 0, 0);
            $pdf->Line(140, 193, 300, 193);
            $pdf->Text(30, 200, 'Valstybinis numeris:', false, false, true, 0, 0);
            $pdf->Line(140, 213, 300, 213);
            $pdf->Text(30, 220, 'Vairuotojas:', false, false, true, 0, 0);
            $pdf->Line(140, 233, 300, 233);
            $pdf->SetFontSize(8);
            $pdf->Text(190, 233, '(Vardas, pavardė)', false, false, true, 0, 0);
            $pdf->SetFontSize(10);
            $pdf->Text(330, 210, 'Kelionės lapą išrašė:', false, false, true, 0, 0);
            $pdf->Line(445, 220, 650, 220);

            $pdf->SetFontSize(9);
            $tbl1 = '
            <br><br><br><br><br>
            <table>
            <tr>
            <td style="border: 1px solid #000000; width: 30px; height: 40px; text-align:center;">Eil. Nr.</td>
            <td style="border: 1px solid #000000; width: 60px; text-align:center">Data</td>
            <td style="border: 1px solid #000000; width: 100px; text-align:center">Skaitiklio parodymai
                            kelionės pradžioje (km)</td>
                    <td style="border: 1px solid #000000; width: 100px; text-align:center">Išvykimo vieta</td>
                    <td style="border: 1px solid #000000; width: 90px; text-align:center">Paskyrimo vieta</td>
                    <td style="border: 1px solid #000000; width: 100px; text-align:center">Važiavimo tikslas</td>
                    <td style="border: 1px solid #000000; width: 100px; text-align:center">Skaitiklio parodymai
                            kelionės pabaigoje (km)</td>
                    <td style="border: 1px solid #000000; width: 50px; text-align:center">Tikrinusio parašas</td>
                    <td style="border: 1px solid #000000; width: 55px; text-align:center">Nuvažiuota (km)</td>		
             </tr>
            </table>';
           
            
            $userId = $this->Auth->user('user_id');
            
             //  $userId_mres = mysql_real_escape_string($userId);
                 
//                 $distances = $this->Distance->query("SELECT * FROM distances
//                    INNER JOIN cars ON distances.car_id = cars.car_id
//                    INNER JOIN projects ON distances.project_id = projects.project_id
//                    INNER JOIN locations AS from_location ON distances.from_location_id = from_location.location_id
//                    INNER JOIN locations AS to_location ON distances.to_location_id = to_location.location_id WHERE
//                     cars.user_id = '$userId'");
            
              //   debug($distances);
            
          
         
    	foreach( $distances as $row ) {
            $nr++;
            $allKm += $row["Distance"]["km"];
					
            $tbl2.='<table><tr>
                <td style="border: 1px solid #000000; width: 30px; text-align:center;">'.$nr.'</td>
                <td style="border: 1px solid #000000; width: 60px; text-align:center">'.$row["Distance"]["date"].'</td>
                <td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Distance"]["km_begin"].'</td>
                    <td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Location"]["name"].'</td>
                    <td style="border: 1px solid #000000; width: 90px; text-align:center">'.$row["To_location"]["name"].'</td>
                    <td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Distance"]["purpose"].'</td>
                    <td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Distance"]["km_end"].'</td>
                    <td style="border: 1px solid #000000; width: 50px; text-align:center"></td>
                    <td style="border: 1px solid #000000; width: 55px; text-align:center">'.$row["Distance"]["km"].'</td>

            </tr>
            </table>
            ';
    		
    	}
        
          $pdf->writeHTML($tbl1, false, false, false, false, '');
    				
    	
    //	mysql_free_result($result);
    	$pdf->writeHTML($tbl2, false, false, false, false, '');
        
        
    	$tbl3='<table><tr><td style="width: 580px;">
            

            </td>
            <td style="width: 50px; text-align: right;">
    				Iš viso &nbsp; (km) &nbsp;
    		</td>
                <td style="border: 1px solid #000000; width: 55px; text-align:center">'.$allKm.'</td>
            </tr></table>
            <br>
            <table >
    		<tr>
    			<td style="width: 400px;"><span>Kelionės lapą patikrino</span></td>
    		</tr>
                <tr style="font-size: 8px; height=10px;">
    			<td style="width: 150px;"></td>
                        <td style="width: 450px; font-size: 8px; height=10px;"><hr style="width: 440px; height=10px;"></td>
    		</tr>
                <tr style="font-size: 8px; height=10px;">
                    <td style="width: 285px; height=10px;"></td>
                    <td style="width: 450px; font-size: 8px; height=10px;"><span style="font-size: 8px; height=10px;" >(Pareigos, parašas, vardas, pavardė, data)</span></td>
                </tr>
                
           </table>
';

    	$pdf->writeHTML($tbl3, false, false, false, false, '');
        
        //debug($nr);
        
        if(!empty($distances)){
            
//            debug($auto_nr);
//            debug($driver_nr);
//            debug($company_id);
//            debug($from_date);
            
            if(!empty($driver)){
                    $distances_until = $this->Distance->find('all',array(
                'conditions' =>  array('Car.company_id' => $company_id,
                                            'Car.car_number' => $auto_nr,
                                            'Distance.user_id' => $driver_nr,
                                            'Distance.date <' => $from_date
                                            )
                    )
                  );
            }else{
                  $distances_until = $this->Distance->find('all',array(
                'conditions' =>  array('Car.company_id' => $company_id,
                                            'Car.car_number' => $auto_nr,
                                        //    'Distance.user_id' => $driver_nr,
                                            'Distance.date <' => $from_date
                                            )
                    )
                  );
            }
            
//            $distances_until = $this->Distance->find('all',array(
//                'conditions' =>  array('Car.company_id' => $company_id,
//                                            'Car.car_number' => $auto_nr,
//                                            'Distance.user_id' => $driver_nr,
//                                            'Distance.date <' => $from_date
//                                            )
//                    )
//            );
            
           
            
             $nrOfUntilDistances = 0;
            foreach( $distances_until as $row ) {
                $nrOfUntilDistances++;
            }
            
          //   debug( $nrOfUntilDistances);
            
            if($nrOfUntilDistances == 0){
                
                $fuel_left = $this->Car->find('first', array(
                         'fields'   =>  array('fuel_left'),
                         'conditions'   =>  array('Car.car_number' => $auto_nr )
                ));
                
                $fuel_left_at_begining = $fuel_left['Car']['fuel_left'];
                
            }else{
                $fuel_left_at_begining = $distances_until[$nrOfUntilDistances-1]['Distance']['fuel_left'];
            }
            
            
            
        //    $fuel_left_at_begining = $distances['0']['Distance']['fuel_left'];
            $fuel_left_at_end = $distances[$nr-1]['Distance']['fuel_left'];
            $liters_bought = $liters_bought['0']['Purchase']['total'];
         
         $factual_fuel_consuming = $fuel_left_at_begining + $liters_bought - $fuel_left_at_end;
         
         
         
          $fuel_rate = $this->Car->find('first', array(
                         'fields'   =>  array('fuel_rate'),
                         'conditions'   =>  array('Car.car_number' => $auto_nr )
          ));
          
          $sumOfLitresAccordingFuelRate = ($allKm * $fuel_rate['Car']['fuel_rate'])/ 100;
           App::uses('CakeNumber', 'Utility');
           $sumOfLitresAccordingFuelRate =  CakeNumber::format($sumOfLitresAccordingFuelRate, array(
                        'places' => 2,
                        'before' => ''
                    ));
           
          
          $economy = ($factual_fuel_consuming / $allKm) * 100;
          
         
                    $economy =  CakeNumber::format($economy, array(
                        'places' => 2,
                        'before' => ''
                    ));
          
          $overspending = $factual_fuel_consuming - $sumOfLitresAccordingFuelRate;
          
          
         
          $pdf->Text(770, 150, $fuel_left_at_begining, false, false, true, 0, 0, 'L');
             
          $pdf->Text(770, 200, $liters_bought, false, false, true, 0, 0, 'L');
          
          $pdf->Text(770, 250, $fuel_left_at_end, false, false, true, 0, 0, 'L');
          
          $pdf->Text(770, 300, $factual_fuel_consuming, false, false, true, 0, 0, 'L');
          
          $pdf->Text(770, 360, $sumOfLitresAccordingFuelRate, false, false, true, 0, 0, 'L');
          
          $pdf->Text(770, 410, $economy, false, false, true, 0, 0, 'L');
          
           $pdf->Text(770, 460, $overspending, false, false, true, 0, 0, 'L');
        }
        
     
            $data2 = $this->request->data;
        
           if(!empty($data2['show_report'])){
                $pdf->Output('gas_report.pdf', 'I');
               $this->Session->setFlash(__('html_report_version'));
           }else{
                $pdf->Output('gas_report.pdf', 'D');
                $this->Session->setFlash(__('your_report_has_been_created_and_is_being_downloaded'));
           }
          

      }
      
      
}
