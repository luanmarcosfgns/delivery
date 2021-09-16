<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @property \App\Model\Table\SessaosTable&\Cake\ORM\Association\BelongsTo $Sessaos
 * @property \App\Model\Table\VendaprodutosTable&\Cake\ORM\Association\HasMany $Vendaprodutos
 *
 * @method \App\Model\Entity\Produto newEmptyEntity()
 * @method \App\Model\Entity\Produto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Produto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Produto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProdutosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('produtos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sessaos', [
            'foreignKey' => 'sessao_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Vendaprodutos', [
            'foreignKey' => 'produto_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
                ->integer('id')
                ->allowEmptyString('id', null, 'create');

        $validator
                ->scalar('nome')
                ->maxLength('nome', 100)
                ->requirePresence('nome', 'create')
                ->notEmptyString('nome');

        $validator
                ->scalar('descricao')
                ->maxLength('descricao', 200)
                ->requirePresence('descricao', 'create')
                ->notEmptyString('descricao');

        $validator
                ->integer('unidade')
                ->requirePresence('unidade', 'create')
                ->notEmptyString('unidade');

        $validator
                ->decimal('preco')
                ->requirePresence('preco', 'create')
                ->notEmptyString('preco');

        $validator
                ->scalar('foto')
                ->requirePresence('foto', 'create')
                ->notEmptyFile('foto');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker {
        $rules->add($rules->existsIn(['sessao_id'], 'Sessaos'));

        return $rules;
    }

}
