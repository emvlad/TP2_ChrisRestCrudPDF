<?php

namespace App\Controller\Admin;

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
        $this->viewBuilder()->setLayout('admin');
        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
       
        $entrefilets = $this->paginate($this->Entrefilets);
        $this->set(compact('entrefilets'));
    }

    

}
