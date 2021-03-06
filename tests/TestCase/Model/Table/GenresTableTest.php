<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GenresTable Test Case
 */
class GenresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GenresTable
     */
    public $Genres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.genres',
        'app.entrefilets',
        'app.themes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Genres') ? [] : ['className' => GenresTable::class];
        $this->Genres = TableRegistry::getTableLocator()->get('Genres', $config);
    }
    
    
    
    

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Genres);

        parent::tearDown();
    }

  
}
