<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coupons Model
 *
 * @property \App\Model\Table\BuyercouponsTable&\Cake\ORM\Association\HasMany $Buyercoupons
 *
 * @method \App\Model\Entity\Coupon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coupon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coupon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coupon|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coupon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coupon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coupon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coupon findOrCreate($search, callable $callback = null, $options = [])
 */
class CouponsTable extends Table
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

        $this->setTable('coupons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Buyercoupons', [
            'foreignKey' => 'coupon_id',
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
            ->scalar('names')
            ->maxLength('names', 255)
            ->requirePresence('names', 'create')
            ->notEmptyString('names');

        $validator
            ->dateTime('expired')
            ->requirePresence('expired', 'create')
            ->notEmptyDateTime('expired');

        $validator
            ->scalar('syarat')
            ->requirePresence('syarat', 'create')
            ->notEmptyString('syarat');

        $validator
            ->scalar('carapakai')
            ->requirePresence('carapakai', 'create')
            ->notEmptyString('carapakai');

        $validator
            ->scalar('deskripsi')
            ->requirePresence('deskripsi', 'create')
            ->notEmptyString('deskripsi');

        return $validator;
    }
}
