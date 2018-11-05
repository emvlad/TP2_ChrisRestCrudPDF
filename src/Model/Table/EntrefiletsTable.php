<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entrefilets Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ThemesTable|\Cake\ORM\Association\BelongsTo $Themes
 * @property \App\Model\Table\GazettesTable|\Cake\ORM\Association\BelongsTo $Gazettes
 * @property \App\Model\Table\CritiqsTable|\Cake\ORM\Association\HasMany $Critiqs
 * @property |\Cake\ORM\Association\HasMany $Genres
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsToMany $Files
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Entrefilet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entrefilet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Entrefilet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entrefilet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entrefilet|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entrefilet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entrefilet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entrefilet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntrefiletsTable extends Table
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

        $this->setTable('entrefilets');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
        $this->addBehavior('Translate', ['fields' => ['title', 'body']]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Themes', [
            'foreignKey' => 'theme_id'
        ]);
        $this->belongsTo('Gazettes', [
            'foreignKey' => 'gazette_id'
        ]);
         $this->belongsTo('Genres', [
            'foreignKey' => 'genre_id'
        ]);
        
        $this->hasMany('Critiqs', [
            'foreignKey' => 'entrefilet_id'
        ]);
       
        $this->belongsToMany('Files', [
            'foreignKey' => 'entrefilet_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'entrefilets_files'
        ]);
        
       
           
        $this->belongsToMany('Tags', [
            'foreignKey' => 'entrefilet_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'entrefilets_tags'
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
            ->notEmpty('id', 'create')
             ->maxLength('id', 12);

        $validator
            ->scalar('title')
            ->allowEmpty('title')
            ->maxLength('title', 255);

        $validator
            ->scalar('slug')
            ->allowEmpty('slug')
            ->maxLength('slug', 255);

        $validator
            ->scalar('body')
            ->allowEmpty('body');

        $validator
            ->boolean('published')
            ->allowEmpty('published');
        
           $validator
            ->integer('user_id')
            ->allowEmpty('user_id', 'create')
             ->maxLength('user_id', 12);
           
            $validator
                ->scalar('body')
                ->allowEmpty('body');

        $validator
                ->boolean('published')
                ->allowEmpty('published');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['theme_id'], 'Themes'));
        $rules->add($rules->existsIn(['gazette_id'], 'Gazettes'));

        return $rules;
    }
    
     public function findPublished(Query $query, array $options) {
        $query->where([
            $this->alias() . '.published' => 1
        ]);
        return $query;
    }
  
}