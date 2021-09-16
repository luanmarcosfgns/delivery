<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notas Model
 *
 * @method \App\Model\Entity\Nota newEmptyEntity()
 * @method \App\Model\Entity\Nota newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Nota[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nota get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nota findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Nota patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nota[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nota|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nota saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nota[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nota[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nota[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nota[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotasTable extends Table
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

        $this->setTable('notas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Usersnotas', [
            'foreignKey' => 'nota_id',
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
            ->scalar('comunicado')
            ->maxLength('comunicado', 100)
            ->requirePresence('comunicado', 'create')
            ->notEmptyString('comunicado');

        $validator
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->dateTime('datafim')
            ->requirePresence('datafim', 'create')
            ->notEmptyDateTime('datafim');

        $validator
            ->dateTime('datainicio')
            ->requirePresence('datainicio', 'create')
            ->notEmptyDateTime('datainicio');

        $validator
            ->requirePresence('imagem', 'create')
            ->notEmptyFile('imagem');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 5)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        return $validator;
    }
}
