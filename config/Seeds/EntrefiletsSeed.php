<?php
use Migrations\AbstractSeed;

/**
 * Entrefilets seed.
 */
class EntrefiletsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'user_id' => NULL,
                'title' => 'Holy',
                'slug' => 'Flower',
                'body' => 'God\'s hands',
                'published' => '0',
                'created' => NULL,
                'modified' => NULL,
            ],
        ];

        $table = $this->table('entrefilets');
        $table->insert($data)->save();
    }
}
