<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller *
 * @property \App\Model\Table\UsersTable $Users *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        // $this->Auth->allow(['logout', 'add', 'edit','delete']);
        $this->Auth->allow(['logout', 'add','findUsers']);
        
    }
     //======================== Voir Prof(1)========================================   

        public function isAuthorized($user) {
            parent::isAuthorized($user);

     $action = $this->request->getParam('action');
        if(isset($user['role_id']) && $user['role_id']==='Admin'){
            
            if(in_array($action, ['add','edit','delete']))
                    
            return true;
        }
         
         elseif(isset($user['role_id']) && $user['role_id']==='Super-User'){
             
             if(in_array($action, ['add','edit']))
            return true;
        } else{
            return false;
        }
        
      }
//==================================***=========================================

  public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));

        $this->paginate = ['contain' => ['roles']
        ];
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     *  When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Entrefilets']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add,
     *  renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            //============================ Voir Prof (2)=============================         
            //create and save uuid    
            $uuid = Text::uuid();
            $user->user_uuid = $uuid;
           //  debug($user); die();
            if ($user->user_uuid !== null) {
                
                $user->email_confirm = true;
            }

//=================================== (3) ==================================            
            if ($this->Users->save($user)) {

                 $confirmation_link = "http://" . $_SERVER['HTTP_HOST']
                  . $this->request->webroot . "users/confirm/" . $uuid;
                 
                //send email
                $email = new Email('default');
                $email->to($user->email)->subject('Account Created')
                        ->send("Please to confirm - click here:". $confirmation_link);                      
                $this->Flash->success(__('User saved - Check your email to activate your account'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method  
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException 
     * When record not found.
     */
    public function delete($id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    
     public function findUsers() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Users->find('all', array(
                'conditions' => array('Users.full_name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['full_name'], 'value' => $result['full_name']);
            }
            echo json_encode($resultArr);
        }
    }

    public function autocomplete() {
        
    }


   
  }