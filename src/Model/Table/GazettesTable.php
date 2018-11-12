<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gazettes Model
 *
 * @method \App\Model\Entity\Gazette get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gazette newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gazette[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gazette|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gazette|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gazette patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gazette[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gazette findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GazettesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('gazettes');
        $this->setDisplayField('dynamique');
        $this->setPrimaryKey('id');        
        $this->hasMany('Entrefilets', [
            'foreignKey' => 'gazette_id'
        ]);
        
       
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->notEmpty('id', 'create');

        $validator
                ->scalar('dynamique')
                ->allowEmpty('dynamique')
                ->maxLength('dynamique', 200);

        return $validator;
    }
    
     public function findDynamique(Query $query, array $options) {
        $query->where([
            $this->alias() . '.dynamique' => "Mensuel"
        ]);
        return $query;
    }
    
    

}
