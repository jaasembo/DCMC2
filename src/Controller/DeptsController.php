<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Depts Controller
 *
 * @property \App\Model\Table\DeptsTable $Depts
 */
class DeptsController extends AppController
{
	

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	 public function initialize(){
    parent::initialize();
    // Set the layout
    $this->viewBuilder()->layout('frontend');
}
    public function index()
    {
        $depts = $this->paginate($this->Depts);

        $this->set(compact('depts'));
        $this->set('_serialize', ['depts']);
		
    }

    /**
     * View method
     *
     * @param string|null $id Dept id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dept = $this->Depts->get($id, [
            'contain' => []
        ]);

        $this->set('dept', $dept);
        $this->set('_serialize', ['dept']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dept = $this->Depts->newEntity();
        if ($this->request->is('post')) {
            $dept = $this->Depts->patchEntity($dept, $this->request->data);
            if ($this->Depts->save($dept)) {
                $this->Flash->success(__('The dept has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dept could not be saved. Please, try again.'));
        }
        $this->set(compact('dept'));
        $this->set('_serialize', ['dept']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dept id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dept = $this->Depts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dept = $this->Depts->patchEntity($dept, $this->request->data);
            if ($this->Depts->save($dept)) {
                $this->Flash->success(__('The dept has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dept could not be saved. Please, try again.'));
        }
        $this->set(compact('dept'));
        $this->set('_serialize', ['dept']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dept id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dept = $this->Depts->get($id);
        if ($this->Depts->delete($dept)) {
            $this->Flash->success(__('The dept has been deleted.'));
        } else {
            $this->Flash->error(__('The dept could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
