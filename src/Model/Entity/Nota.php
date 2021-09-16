<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nota Entity
 *
 * @property int $id
 * @property string $comunicado
 * @property string $descricao
 * @property \Cake\I18n\FrozenTime $datafim
 * @property \Cake\I18n\FrozenTime $datainicio
 * @property string|resource $imagem
 * @property string $tipo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Nota extends Entity {

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
        'comunicado' => true,
        'descricao' => true,
        'datafim' => true,
        'datainicio' => true,
        'imagem' => true,
        'tipo' => true,
        'created' => true,
        'modified' => true,
        'usersnotas' => true
    ];

}
