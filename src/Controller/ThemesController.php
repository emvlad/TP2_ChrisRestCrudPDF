<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Themes Controller
 *
 * @property \App\Model\Table\ThemesTable $Themes
 *
 * @method \App\Model\Entity\Theme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThemesController extends AppController
{
    
     public function initialize() {
        parent::initialize();
        $this->Auth->allow(['findByGenre']);
    }
       public function isAuthorized($user) {
        // All actions are allowed to logged in users for themes.
        return true;
    }
    
    public function findByGenre() {

    $genre_id = $this->request->query('genre_id');

        $themes = $this->Themes->find('all', [
            'conditions' => ['genre_id' => $genre_id],
        ]);
        $this->set('themes', $themes);
        $this->set('_serialize', ['themes']);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genres']
        ];
        $themes = $this->paginate($this->Themes);

        $this->set(compact('themes'));
    }

    /**
     * View method
     *
     * @param string|null $id Theme id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $theme = $this->Themes->get($id, [
            'contain' => ['Genres', 'Entrefilets']
        ]);

        $this->set('theme', $theme);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $theme = $this->Themes->newEntity();
        if ($this->request->is('post')) {
            $theme = $this->Themes->patchEntity($theme, $this->request->getData());
            if ($this->Themes->save($theme)) {
                $this->Flash->success(__('The theme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The theme could not be saved. Please, try again.'));
        }
        $genres = $this->Themes->Genres->find('list', ['limit' => 200]);
        $this->set(compact('theme', 'genres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Theme id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $theme = $this->Themes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $theme = $this->Themes->patchEntity($theme, $this->request->getData());
            if ($this->Themes->save($theme)) {
                $this->Flash->success(__('The theme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The theme could not be saved. Please, try again.'));
        }
        $genres = $this->Themes->Genres->find('list', ['limit' => 200]);
        $this->set(compact('theme', 'genres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Theme id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $theme = $this->Themes->get($id);
        if ($this->Themes->delete($theme)) {
            $this->Flash->success(__('The theme has been deleted.'));
        } else {
            $this->Flash->error(__('The theme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
