<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Announcements Controller
 *
 * @property \App\Model\Table\AnnouncementsTable $Announcements
 */
class AnnouncementsController extends AppController
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
		  $this->loadModel('Doctors');
		   $this->loadModel('Procedures');
          // Set the layout
           $this->viewBuilder()->layout('frontend');
     }
    public function index()
    {
       
	  $update = $this->Announcements->newEntity();
		//debug($this->request->data);die();
		$announcements = $this->Announcements->patchEntity($update, $this->request->data);
		$procedures = $this->Procedures->patchEntity($update, $this->request->data);
		
		$test=$announcements->field;
		//debug($announcements);die();
		//debug($test);die();
        
		//$doctors =$this->Doctors->find('all')->select(['id', 'firstname','OnSchedule']);
       // $doctor = $this->paginate($this->Doctors);
		//debug($announcements);die;
		 //debug($test);die;
		 if ($this->request->is('post')) {
		$docs = $this->request->data('doc');
		//debug($this->request->data());die;
//debug($docs);die;
foreach($docs as $key=> $value){
	//debug($key);die;
	//debug($value);die;
	//debug($announcements);die;
	$saveData = [
                 "IR_PROCEDURES" => $this->request->data['field'][$key],
                 'doctor_id' => $value == "one" ? 1: $value];
		$testy= $this->Announcements->updateAll($saveData, ['id' => $key]);
		//debug($testy);die;
			
}

		 }
		 
		 $announcements = $this->paginate($this->Announcements);
		 $docs =$this->Doctors->find('all')->select(['id', 'firstname']);
		 $procedures = $this->Procedures->find('all')->select(['id', 'procedure_name']);
		$dept_dropdown = [];
		 //debug($announcements);die;
		  //debug($procedures);die;
		 foreach($docs as $k => $v){
 $dept_dropdown[$v->id] = $v->firstname;
}
//debug($dept_dropdown);die;
$announc_dropdown = [];
	 foreach($announcements as $k => $v){
 $announc_dropdown[$v->id] = $v->IR_PROCEDURES;
}
$proc = [];
	 foreach($procedures as $k => $v){
 $proc[$v->id] = $v->procedure_name;
}
//debug($proc);die;
             

        $this->set(compact('announcements'));
        $this->set('_serialize', ['announcements']);
		$this->set(compact('doctors'));
        $this->set('_serialize', ['doctors']);
		$this->set(compact('dept_dropdown'));
		$this->set(compact('announc_dropdown'));
		$this->set(compact('proc'));
		 $this->set(compact('procedures'));
    
	}

    /**
     * View method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => []
        ]);

        $this->set('announcement', $announcement);
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
   public function add()
    {
  
  $DoctorList=$this->Doctors->find('all', array('fields'=>array('id','firstname')))->toArray();	
     //debug($DoctorList);die;
   $announcement = $this->Announcements->newEntity();
        if ($this->request->is('post')) {
                  $announcement = $this->Announcements->patchEntity( $announcement, $this->request->data);
    if (!empty($this->request->data['Image'])){
		  $file = $this->request->data['Image'];
      //debug(WWW_ROOT);die();
     //debug($file);die();
     $ext = substr(strtolower(strrchr($file['name'], '.')),1);
     //debug($ext);die();
     $arr_ext = array('jpeg', 'jpg', 'gif','png','JPG','IMG');
     $setNewFilename = "profile_".time() . "_" . rand(000000, 999999);
     $imageFilename = $setNewFilename . '.' . $ext;
     $uploadpath = WWW_ROOT . 'img\\' . $imageFilename;
     if (in_array($ext, $arr_ext)){
    $getFormvalue = $this->Announcements->patchEntity( $announcement, $this->request->data);
        (move_uploaded_file($file['tmp_name'], $uploadpath));
      $getFormvalue->Image = $imageFilename;
	  //debug($getFormvalue); die();
     if ($this->Announcements->save($getFormvalue)){
     $this->Flash->success(__('The Announcment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{
            $this->Flash->error(__('The Announcement could not be saved. Please, try again.')); 
          }
  }  
    
        
    }
	//debug($announcement);die; 
	//$this->set(compact('announcement'));
	$this->set('announcement', $announcement);
       $this->set('_serialize', ['announcement']);
	   
	}
	$this->set( 'DoctorList', $DoctorList);
	}

    /**
     * Edit method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $this->set(compact('announcement'));
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function updates()
    {
		$update = $this->Doctors->newEntity();
		//debug($doctor);die;
		
		$doctor = $this->Doctors->patchEntity($update, $this->request->data);
		$test=$doctor->field;
		//debug($test);die();
		if ($this->request->is('post')) {
        if (!empty($proc=$this->request->data('field'))){
		  //debug($proc);die;
              foreach($test  as $key=>$value){
				  //debug($proc->$key);die;
             $saveData = [
                 'procedures_id' => $proc[$key] =="one"? 1:  $proc[$key]
            ];
          $this->Doctors->updateAll($saveData, ['id' => $key]);
		
			
         }
		}
		}
	//for procedures
	$doctors = $this->paginate($this->Doctors);
	$procedures =$this->Procedures->find('all')->select(['id', 'procedure_name']);
$announc_dropdown = [];
	 foreach($procedures as $key => $value){
 $announc_dropdown[$value->id] = $value->procedure_name;
}
//debug($announc_dropdown);die;
//for procedures
		$this->set(compact('announc_dropdown'));
		$this->set(compact('doctors'));
        $this->set('_serialize', ['doctors']);
	
}
}
