<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vendaprodutos Model
 *
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 * @property \App\Model\Table\VendasTable&\Cake\ORM\Association\BelongsTo $Vendas
 *
 * @method \App\Model\Entity\Vendaproduto newEmptyEntity()
 * @method \App\Model\Entity\Vendaproduto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Vendaproduto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vendaproduto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vendaproduto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Vendaproduto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vendaproduto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vendaproduto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vendaproduto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vendaproduto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vendaproduto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vendaproduto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vendaproduto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendaprodutosTable extends Table
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

        $this->setTable('vendaprodutos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER',
        ]);
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
            ->decimal('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmptyString('quantidade');

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
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        $rules->add($rules->existsIn(['venda_id'], 'Vendas'));

        return $rules;
    }
}
