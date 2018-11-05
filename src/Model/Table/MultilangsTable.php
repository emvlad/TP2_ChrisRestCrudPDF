<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class Multi_langsTable extends Table
{
    
     public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('multi_langs');
        $this->setDisplayField('id');
        $this->setDisplayField('language');
        $this->setPrimaryKey('id');

       
    }
    
        public function validationDefault(Validator $validator)
    {
         $validator
            ->integer('id')
            ->notEmpty('id', 'create');

        $validator
            ->scalar('language')
            ->allowEmpty('language');

        return $validator;
    }
    
   
    
}