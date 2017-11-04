<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\I18n\Time;

class PlantsTable extends Table
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

        $this->setTable('plants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Universes', [
            'foreignKey' => 'universe_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name', __('{0} cannot be empty', ["名前"]));

        $validator
            ->scalar('name_en')
            ->allowEmpty('name_en');

        $validator
            ->scalar('color')
            ->allowEmpty('color');

        return $validator;
    }
    
}
