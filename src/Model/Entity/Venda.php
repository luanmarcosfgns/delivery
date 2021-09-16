<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venda Entity
 *
 * @property int $id
 * @property int $user_id_cliente
 * @property int $endereco_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $status
 * @property bool|null $lida
 *
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\Vendaproduto[] $vendaprodutos
 * @property \App\Model\Entity\Vendatituloentrega[] $vendatituloentrega
 */
class Venda extends Entity
{
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
        'user_id_cliente' => true,
        'endereco_id' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'lida' => true,
        'endereco' => true,
        'vendaprodutos' => true,
        'vendatituloentrega' => true,
    ];
}
