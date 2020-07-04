<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Foodorders Model
 *
 * @property \App\Model\Table\FoodsTable&\Cake\ORM\Association\BelongsTo $Foods
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\Foodorder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Foodorder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Foodorder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Foodorder|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Foodorder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Foodorder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Foodorder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Foodorder findOrCreate($search, callable $callback = null, $options = [])
 */
class FoodordersTable extends Table
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

        $this->setTable('foodorders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Foods', [
            'foreignKey' => 'food_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

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
        $rules->add($rules->existsIn(['food_id'], 'Foods'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }
}
