<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendaproduto Entity
 *
 * @property int $id
 * @property int $produto_id
 * @property int $venda_id
 * @property string $quantidade
 * @property string $preco
 *
 * @property \App\Model\Entity\Produto $produto
 * @property \App\Model\Entity\Venda $venda
 */
class Vendaproduto extends Entity
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
        'produto_id' => true,
        'venda_id' => true,
        'quantidade' => true,
        'preco' => true,
        'produto' => true,
        'venda' => true,
    ];
}
