<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoctorProcedures Controller
 *
 * @property \App\Model\Table\DoctorProceduresTable $DoctorProcedures
 */
class DoctorProceduresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Doctors', 'Procedures']
        ];
        $doctorProcedures = $this->paginate($this->DoctorProcedures);

        $this->set(compact('doctorProcedures'));
        $this->set('_serialize', ['doctorProcedures']);
    }

    /**
     * View method
     *
     * @param string|null $id Doctor Procedure id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctorProcedure = $this->DoctorProcedures->get($id, [
            'contain' => ['Doctors', 'Procedures']
        ]);

        $this->set('doctorProcedure', $doctorProcedure);
        $this->set('_serialize', ['doctorProcedure']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctorProcedure = $this->DoctorProcedures->newEntity();
        if ($this->request->is('post')) {
            $doctorProcedure = $this->DoctorProcedures->patchEntity($doctorProcedure, $this->request->data);
            if ($this->DoctorProcedures->save($doctorProcedure)) {
                $this->Flash->success(__('The doctor procedure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctor procedure could not be saved. Please, try again.'));
        }
        $doctors = $this->DoctorProcedures->Doctors->find('list', ['limit' => 200]);
        $procedures = $this->DoctorProcedures->Procedures->find('list', ['limit' => 200]);
        $this->set(compact('doctorProcedure', 'doctors', 'procedures'));
        $this->set('_serialize', ['doctorProcedure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor Procedure id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctorProcedure = $this->DoctorProcedures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctorProcedure = $this->DoctorProcedures->patchEntity($doctorProcedure, $this->request->data);
            if ($this->DoctorProcedures->save($doctorProcedure)) {
                $this->Flash->success(__('The doctor procedure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctor procedure could not be saved. Please, try again.'));
        }
        $doctors = $this->DoctorProcedures->Doctors->find('list', ['limit' => 200]);
        $procedures = $this->DoctorProcedures->Procedures->find('list', ['limit' => 200]);
        $this->set(compact('doctorProcedure', 'doctors', 'procedures'));
        $this->set('_serialize', ['doctorProcedure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor Procedure id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctorProcedure = $this->DoctorProcedures->get($id);
        if ($this->DoctorProcedures->delete($doctorProcedure)) {
            $this->Flash->success(__('The doctor procedure has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor procedure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
