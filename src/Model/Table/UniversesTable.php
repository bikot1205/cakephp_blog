<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\I18n\Time;

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

    public function validationUpdate($validator)
    {
        $validator
            ->add('name', 'notBlank', [
                  'rule' => 'notBlank',
                  'message' => __('{0} cannot be empty', ["(Update)名前"])
            ]);
        return $validator;
    }

    // テーブルクラスの中で
    public function buildRules(RulesChecker $rules)
    {
        // 作成および更新操作に提供されるルールを追加
        //$rules->add(function ($entity, $options) {
            // 失敗／成功を示す真偽値を返す
        //}, 'ruleName');
        $rules->add(new IsUnique(['name']), 'uniqueName', [
            'errorField' => 'name',
            'message' => '名称が重複しています。'
        ]);

        $check = function($entity) {
            $now = Time::now();
            return $entity->birthday->i18nFormat('yyyy-MM-dd') > $now->i18nFormat('yyyy-MM-dd');
        };
        $rules->add($check, [
            'errorField' => 'birthday',
            'message' => '本日以降に指定してください'
        ]);

        // 作成のルールを追加
        // $rules->addCreate(function ($entity, $options) {
        //     // 失敗／成功を示す真偽値を返す
        // }, 'ruleName');
        

       // 更新のルールを追加
        // $rules->addUpdate(function ($entity, $options) {
        //     // 失敗／成功を示す真偽値を返す
        // }, 'ruleName');

        // 削除のルールを追加
        // $rules->addDelete(function ($entity, $options) {
        //     // 失敗／成功を示す真偽値を返す
        // }, 'ruleName');

        return $rules;
    }
}
