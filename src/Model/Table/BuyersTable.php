<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buyers Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BuyercouponsTable&\Cake\ORM\Association\HasMany $Buyercoupons
 * @property \App\Model\Table\BuyernotifsTable&\Cake\ORM\Association\HasMany $Buyernotifs
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\Buyer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buyer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Buyer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buyer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buyer findOrCreate($search, callable $callback = null, $options = [])
 */
class BuyersTable extends Table
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

        $this->setTable('buyers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Buyercoupons', [
            'foreignKey' => 'buyer_id',
        ]);
        $this->hasMany('Buyernotifs', [
            'foreignKey' => 'buyer_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'buyer_id',
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
            ->requirePresence('names', 'create')
            ->notEmptyString('names');

        $validator
            ->scalar('images')
            ->requirePresence('images', 'create')
            ->notEmptyFile('images');

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

        return $rules;
    }
}
