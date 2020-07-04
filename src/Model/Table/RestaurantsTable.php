<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Restaurants Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FoodsTable&\Cake\ORM\Association\HasMany $Foods
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\Restaurant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Restaurant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Restaurant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Restaurant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Restaurant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Restaurant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Restaurant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Restaurant findOrCreate($search, callable $callback = null, $options = [])
 */
class RestaurantsTable extends Table
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

        $this->setTable('restaurants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Foods', [
            'foreignKey' => 'restaurant_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'restaurant_id',
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
            ->scalar('location')
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->time('opentime')
            ->requirePresence('opentime', 'create')
            ->notEmptyTime('opentime');

        $validator
            ->time('closetime')
            ->requirePresence('closetime', 'create')
            ->notEmptyTime('closetime');

        $validator
            ->boolean('closed')
            ->requirePresence('closed', 'create')
            ->notEmptyString('closed');

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
