<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>

<div class="row">

    <div class="column-responsive column-80">
        <div class="produtos view content">
            <aside class="column" <?= $_SESSION['Auth']['User']['role_id'] == 1 ?: 'style="display:none"' ?> >
                <div class="side-nav">

                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $produto->id], ['class' => 'button ']) ?>
                    <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id), 'class' => 'button']) ?>


                </div>
            </aside>
            <?= $this->Form->create($produto) ?>
            <table class="tbody-produtos">



                <div class="text">


                    <img  src="<?= $produto->foto != null ? 'data:image/jpg;base64,' . base64_encode($produto->foto) : '/img/ppadrao.jpg' ?>" width = "100px" class = "imgperfil">

                </div>
                <tr>

                    <td><h3><?= h($produto->nome) ?></h3></td>
                    <td><p><?= h($produto->descricao) ?></p></td>
                    <td><p style="font-size: 80%;"><?php
                            $retorno = "R$ " . number_format($produto->preco, 2, ',', ' ') . ' ';
                            switch ($produto->unidade) {
                                case 1:$retorno = $retorno . '(Duzia)';
                                    break;
                                case 2:$retorno = $retorno . '(Unidades)';
                                    break;
                                case 3:$retorno = $retorno . '(Litros)';
                                    break;
                                case 4:$retorno = $retorno . '(Quilogramas)';
                                    break;
                                case 5:$retorno = $retorno . '(Metros)';
                                    break;
                                case 6:$retorno = $retorno . '(Horas)';
                                    break;
                            }
                            echo $retorno;
                            ?></p></td>
                    <td>
                        <div class="quantidade">

                            <input  value="1" " step="0.10" class="input-quantidade"  name="quantidade" style="margin-right: 10px;"  type="number" ><button  class="mais" type="button">+</button> <button class="menos" type="button">-</button>


                        </div>
                    </td>

                </tr>

            </table>
            <br>
            <?= $this->Form->button(__('Adicionar ao Carrinho')) ?>
            <?= $this->Form->end() ?>

        </div>

    </div>
</div>
