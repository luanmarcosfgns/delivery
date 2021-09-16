<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sessao[]|\Cake\Collection\CollectionInterface $sessaos
 */
?>
<div class="sessaos index content">
    <?= $this->Html->link(__('Novo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sessaos') ?></h3>
    <div class="table-responsive">
        <table>

            <tbody>
                <?php foreach ($sessaos as $sessao): ?>
                    <tr>
                        <td><?= $this->Number->format($sessao->id) ?></td>
                        <td><?= h($sessao->nome) ?></td>
                        <td class="actions">

                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $sessao->id], ['class' => 'button']) ?>
                            <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $sessao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessao->id), 'class' => 'button']) ?>
                        </td>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
