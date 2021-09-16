<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property string $nome
 * @property string $sobrenome
 * @property \Cake\I18n\FrozenDate $datanascimento
 * @property string $CPF_CNPJ
 * @property string $telefone
 * @property string $email
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Role $role
 */
class User extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'role_id' => true,
        'nome' => true,
        'sobrenome' => true,
        'datanascimento' => true,
        'CPF_CNPJ' => true,
        'telefone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected function _setPassword($value) {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}
