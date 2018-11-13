<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ThemesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ThemesController Test Case
 */
class ThemesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.themes',
        'app.genres',
        'app.entrefilets'
    ];

    
    public function testIndexQueryData()
    {
        $this->get('/themes?page=1');

        $this->assertResponseOk();
       
    }
    
    /**
     * Test view method
     *
     * @return void
     */
    /*public function testView()
    {
       
       
         $this->get('/themes/view');
        $this->assertResponseOk();
    }
    
    */

    
}
