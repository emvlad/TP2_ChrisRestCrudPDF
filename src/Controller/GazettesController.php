<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Gazettes Controller
 *
 * @property \App\Model\Table\GazettesTable $Gazettes
 *
 * @method \App\Model\Entity\Gazette[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GazettesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['autocomplete', 'findGazettes', 'add', 'edit', 'delete']);
    }

    /**
     * findCar method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findGazettes() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $dynamique = $this->request->query['term'];
            $results = $this->Gazettes->find('all', array(
                'conditions' => array('Gazettes.dynamique LIKE ' => '%' . $dynamique . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['dynamique'], 'value' => $result['dynamique']);
            }
            echo json_encode($resultArr);
        }
    }

    /*
      public function autocomplete() {
        ------------- quoi?
      }

     */

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $gazettes = $this->paginate($this->Gazettes);

        $this->set(compact('gazettes'));
    }

    /**
     * View method
     *
     * @param string|null $id Gazette id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $gazette = $this->Gazettes->get($id, [
            'contain' => []
        ]);

        $this->set('gazette', $gazette);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $gazette = $this->Gazettes->newEntity();
        if ($this->request->is('post')) {
            $gazette = $this->Gazettes->patchEntity($gazette, $this->request->getData());
            if ($this->Gazettes->save($gazette)) {
                $this->Flash->success(__('The gazette has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gazette could not be saved. Please, try again.'));
        }
        $this->set(compact('gazette'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gazette id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $gazette = $this->Gazettes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gazette = $this->Gazettes->patchEntity($gazette, $this->request->getData());
            if ($this->Gazettes->save($gazette)) {
                $this->Flash->success(__('The gazette has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gazette could not be saved. Please, try again.'));
        }
        $this->set(compact('gazette'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gazette id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $gazette = $this->Gazettes->get($id);
        if ($this->Gazettes->delete($gazette)) {
            $this->Flash->success(__('The gazette has been deleted.'));
        } else {
            $this->Flash->error(__('The gazette could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
