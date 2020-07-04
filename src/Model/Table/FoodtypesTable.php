<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Foodtypes Model
 *
 * @property \App\Model\Table\FoodsTable&\Cake\ORM\Association\HasMany $Foods
 *
 * @method \App\Model\Entity\Foodtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Foodtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Foodtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Foodtype|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Foodtype saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Foodtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Foodtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Foodtype findOrCreate($search, callable $callback = null, $options = [])
 */
class FoodtypesTable extends Table
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

        $this->setTable('foodtypes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Foods', [
            'foreignKey' => 'foodtype_id',
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
            ->scalar('label')
            ->requirePresence('label', 'create')
            ->notEmptyString('label');

        $validator
            ->scalar('images')
            ->requirePresence('images', 'create')
            ->notEmptyFile('images');

        return $validator;
    }
}
