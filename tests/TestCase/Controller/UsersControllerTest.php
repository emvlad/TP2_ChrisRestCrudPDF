<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.entrefilets'
    ];
    
        
    public function testAddAuthenticated() {
        // données de session
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email' => 'fillEmail@all.com',
                ]
            ]
        ]);
        $this->get('/users/add');
        $this->assertResponseOk();
    }
    
    /*
      public function testAddUnauthenticatedFails() {
        // Pas de données de session définies.
        $this->get('/users/add');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
    */
   

}
