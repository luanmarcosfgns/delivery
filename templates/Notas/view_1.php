<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota $nota
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="notas view content">
            <?=
            $_SESSION['Auth']['User']['id'] == 1 ?
                    $this->Form->postLink(
                            __('Apagar'),
                            ['action' => 'delete', $nota->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $nota->id), 'class' => 'button']
                    ) : '';
            ?>
            <h3><?= h($nota->id) ?></h3>
            <table>
                <tr>

                    <td><?= h($nota->comunicado) ?></td>

                </tr>

                <tr>

                    <td> <?= $this->Text->autoParagraph(h($nota->descricao)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Datainicio') ?></th>
                    <td><?= h($nota->datainicio) ?></td>
                </tr>
                <tr>
                    <td>
                        <img  src="<?= 'data:image/' . substr($nota->tipo, 1) . ';base64,' . base64_encode($nota->imagem) ?>" width = "100px" >
                    </td>
                </tr>

            </table>

        </div>
    </div>
</div>
