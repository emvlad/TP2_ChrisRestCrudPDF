<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'email' => 'cevchris23@gmail.com',
                'password' => '$2y$10$djybtew8If8n4ePSpsvxMetYKCQuWn5t/EZLOek5wbJase1.nsoZK',
                'created' => '2018-10-09 16:00:48',
                'modified' => '2018-10-09 16:00:48',
                'email_confirm' => '1',
                'user_uuid' => '0d61c961-bc90-4575-9da7-9b12631893e7',
                'role_id' => NULL,
            ],
            [
                'id' => '2',
                'email' => 'cevchris23@yahoo.fr',
                'password' => '$2y$10$8A.3sGyCqdZqUSND1T2dj.Wa1HP1bmTCzdivHgM2XncR/69B7bDK2',
                'created' => '2018-10-11 04:44:21',
                'modified' => '2018-10-11 04:44:21',
                'email_confirm' => NULL,
                'user_uuid' => '1da18067-d728-4cfa-ba25-b08179e92108',
                'role_id' => NULL,
            ],
            [
                'id' => '3',
                'email' => 'cevchris23@hotmail.com',
                'password' => '$2y$10$9NYnQhjbc8NBvK9phC69q.SPnyNckYVvm1UPVIYZWaXffgBCB3LOO',
                'created' => '2018-10-11 04:46:24',
                'modified' => '2018-10-11 04:46:24',
                'email_confirm' => '1',
                'user_uuid' => '73494f25-430d-4db5-9181-eae89de53d24',
                'role_id' => NULL,
            ],
            [
                'id' => '4',
                'email' => 'cevchris23@aol.com',
                'password' => '$2y$10$F0ijUy7QT6ZcsyyXU21LeecMOFQzncX/UHgZjWMvzF.gDkMdx0Mz.',
                'created' => '2018-10-11 04:49:58',
                'modified' => '2018-10-11 04:49:58',
                'email_confirm' => '1',
                'user_uuid' => '352271bd-2c92-4b74-881a-643ba3f707b8',
                'role_id' => NULL,
            ],
            [
                'id' => '5',
                'email' => 'cevchris23@ol.com',
                'password' => '$2y$10$FpaMoc.ZWa5KnQNzER3Dn.ww8.dUZsRHGWJy8HHljFpDwA5QVjAyy',
                'created' => '2018-10-11 05:05:49',
                'modified' => '2018-10-11 05:05:49',
                'email_confirm' => '1',
                'user_uuid' => 'a32fd260-bd1e-4447-ae55-f4124ce68ec3',
                'role_id' => NULL,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
