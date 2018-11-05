<?php
namespace App\Test\Fixture;
use Cake\TestSuite\Fixture\TestFixture;
/**
 * EntrefiletsFixture
 *
 */
class EntrefiletsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' =>12, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => 12, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'slug' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'body' => ['type' => 'text', 'length' =>null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'published' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'precision' => null, 'comment' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'theme_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'gazette_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'gazette_id_fk' => ['type' => 'foreign', 'columns' => ['gazette_id'], 'references' => ['gazettes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'theme_id_fk' => ['type' => 'foreign', 'columns' => ['theme_id'], 'references' => ['themes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
      $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'title' => 'mon titreTest',
                'slug' => 'mon slugTest',
                'body' => 'myBodyTest',               
                'published' => '1',
                'created' => 'null',
                'modified' => 'null',
                'theme_id' =>'null',
                'gazette_id' => 'null'
                
            ],
          [
                'id' => 2,
                'user_id' => 2,
                'title' => 'mon titreTest',
                'slug' => 'mon slugTest',
                'body' => 'myBodyTest',               
                'published' => '0',
                'created' => 'null',
                'modified' => 'null',
                'theme_id' =>'null',
                'gazette_id' => 'null'
                
            ],
       
        
        ];
        parent::init();
    }
}