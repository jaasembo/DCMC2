<?php
namespace App\Controller;
//Namespace: Cake\ORM;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Doctors Controller
 *
 * @property \App\Model\Table\DoctorsTable $Doctors
 */
class DoctorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	 public function initialize()
	 {
          parent::initialize();
		  $this->loadModel('Depts');
		  $this->loadModel('Announcements');
		  $this->loadModel('procedures');
		 // $this->viewBuilder()->layout('BootstrapUI');
		 $this->viewBuilder()->layout('frontend');
     }
    public function index()
    {
		$update = $this->Doctors->newEntity();
		//debug($this->request->data);die();
		$doctor = $this->Doctors->patchEntity($update, $this->request->data);
		
		//debug($doctor->field);die();
		//debug($doctor);die();
		$test=$doctor->field;
		//debug($test);die();
		//add doctors daily schedule
		if ($this->request->is('post')) {
           $depts = $this->request->data('dept');
		   //debug( $depts);die;
              foreach($test as $key=> $value){
             $saveData = [
                 'OnSchedule' => $value == "one" ? 1 : 0,
                 'dept_id' => $depts[$key] == "one" ? 1: $depts[$key]
            ];
          $this->Doctors->updateAll($saveData, ['id' => $key]);
		
			
         }
		}
		//$this->Doctors->updateAll($test);
		$doctors = $this->paginate($this->Doctors);
		$dept =$this->Depts->find('all')->select(['id', 'dname']);
		$procedures =$this->procedures->find('all')->select(['id', 'procedure_name']);
		$dept_dropdown = [];
		//debug($nan);die;
foreach($dept as $k => $v){
 $dept_dropdown[$v->id] = $v->dname;
}
//for procedures
$announc_dropdown = [];
	 foreach($procedures as $key => $value){
 $announc_dropdown[$value->id] = $value->procedure_name;
}

		
		//debug($dept);die;
		//debug($doctors);die;

        $this->set(compact('doctors'));
        $this->set('_serialize', ['doctors']);
		$this->set(compact('dept_dropdown'));
		//for procedures
		$this->set(compact('announc_dropdown'));
    }

    /**
     * View method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		
		
		//debug($doctor);die;
        $doctor = $this->Doctors->get($id, [
            'contain' => []
        ]);

        $this->set('doctor', $doctor);
        $this->set('_serialize', ['doctor']);
    }


    
	
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
   $doctor = $this->Doctors->newEntity();
   //debug($doctor);die;
        if ($this->request->is('post')) {
                 $doctor = $this->Doctors->patchEntity($doctor, $this->request->data);
    if (!empty($this->request->data['photo'])){
		  $file = $this->request->data['photo'];
      //debug(WWW_ROOT);die();
     //debug($file);die();
     $ext = substr(strtolower(strrchr($file['name'], '.')),1);
     //debug($ext);die();
     $arr_ext = array('jpeg', 'jpg', 'gif','png','JPG');
     $setNewFilename = "profile_".time() . "_" . rand(000000, 999999);
     $imageFilename = $setNewFilename . '.' . $ext;
     $uploadpath = WWW_ROOT . 'img\\' . $imageFilename;
     if (in_array($ext, $arr_ext)){
    $getFormvalue = $this->Doctors->patchEntity($doctor, $this->request->data);
        (move_uploaded_file($file['tmp_name'], $uploadpath));
      $getFormvalue->photo = $imageFilename;
     if ($this->Doctors->save($getFormvalue)){
     $this->Flash->success(__('The doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{
            $this->Flash->error(__('The doctor could not be saved. Please, try again.')); 
          }
  }  
   // debug($getFormvalue); die();
        $this->set(compact('doctor'));
       $this->set('_serialize', ['doctor']);
    }
	}
	}

    /**
     * Edit method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctor = $this->Doctors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->data);
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('The doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctor could not be saved. Please, try again.'));
        }
        $this->set(compact('doctor'));
        $this->set('_serialize', ['doctor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $this->Flash->success(__('The doctor has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function Onschedule()
	{
		
		//$query = $this->Depts->find('all', ['conditions' => ['dname' => 'Radiology'], 'contain' => ['Doctors']])->all('OnSchedule' == 0);
		$results = $this->Depts->find('all', ['conditions' => [], 'contain' => ['Doctors']])->all();
		//This loads results for the announcements section to show doctor images
		$tset1 =$this->procedures->find('all', ['conditions' => [], 'contain' => ['Doctors']])->all();
		//$query = $this->Depts->find('all')->contain(['Doctors']);
		//debug($results);die;
		//debug($doctor);die;
		//debug($tset1);die;
		//$doctors = $this->paginate($this->Doctors);
		$doctors = $this->paginate($this->Doctors);
		$dept =$this->Depts->find('all')->select(['id', 'dname']);
		//debug($procedures);die;
$procedures=$this->procedures->find('all')->select(['id', 'procedure_name']);
		//$announcements =$this->Announcements->find('all')->select(['id', 'Image','Holiday_name','Message','IR_PROCEDURES']);
		$announcements = $this->paginate($this->Announcements);
		//debug($procedures);die;
		//$query = $this->Doctors->find('all',['conditions' => ['OnSchedule' => 1]]);
		//$onSchedule = array();
			//debug($results);die();
		/*foreach ($results as $key=>$value) {
			if($value['OnSchedule'] == 1){
				//debug($value);
				$onSchedule[] = $value;
			}
				        
		}*/
		$depts= [];
foreach($dept as $k => $v){
 $depts[$v->id] = $v->dname;
}
$docs=[];
foreach($procedures as $k1 => $v1){
 $docs[$v1->id] = $v1->procedure_name;
}

	

		//debug($docs);die();
		$this->set(compact('results'));
		$this->set(compact('tset1'));
		$this->set(compact('depts'));
		$this->set(compact('docs'));
		$this->set(compact('announcements'));
		$this->set('_serialize', ['announcements']);
		//debug($depts);die();
		//debug($results);die;
        //$this->set('_serialize', ['onSchedule']);
		//$this->set(compact('onSchedule'));
		//$this->set('onSchedule',$onSchedule);
		//$this->set('_serialize', ['onSchedule']);
		//debug($results);die;
	}
	public function Onschedule1()
	{
		
		//$query = $this->Depts->find('all', ['conditions' => ['dname' => 'Radiology'], 'contain' => ['Doctors']])->all('OnSchedule' == 0);
		$results = $this->Depts->find('all', ['conditions' => [], 'contain' => ['Doctors']])->all();
		//This loads results for the announcements section to show doctor images
		$tset1 =$this->procedures->find('all', ['conditions' => [], 'contain' => ['Doctors']])->all();
		//$query = $this->Depts->find('all')->contain(['Doctors']);
		//debug($results);die;
		//debug($doctor);die;
		//debug($tset1);die;
		//$doctors = $this->paginate($this->Doctors);
		$doctors = $this->paginate($this->Doctors);
		$dept =$this->Depts->find('all')->select(['id', 'dname']);
		//debug($procedures);die;
$procedures=$this->procedures->find('all')->select(['id', 'procedure_name']);
		//$announcements =$this->Announcements->find('all')->select(['id', 'Image','Holiday_name','Message','IR_PROCEDURES']);
		$announcements = $this->paginate($this->Announcements);
		//debug($procedures);die;
		//$query = $this->Doctors->find('all',['conditions' => ['OnSchedule' => 1]]);
		//$onSchedule = array();
			//debug($results);die();
		/*foreach ($results as $key=>$value) {
			if($value['OnSchedule'] == 1){
				//debug($value);
				$onSchedule[] = $value;
			}
				        
		}*/
		$depts= [];
foreach($dept as $k => $v){
 $depts[$v->id] = $v->dname;
}
$docs=[];
foreach($procedures as $k1 => $v1){
 $docs[$v1->id] = $v1->procedure_name;
}

	

		//debug($docs);die();
		$this->set(compact('results'));
		$this->set(compact('tset1'));
		$this->set(compact('depts'));
		$this->set(compact('docs'));
		$this->set(compact('announcements'));
		$this->set('_serialize', ['announcements']);
		//debug($depts);die();
		//debug($results);die;
        //$this->set('_serialize', ['onSchedule']);
		//$this->set(compact('onSchedule'));
		//$this->set('onSchedule',$onSchedule);
		//$this->set('_serialize', ['onSchedule']);
		//debug($results);die;
	}
}
