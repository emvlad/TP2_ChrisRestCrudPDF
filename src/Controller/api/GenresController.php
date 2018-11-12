<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class GenresController extends AppController {
    
    public function initialize() {
        parent::initialize();
         
        // Set the layout.
        $this->viewBuilder()->setLayout('monopage');
        
    }

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
       'sortWhitelist' => [
            'id', 'genre', 'classification'
        ]

        
    ];
    
    public function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
        $this->log('GenresController::beforeFilter');
        /*if ($this->request->param('action') === 'add') {
            $this->eventManager()->off($this->Csrf);
        }*/
    }
    
      /*    public function isAuthorized($user) {
            return true;
          }    
        */  
    
}
