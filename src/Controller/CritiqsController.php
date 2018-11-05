<?php

namespace App\Controller;

use App\Controller\AppController;
/* Rappel: 
        * aller...appeler...appliquer->3a
        * opère...utiliser...faire=> ouf
    
 */
/**
 * Critiqs Controller
 *
 * @property \App\Model\Table\CritiqsTable $Critiqs
 *
 * @method \App\Model\Entity\Critiq[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CritiqsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        
        /*   
        $role = $user['user_id'];
        if ($role !== "admin") {
            return $action === "poste";
        }else{}

        */
        
        // The edit and delete actions are allowed to logged in users for critiqs.
        if (in_array($action, ['edit', 'delete'])) {
            return true;
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Entrefilets']
        ];
        $critiqs = $this->paginate($this->Critiqs);

        $this->set(compact('critiqs'));
    }

    /**
     * View method
     *
     * @param string|null $id Critiq id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $critiq = $this->Critiqs->get($id, [
            'contain' => ['Entrefilets']
        ]);

        $this->set('critiq', $critiq);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $critiq = $this->Critiqs->newEntity();
        if ($this->request->is('post')) {
            $critiq = $this->Critiqs->patchEntity($critiq, $this->request->getData());
            if ($this->Critiqs->save($critiq)) {
                $this->Flash->success(__('The critic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The critic could not be saved. Please, try again.'));
        }
        $entrefilets = $this->Critiqs->Entrefilets->find('list', ['limit' => 200]);
        $this->set(compact('critiq', 'entrefilets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Critiq id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $critiq = $this->Critiqs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $critiq = $this->Critiqs->patchEntity($critiq, $this->request->getData());
            if ($this->Critiqs->save($critiq)) {
                $this->Flash->success(__('The critic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The critic could not be saved. Please, try again.'));
        }
        $entrefilets = $this->Critiqs->Entrefilets->find('list', ['limit' => 200]);
        $this->set(compact('critiq', 'entrefilets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Critiq id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $critiq = $this->Critiqs->get($id);
        if ($this->Critiqs->delete($critiq)) {
            $this->Flash->success(__('The critic has been deleted.'));
        } else {
            $this->Flash->error(__('The critic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    
   
    
    
    

}
