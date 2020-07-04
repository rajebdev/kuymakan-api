<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buyercoupons Model
 *
 * @property \App\Model\Table\BuyersTable&\Cake\ORM\Association\BelongsTo $Buyers
 * @property \App\Model\Table\CouponsTable&\Cake\ORM\Association\BelongsTo $Coupons
 *
 * @method \App\Model\Entity\Buyercoupon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buyercoupon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Buyercoupon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buyercoupon|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyercoupon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyercoupon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buyercoupon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buyercoupon findOrCreate($search, callable $callback = null, $options = [])
 */
class BuyercouponsTable extends Table
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

        $this->setTable('buyercoupons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Buyers', [
            'foreignKey' => 'buyer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Coupons', [
            'foreignKey' => 'coupon_id',
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
            ->dateTime('claimed')
            ->requirePresence('claimed', 'create')
            ->notEmptyDateTime('claimed');

        $validator
            ->dateTime('expired')
            ->requirePresence('expired', 'create')
            ->notEmptyDateTime('expired');

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
        $rules->add($rules->existsIn(['buyer_id'], 'Buyers'));
        $rules->add($rules->existsIn(['coupon_id'], 'Coupons'));

        return $rules;
    }
}
