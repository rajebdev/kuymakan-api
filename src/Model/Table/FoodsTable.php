<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Foods Model
 *
 * @property \App\Model\Table\FoodtypesTable&\Cake\ORM\Association\BelongsTo $Foodtypes
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\RestaurantsTable&\Cake\ORM\Association\BelongsTo $Restaurants
 * @property \App\Model\Table\FlippersTable&\Cake\ORM\Association\HasMany $Flippers
 *
 * @method \App\Model\Entity\Food get($primaryKey, $options = [])
 * @method \App\Model\Entity\Food newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Food[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Food|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Food saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Food patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Food[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Food findOrCreate($search, callable $callback = null, $options = [])
 */
class FoodsTable extends Table
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

        $this->setTable('foods');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Foodtypes', [
            'foreignKey' => 'foodtype_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Restaurants', [
            'foreignKey' => 'restaurant_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Flippers', [
            'foreignKey' => 'food_id',
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
            ->scalar('details')
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

        $validator
            ->integer('prices')
            ->requirePresence('prices', 'create')
            ->notEmptyString('prices');

        $validator
            ->integer('stock')
            ->requirePresence('stock', 'create')
            ->notEmptyString('stock');

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
        $rules->add($rules->existsIn(['foodtype_id'], 'Foodtypes'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['restaurant_id'], 'Restaurants'));

        return $rules;
    }
}
