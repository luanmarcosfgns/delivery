<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vendatituloentrega Model
 *
 * @property \App\Model\Table\VendasTable&\Cake\ORM\Association\BelongsTo $Vendas
 *
 * @method \App\Model\Entity\Vendatituloentrega newEmptyEntity()
 * @method \App\Model\Entity\Vendatituloentrega newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Vendatituloentrega[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vendatituloentrega get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vendatituloentrega findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Vendatituloentrega patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vendatituloentrega[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vendatituloentrega|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vendatituloentrega saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vendatituloentrega[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vendatituloentrega[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vendatituloentrega[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vendatituloentrega[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VendatituloentregaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('vendatituloentrega');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Vendas', [
            'foreignKey' => 'venda_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->decimal('pagamentocliente')
            ->requirePresence('pagamentocliente', 'create')
            ->notEmptyString('pagamentocliente');

        $validator
            ->integer('titulo')
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->decimal('preco')
            ->requirePresence('preco', 'create')
            ->notEmptyString('preco');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['venda_id'], 'Vendas'));

        return $rules;
    }
}
