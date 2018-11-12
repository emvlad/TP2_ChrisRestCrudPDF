<?php

namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Entrefilets Controller
 *
 * @property \App\Model\Table\EntrefiletsTable $Entrefilets
 *
 * @method \App\Model\Entity\Entrefilet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntrefiletsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['tags', 'files', 'findByGenre']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags', 'view'])) {
            return true;
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the entrefilet belongs to the current user.
        $entrefilet = $this->Entrefilets->findById($id)->first();

        return $entrefilet->user_id === $user['id'];
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'Themes', 'Gazettes', 'Files', 'Genres']
        ];
        $entrefilets = $this->paginate($this->Entrefilets);

        $this->set(compact('entrefilets'));
    }

    /**
     * View method
     *
     * @param string|null $id Entrefilet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $entrefilet = $this->Entrefilets->get($id, [
            'contain' => ['Users', 'Themes', 'Gazettes',
                'Files', 'Tags', 'Critiqs', 'Genres']
        ]);

        $this->set('entrefilet', $entrefilet);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $entrefilet = $this->Entrefilets->newEntity();
        if ($this->request->is('post')) {
            $entrefilet = $this->Entrefilets->patchEntity($entrefilet, $this->request->getData());

            // when we build authentication out.
            $entrefilet->user_id = $this->Auth->user('id');
            // Hardcoding the user_id =1

            if ($this->Entrefilets->save($entrefilet)) {
                $this->Flash->success(__('The entrefilet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entrefilet could not be saved. Please, try again.'));
        }

        //=================== list dependant =========================
        // Bâtir la liste des genres  
        $this->loadModel('Genres');
        $genres = $this->Genres->find('list', ['limit' => 200]);

        // Extraire l'id du premier genre
        $genres = $genres->toArray();
        reset($genres);
        $genre_id = key($genres);

        // Bâtir la liste des thèmes reliés à ce genre spécifique
        $themes = $this->Entrefilets->Themes->find('list', [
            'conditions' => ['Themes.genre_id' => $genre_id],
        ]);

        //==================Compact your lists================================
        $users = $this->Entrefilets->Users->find('list', ['limit' => 200]);
        $themes = $this->Entrefilets->Themes->find('list', ['limit' => 200]);
        $gazettes = $this->Entrefilets->Gazettes->find('list', ['limit' => 200]);
        $files = $this->Entrefilets->Files->find('list', ['limit' => 200]);
        $tags = $this->Entrefilets->Tags->find('list', ['limit' => 200]);
        $this->set(compact('entrefilet', 'users', 'themes', 'gazettes', 'files', 'tags', 'genres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Entrefilet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $entrefilet = $this->Entrefilets->get($id, [
            'contain' => ['Files', 'Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entrefilet = $this->Entrefilets->patchEntity($entrefilet, $this->request->getData());
            if ($this->Entrefilets->save($entrefilet)) {
                $this->Flash->success(__('The entrefilet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entrefilet could not be saved. Please, try again.'));
        }
        $users = $this->Entrefilets->Users->find('list', ['limit' => 200]);
        $themes = $this->Entrefilets->Themes->find('list', ['limit' => 200]);
        $gazettes = $this->Entrefilets->Gazettes->find('list', ['limit' => 200]);
        $files = $this->Entrefilets->Files->find('list', ['limit' => 200]);
        $tags = $this->Entrefilets->Tags->find('list', ['limit' => 200]);
        $this->set(compact('entrefilet', 'users', 'themes', 'gazettes', 'files', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entrefilet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $entrefilet = $this->Entrefilets->get($id);
        if ($this->Entrefilets->delete($entrefilet)) {
            $this->Flash->success(__('The entrefilet has been deleted.'));
        } else {
            $this->Flash->error(__('The entrefilet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
