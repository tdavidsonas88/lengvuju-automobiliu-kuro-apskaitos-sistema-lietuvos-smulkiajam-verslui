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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    
 //   public $helpers = array('Js' => array('Jquery'));
    
    var $helpers = array('Html', 'Form', 'Translation', 'Session', 'Js' => array('Jquery'));
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
                
                
                
//                 $this->User->id = 23;
//                    if (!$this->User->exists()) {
//                        throw new NotFoundException(__('Invalid user'));
//                    }
//                  $this->set('user', $this->User->read(null, $id));
                
                
                 
                 $this->loadModel('Distance');
             //   $cars = $this->Car->find('all');

                 
                 $distances = $this->Distance->find( 'all', array(
                        'conditions'    => array('Distance.user_id' => $userId)
                     )
                         
                  );
                 
                 

                 
                 $this->set('distances',  $distances);
                
                  
                  
                  
                
		$this->render(implode('/', $path));
                
               
                
              //   $this->set('user', "labas");
	}
        
        public function distances(){
            
                Cache::clear(false, '_cake_model_');
                
              

                 $userName = $this->Auth->user('name');
                
                 $userId = $this->Auth->user('id');
                
                 $this->set('user', $userName );
                 
                 $this->loadModel('Distance');
                 
                  $this->Distance->disableCache();
             //   $cars = $this->Car->find('all');

                 
//                 $distances = $this->Distance->query("Select * from distances
//                     where user_id = $userId;
//                 ");
                 
                 
                 
                 $distances = $this->Distance->find( 'all', array(
                        'conditions'    => array('Distance.user_id' => $userId)
                     )
                         
                  );
                 
             //    $sumOfKm = $this->Distance->query("");

                 
                 $this->set('distances',  $distances);
               
        }
        
        
     
        
        public function projects(){
            
            
            
             $userId = $this->Auth->user('id');
              
             $this->set('user_id', $userId);
              
             $this->loadModel('Project');
            
             $data = array(
                    'Project' => array(
                        'user_id' => $userId
                    )
                );
        
            if(!empty($this->request->data)){    
                $this->Project->create();
                if ($this->Project->save($this->request->data)) {
                    $this->Session->setFlash('Saved.');
                  //  $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }

            $userName = $this->Auth->user('name');
                
            $userId = $this->Auth->user('id');

            $this->set('user', $userName );

            $projects_list = $this->Project->find( 'all', array(
                        'conditions'    => array('Project.user_id' => $userId)
                     )
                         
                  );
               
            $this->set('projects_list',  $projects_list);
            
            
                 
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
        
        
        public function new_distance(){
            $userId = $this->Auth->user('id');
              
             $this->set('user_id', $userId);
              
             $this->loadModel('Car');
             
             $userName = $this->Auth->user('name');
                
             $this->set('user', $userName );
             
             $list = $this->Car->find( 'list', array(
                        
                        'fields'     => array('car_unique_name', 'car_unique_name'),
                 'conditions'    => array('Car.user_id' => $userId)
                     )
                         
             );
               
            $this->set('list',  $list);
            
            $this->loadModel('Project');
            
            $list2 = $this->Project->find( 'list', array(
                       
                        'fields'     => array('Project.project','Project.project'),
                         'conditions'    => array('Project.user_id' => $userId)
                     )
                         
             );
               
            $this->set('list2', $list2);
            
            $this->loadModel('Distance');

            if(!empty($this->request->data)){    
                $this->Distance->create();
                if ($this->Distance->save($this->request->data)) {
                    $this->Session->setFlash('Saved.');
                    $this->redirect(array('action' => 'distances'));
                  //  $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }
            
            
             
             
        }
        
        
         public function new_purchase(){
             $userId = $this->Auth->user('id');
              
             $this->set('user_id', $userId);
              
             $this->loadModel('Purchase');
             
             $userName = $this->Auth->user('name');
                
             $this->set('user', $userName );
             
              $list2 = array("Benzinas" => "Benzinas","Dyzelins" => "Dyzelis","Dujos" => "Dujos");
             
              $this->set('list2', $list2 );
              
              
              if(!empty($this->request->data)){    
                $this->Purchase->create();
                if ($this->Purchase->save($this->request->data)) {
                    $this->Session->setFlash('Saved.');
                    $this->redirect(array('action' => 'purchases'));
                  //  $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }
        }
        
        
        public function purchases(){
             $userName = $this->Auth->user('name');
                
                 $userId = $this->Auth->user('id');
                
                 $this->set('user', $userName );
                 
                 $this->loadModel('Purchase');
             //   $cars = $this->Car->find('all');

                 
                 $purchases = $this->Purchase->find( 'all', array(
                        'conditions'    => array('Purchase.user_id' => $userId)
                     )
                         
                  );
                 
                 

                 
                 $this->set('purchases',  $purchases);
        }
        
          
       
       public function delete($id, $model) {
          
         $this->loadModel($model);
         $this->Session->setFlash($id +" " + $model);
          
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->$model->delete($id)) {
            $this->Session->setFlash('The item has been deleted');
            if($model == "Project" || $model == "Car"){
                 $this->redirect(array('action' => 'preferences'));
            }else{
                $this->redirect(array('action' => $model.'s'));
            }
           
        }
       }
       
       
       //id=elements_id&value=user_edited_content
       public function edit(){
           
           $this->layout = 'empty';
           
           $idAndField = $this->request->data['id'];
           list($id, $model, $field) = explode('.', $idAndField); 
           $value = $this->request->data['value'];
            $this->loadModel($model);
                      if(!$id){
				throw new NotFoundException(__('Invalid post'));
			}
			$post = $this->$model->findById($id);
			if(!$post){
				throw new NotFoundException(__('Invalid post'));
			}
			if($this->request->is('post') || $this->request->is('put')){
				$this->$model->id = $id;
                                
				if($this->$model->saveField($field, $value)){
                                //if($this->Distance->save($this->request->data)){
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
            
            
            
            $userId = $this->Auth->user('user_id');
              
             $this->set('user_id', $userId);
            
            $this->loadModel('Project');
            
             $data = array(
                    'Project' => array(
                        'user_id' => $userId
                    )
                );
        
            if(!empty($this->request->data)){    
                $this->Project->create();
                if ($this->Project->save($this->request->data)) {
                    $this->Session->setFlash('Saved.');
                  //  $this->redirect(array('action' => 'index'));
                } else {
                  //  $this->Session->setFlash('FAILED');
                }
            }else{

               //  $this->Session->setFlash('test');
            }


            $projects_list = $this->Project->find( 'all', array(
                        'conditions'    => array('Project.user_id' => $userId)
                     )
                         
                  );
               
            $this->set('projects_list',  $projects_list);
            
            $this->loadModel('User');
            
           
            
            if (!empty($this->data) && !empty($this->data['User']['password1'])) {
   
                 if ($this->User->save($this->data)) {
                    $this->Session->setFlash('password_has_been_changed.');
                    // call $this->redirect() here
                } else {
                    $this->Session->setFlash('password_could_not_be_changed.');
                }
            } 
            
              if (!empty($this->data) && !empty($this->data['User']['password3'])) {
   
                 if ($this->User->save($this->data)) {
                          $user_id = $this->data['User']['user_id'];
                    if ($id)
                    {
                        $this->user_id = $user_id;
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
                
                 $userId = $this->Auth->user('id');
                 
                          
             $this->set('user_id', $userId);
                
                 $this->set('user', $userName );
                 
                 
                 $this->loadModel('Car');
             
             $userName = $this->Auth->user('name');
                
             $this->set('user', $userName );
             
             $list = $this->Car->find( 'list', array(
                        
                        'fields'     => array('car_unique_name', 'car_unique_name'),
                 'conditions'    => array('Car.user_id' => $userId)
                     )
                         
             );
               
            $this->set('list',  $list);
                 
                 
                  $this->loadModel('Distance');
                 
                //  $date = $this->request->data['Distance']['date'];
                 
             // $this->redirect(array('action' => 'distances'));   
             
        }
        
        
        public function create_report(){
            
            $this->loadModel('Distance');

            $company = $this->request->data['Distance']['company'];   
            $company_code = $this->request->data['Distance']['company_code'];
            $date = $this->request->data['Distance']['date'];
             list($year, $month, $day) = explode('-', $date);
          //  $year = $this->request->data['Distance']['date']['year'];
          //  $month = $this->request->data['Distance']['date']['month'];
             
            $from_date =  $this->request->data['Distance']['from_date'];
            $to_date =  $this->request->data['Distance']['to_date'];
             
            $carAndauto_nr = $this->request->data['Distance']['car'];
            $driver = $this->request->data['Distance']['driver'];
            $travel_page_writer = $this->request->data['Distance']['travel_page_writer'];

            list($car, $auto_nr) = explode(' | ', $carAndauto_nr); 

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
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center">
                                            Kelionės metu pilta degalų</td>	
                                    </tr>
                                    <tr>
                                            <td style="border: 1px solid #000000; width: 100px; height: 25px; text-align:center"></td>	
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
            $pdf->writeHTML($tbl1, false, false, false, false, '');
            
            $userId = $this->Auth->user('id');
            
            $distances = $this->Distance->find( 'all', array(
                        'conditions'    => array('Distance.user_id' => $userId,
                                            'Distance.auto' => $carAndauto_nr,
                                            'Distance.date <=' => $to_date, 'Distance.date >=' => $from_date
                            
                            )
                     )
                         
                  );
            
         $tbl2 = '';   
         $nr = 0;
         $allKm = 0;
    	foreach( $distances as $row ) {
            $nr++;
            $allKm += $row["Distance"]["km"];
    	
    		//$pdf->Text(140, 150, $row["Distance"]['date'], false, false, true, 0, 0, 'L');
//    					printf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>
//    					<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>" , $row["Distance"]["auto"], $row["Distance"]["date"], $row["Distance"]["project"], $row["Distance"]["km_begin"], $row["Distance"]["km_end"]
//    					, $row["Distance"]["from_location"], $row["Distance"]["to_location"], $row["Distance"]["purpose"], $row["Distance"]["km"]);
    					
    	$tbl2.='<table><tr>
            <td style="border: 1px solid #000000; width: 30px; text-align:center;">'.$nr.'</td>
            <td style="border: 1px solid #000000; width: 60px; text-align:center">'.$row["Distance"]["date"].'</td>
            <td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Distance"]["km_begin"].'</td>
    		<td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Distance"]["from_location"].'</td>
    		<td style="border: 1px solid #000000; width: 90px; text-align:center">'.$row["Distance"]["to_location"].'</td>
    		<td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Distance"]["purpose"].'</td>
    		<td style="border: 1px solid #000000; width: 100px; text-align:center">'.$row["Distance"]["km_end"].'</td>
    		<td style="border: 1px solid #000000; width: 50px; text-align:center"></td>
    		<td style="border: 1px solid #000000; width: 55px; text-align:center">'.$row["Distance"]["km"].'</td>
    		
        </tr>
    	</table>
    	';
    		
    	}
    				
    	
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
    //	
    //	$result = mysql_query($from_to_query);
    //	$height = 295;
    //	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    //		$pdf->Text(60, $height, $row["date"], false, false, true, 0, 0, 'L');
    //		$height += 12;
    //	}
           // ob_end_clean();
            $pdf->Output('gas_report.pdf', 'D');
            $this->Session->setFlash('Your report has been created and is being downloaded');

      }
}
