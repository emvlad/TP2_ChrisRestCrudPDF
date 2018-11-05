<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('critiqs')
            ->addColumn('entrefilet_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('full_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('critiq', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'entrefilet_id',
                ]
            )
            ->create();

        $this->table('entrefilets')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('slug', 'string', [
                'default' => null,
                'limit' => 191,
                'null' => false,
            ])
            ->addColumn('body', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('published', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'slug',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('entrefilets_files', ['id' => false, 'primary_key' => ['']])
            ->addColumn('id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('entrefilet_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'entrefilet_id',
                ]
            )
            ->addIndex(
                [
                    'file_id',
                ]
            )
            ->addIndex(
                [
                    'entrefilet_id',
                    'file_id',
                ]
            )
            ->create();

        $this->table('entrefilets_tags', ['id' => false, 'primary_key' => ['entrefilet_id', 'tag_id']])
            ->addColumn('entrefilet_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('tag_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'entrefilet_id',
                ]
            )
            ->addIndex(
                [
                    'tag_id',
                ]
            )
            ->create();

        $this->table('files')
            ->addColumn('slide', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('path', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('status', 'boolean', [
                'comment' => '1 = Active, 0 = Inactive',
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('i18n', ['id' => false, 'primary_key' => ['id', 'locale', 'model', 'foreign_key', 'field']])
            ->addColumn('id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('locale', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('field', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('tags', ['id' => false, 'primary_key' => ['id', 'title']])
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 191,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('user_uuid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('email_confirm', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_uuid',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('critiqs')
            ->addForeignKey(
                'entrefilet_id',
                'entrefilets',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('entrefilets')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('entrefilets_files')
            ->addForeignKey(
                'entrefilet_id',
                'entrefilets',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'file_id',
                'files',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('entrefilets_tags')
            ->addForeignKey(
                'entrefilet_id',
                'entrefilets',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'tag_id',
                'tags',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('critiqs')
            ->dropForeignKey(
                'entrefilet_id'
            )->save();

        $this->table('entrefilets')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('entrefilets_files')
            ->dropForeignKey(
                'entrefilet_id'
            )
            ->dropForeignKey(
                'file_id'
            )->save();

        $this->table('entrefilets_tags')
            ->dropForeignKey(
                'entrefilet_id'
            )
            ->dropForeignKey(
                'tag_id'
            )->save();

        $this->table('critiqs')->drop()->save();
        $this->table('entrefilets')->drop()->save();
        $this->table('entrefilets_files')->drop()->save();
        $this->table('entrefilets_tags')->drop()->save();
        $this->table('files')->drop()->save();
        $this->table('i18n')->drop()->save();
        $this->table('tags')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
