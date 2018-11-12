<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Genres Controller
 *
 * @property \App\Model\Table\GenresTable $Genres
 *
 * @method \App\Model\Entity\Genre[] paginate($object = null, array $settings = [])
 */
class GenresController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 150,
      'sortWhitelist' => [
            'id', 'genre', 'classification'
        ]
    ];

    public function initialize() {
        parent::initialize();
        // Use the Bootstrap layout from the plugin.
       //  $this->viewBuilder()->setLayout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $genres = $this->paginate($this->Genres);

        $this->set(compact('genres'));
        $this->set('_serialize', ['genres']);
    }
  
    /**
     * View method
     *
     * @param string|null $id Genre id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $genre = $this->Genres->get($id, [
            'contain' => []
        ]);

        $this->set('genre', $genre);
        $this->set('_serialize', ['genre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $genre = $this->Genres->newEntity();
        if ($this->request->is('post')) {
            $genre = $this->Genres->patchEntity($genre, $this->request->getData());
            if ($this->Genres->save($genre)) {
                $this->Flash->success(__('The genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre could not be saved. Please, try again.'));
        }
        $this->set(compact('genre'));
        $this->set('_serialize', ['genre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Genre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $genre = $this->Genres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genre = $this->Genres->patchEntity($genre, $this->request->getData());
            if ($this->Genres->save($genre)) {
                $this->Flash->success(__('The genre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre could not be saved. Please, try again.'));
        }
        $this->set(compact('genre'));
        $this->set('_serialize', ['genre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Genre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $genre = $this->Genres->get($id);
        if ($this->Genres->delete($genre)) {
            $this->Flash->success(__('The genre has been deleted.'));
        } else {
            $this->Flash->error(__('The genre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
