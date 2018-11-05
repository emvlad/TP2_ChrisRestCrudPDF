<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Files Model
 *
 * @property \App\Model\Table\EntrefiletsTable|\Cake\ORM\Association\HasMany $Entrefilets
 * @property \App\Model\Table\EntrefiletsTable|\Cake\ORM\Association\BelongsToMany $Entrefilets
 *
 * @method \App\Model\Entity\File get($primaryKey, $options = [])
 * @method \App\Model\Entity\File newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\File[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\File|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\File|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\File patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\File[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\File findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('files');
        $this->setDisplayField('slide');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Entrefilets', [
            'foreignKey' => 'file_id'
        ]);
        $this->belongsToMany('Entrefilets', [
            'foreignKey' => 'file_id',
            'targetForeignKey' => 'entrefilet_id',
            'joinTable' => 'entrefilets_files'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->notEmpty('id', 'create');

        $validator
            ->scalar('slide')
            ->allowEmpty('slide');

        $validator
            ->scalar('path')
            ->allowEmpty('path');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
