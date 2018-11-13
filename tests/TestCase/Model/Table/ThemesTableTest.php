<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThemesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThemesTable Test Case
 */
class ThemesTableTest extends TestCase {

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThemesTable
     */
    public $Themes;

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

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Themes') ? [] : ['className' => ThemesTable::class];
        $this->Themes = TableRegistry::getTableLocator()->get('Themes', $config);
    }

    public function testNoBlank() {
        $blank = ['sujet' => ''];
        $sujet = $this->Themes->newEntity($blank);

        $resultingError = $this->Themes->validator()->errors($blank);

        $expectedError = [
            'sujet' => ['_empty' => 'This field cannot be left empty']
        ];
        $this->assertEquals($expectedError, $resultingError);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Themes);

        parent::tearDown();
    }

}
