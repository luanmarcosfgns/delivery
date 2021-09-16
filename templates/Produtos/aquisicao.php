<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
unset($_SESSION['totalprodutos']);
?>

<div class="produtos index content">
    <a href="/venda/enderecos/index/" <?= $_SESSION['Auth']['User']['role_id'] == 1 ?: 'style="display:none"' ?> class="button float-right">Entrega pra mim</a>

    <p><?= $this->Paginator->counter(__(' Produtos liistados ({{current}})')) ?></p>
    <div class="table-responsive">
        <table>

            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr >


                        <td> <img  src="<?= $produto->foto != null ? 'data:image/jpg;base64,' . base64_encode($produto->foto) : '/img/ppadrao.jpg' ?>" width = "100px" class = "imgperfil"><?= h($produto->nome) ?></td>
                        <td><p style="font-size: 80%;"><?= h($produto->descricao) ?></p></td>
                        <td><p style="font-size: 80%;"><?php
                                $retorno = "R$ " . number_format($produto->preco, 2, ',', ' ') . ' ';
                                switch ($produto->unidade) {
                                    case 1:$retorno = $retorno . 'Duzia';
                                        break;
                                    case 2:$retorno = $retorno . 'Unidades';
                                        break;
                                    case 3:$retorno = $retorno . 'Litros';
                                        break;
                                    case 4:$retorno = $retorno . 'Quilogramas';
                                        break;
                                    case 5:$retorno = $retorno . 'Metros';
                                        break;
                                    case 6:$retorno = $retorno . 'Horas';
                                        break;
                                }
                                echo $retorno;
                                ?></p>

                        </td>
                        <td><p style="font-size: 80%;"><?php
                                $i = array_search($produto->id, $_SESSION['listadeprodutos']['id']);
                                echo number_format($_SESSION['listadeprodutos']['quantidade'][$i], 2, ',', '');
                                $retorno = ' ';
                                switch ($produto->unidade) {
                                    case 1:$retorno = $retorno . 'Duzia';
                                        break;
                                    case 2:$retorno = $retorno . 'Unidades';
                                        break;
                                    case 3:$retorno = $retorno . 'Litros';
                                        break;
                                    case 4:$retorno = $retorno . 'Quilogramas';
                                        break;
                                    case 5:$retorno = $retorno . 'Metros';
                                        break;
                                    case 6:$retorno = $retorno . 'Horas';
                                        break;
                                }
                                echo $retorno;
                                ?>


                            </p></td>
                        <?php
                        $totalproduto = $_SESSION['listadeprodutos']['quantidade'][$i] * $produto->preco;
                        empty($_SESSION['totalprodutos']) ? $_SESSION['totalprodutos'] = $totalproduto : $_SESSION['totalprodutos'] = $_SESSION['totalprodutos'] + $totalproduto;
                        ?>
                        <td>R$ <?= number_format($totalproduto, 2, ',', '') ?> no Total</td>

                        <td >  <a href="/venda/produtos/tirarcarrinho/<?= $i ?>"><?= $this->Html->image('lixeira.png', ['width' => '35px;', 'class' => "exluir"]) ?></a> </td>





                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>
</div>
