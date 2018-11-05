<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CritiqsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CritiqsTable Test Case
 */
class CritiqsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CritiqsTable
     */
    public $Critiqs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.critiqs',
        'app.critiqs_critiq_translation',
        'app.i18n',
        'app.entrefilets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Critiqs') ? [] : ['className' => CritiqsTable::class];
        $this->Critiqs = TableRegistry::getTableLocator()->get('Critiqs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Critiqs);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
