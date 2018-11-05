<?php

namespace App\Test\TestCase\Controller;

use App\Controller\EntrefiletsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EntrefiletsController Test Case
 */
class EntrefiletsControllerTest extends IntegrationTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entrefilets',
        'app.entrefilets_title_translation',
        'app.i18n',
        'app.users',
        'app.critiqs',
        'app.files',
        'app.themes',
        'app.gazettes',
        'app.tags',
        'app.entrefilets_files',
        'app.entrefilets_tags'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/entrefilets');

        $this->assertResponseOk();
    }


    /**
     * Test view method
     *
     * @return void
     */
    public function testView() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete() {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
