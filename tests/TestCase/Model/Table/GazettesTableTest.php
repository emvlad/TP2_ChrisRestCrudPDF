<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GazettesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GazettesTable Test Case
 */
class GazettesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GazettesTable
     */
    public $Gazettes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gazettes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Gazettes') ? [] : ['className' => GazettesTable::class];
        $this->Gazettes = TableRegistry::getTableLocator()->get('Gazettes', $config);
    }

     public function testFindDynamique() {
        $query = $this->Gazettes->find('dynamique');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [  
                'id' => 1,
                'dynamique' => 'Mensuel',
                'created' => false,
                'modified' => false
               
            ]
            
      
        ];
        $this->assertNotEmpty($expected, $result);
    }
    
    
    
    
    
    
    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gazettes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
