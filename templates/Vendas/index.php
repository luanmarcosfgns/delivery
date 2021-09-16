<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda[]|\Cake\Collection\CollectionInterface $vendas
 */
?>
<div class="vendas index content">


    <div class="table-responsive">
        <table>

            <tbody>
                <?php foreach ($vendas as $venda): ?>
                    <tr  class="linha <?= $venda->lida ? '' : 'nlida' ?>" data-link="<?= '/venda/vendas/view/' . $venda->id ?>">
                        <td>A sua compra feita <br> <?= h($venda->created) ?>   <?php
                            switch ($venda->status) {
                                case 1: echo 'estará sendo <br> entregue em breve';
                                    break;
                                case 2: echo 'está sendo separada<br> para o envio';
                                    break;
                                case 3: echo 'está sendo <br>separada para o envio';
                                    break;
                                case 4: echo 'está a caminho';
                                    break;
                                case 5: echo ' está Entregue';
                                    break;
                            }
                            ?>
                            <br>

                        </td>




                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
