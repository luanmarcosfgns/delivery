<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendatituloentrega Entity
 *
 * @property int $id
 * @property string $pagamentocliente
 * @property int $titulo
 * @property string $preco
 * @property int $venda_id
 * @property int $created
 * @property int $modified
 *
 * @property \App\Model\Entity\Venda $venda
 */
class Vendatituloentrega extends Entity
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
        'pagamentocliente' => true,
        'titulo' => true,
        'preco' => true,
        'venda_id' => true,
        'created' => true,
        'modified' => true,
        'venda' => true,
    ];
}
