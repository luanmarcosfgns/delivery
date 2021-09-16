<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendaproduto[]|\Cake\Collection\CollectionInterface $vendaprodutos
 */
?>
<div class="vendaprodutos index content" style="margin-top: -90px;">

    <div class="table-responsive">
        <table>

            <tbody>
                <?php foreach ($vendaprodutos as $vendaproduto): ?>
                    <tr>
                        <td><?= $this->Number->format($vendaproduto->id) ?></td>
                        <td><?= $vendaproduto->has('produto') ? $this->Html->link($vendaproduto->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $vendaproduto->produto->id]) : '' ?></td>

                        <td><?php
                            echo number_format($this->Number->format($vendaproduto->quantidade), 2, '.', '');
                            switch ($vendaproduto->produto->unidade) {
                                case 1:$retorno = 'Duzia';
                                    break;
                                case 2:$retorno = 'Unidades';
                                    break;
                                case 3:$retorno = 'Litros';
                                    break;
                                case 4:$retorno = 'Quilogramas';
                                    break;
                                case 5:$retorno = 'Metros';
                                    break;
                                case 6:$retorno = 'Horas';
                                    break;
                            }
                            echo ' ' . $retorno;
                            ?></td>
                        <td>R$ <?= number_format($this->Number->format($vendaproduto->preco), 2, '.', '') ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
