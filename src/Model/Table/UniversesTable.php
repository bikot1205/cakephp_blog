<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Universes Model
 *
 * @method \App\Model\Entity\Universe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Universe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Universe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Universe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Universe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Universe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Universe findOrCreate($search, callable $callback = null, $options = [])
 */
class UniversesTable extends Table
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

        $this->setTable('universes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->date('birthday')
            ->allowEmpty('birthday');            

        $validator
            ->scalar('characteristics')
            ->allowEmpty('characteristics');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        return $validator;
    }
}
