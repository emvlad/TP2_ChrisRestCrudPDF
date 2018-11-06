<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntrefiletsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntrefiletsTable Test Case
 */
class EntrefiletsTableTest extends TestCase {

    /**
     * Test subject
     *
     * @var \App\Model\Table\EntrefiletsTable
     */
    public $Entrefilets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entrefilets',       
        'app.users',
        'app.critiqs',
        'app.tags',    
        'app.themes',
        'app.gazettes',
        'app.files',        
        'core.translates',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Entrefilets') ? [] : ['className' => EntrefiletsTable::class];
        $this->Entrefilets = TableRegistry::getTableLocator()->get('Entrefilets', $config);
    }

    public function testFindPublished() {
        $query = $this->Entrefilets->find('published');
       
        $this->assertInstanceOf('Cake\ORM\Query', $query);    
        $result = $query->hydrate(false)->toArray();
        
       
        $expected = [
            [
                'id' => 1,
                'user_id' => 1,
                'title' => 'mon titreTest',
                'slug' => 'mon slugTest',
                'body' => 'myBodyTest',
                'published' => true,
               'created' => false,
                'modified' => false,
                'theme_id' =>0,
                'gazette_id' => 0
               
            ],
           
            
         
        ];
        $this->assertEquals($expected, $result);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Entrefilets);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findTagged method
     *
     * @return void
     */
    public function testFindTagged() {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
