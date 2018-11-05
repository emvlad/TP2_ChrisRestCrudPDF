<?php
use Migrations\AbstractSeed;

/**
 * EntrefiletsFiles seed.
 */
class EntrefiletsFilesSeed extends AbstractSeed
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
        ];

        $table = $this->table('entrefilets_files');
        $table->insert($data)->save();
    }
}
