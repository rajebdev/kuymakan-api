<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orderstatus Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\Orderstatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orderstatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orderstatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orderstatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderstatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderstatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orderstatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orderstatus findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderstatusTable extends Table
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

        $this->setTable('orderstatus');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Orders', [
            'foreignKey' => 'orderstatus_id',
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

        return $validator;
    }
}
