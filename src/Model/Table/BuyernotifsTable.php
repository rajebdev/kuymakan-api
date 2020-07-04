<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buyernotifs Model
 *
 * @property \App\Model\Table\BuyersTable&\Cake\ORM\Association\BelongsTo $Buyers
 *
 * @method \App\Model\Entity\Buyernotif get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buyernotif newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Buyernotif[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buyernotif|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyernotif saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buyernotif patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buyernotif[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buyernotif findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BuyernotifsTable extends Table
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

        $this->setTable('buyernotifs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Buyers', [
            'foreignKey' => 'buyer_id',
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
            ->scalar('label')
            ->requirePresence('label', 'create')
            ->notEmptyString('label');

        $validator
            ->scalar('icon')
            ->requirePresence('icon', 'create')
            ->notEmptyString('icon');

        $validator
            ->scalar('images')
            ->requirePresence('images', 'create')
            ->notEmptyFile('images');

        $validator
            ->scalar('link')
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

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

        return $rules;
    }
}
