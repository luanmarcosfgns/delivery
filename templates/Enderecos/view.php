<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Endereco'), ['action' => 'edit', $endereco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Endereco'), ['action' => 'delete', $endereco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $endereco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Enderecos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Endereco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enderecos view content">
            <h3><?= h($endereco->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cep') ?></th>
                    <td><?= h($endereco->cep) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero') ?></th>
                    <td><?= h($endereco->numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Complemento') ?></th>
                    <td><?= h($endereco->complemento) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $endereco->has('user') ? $this->Html->link($endereco->user->id, ['controller' => 'Users', 'action' => 'view', $endereco->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($endereco->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Vendas') ?></h4>
                <?php if (!empty($endereco->vendas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id Cliente') ?></th>
                            <th><?= __('Endereco Id') ?></th>
                            <th><?= __('Pagamento') ?></th>
                            <th><?= __('Troco') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($endereco->vendas as $vendas) : ?>
                        <tr>
                            <td><?= h($vendas->id) ?></td>
                            <td><?= h($vendas->user_id_cliente) ?></td>
                            <td><?= h($vendas->endereco_id) ?></td>
                            <td><?= h($vendas->pagamento) ?></td>
                            <td><?= h($vendas->troco) ?></td>
                            <td><?= h($vendas->created) ?></td>
                            <td><?= h($vendas->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $vendas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Vendas', 'action' => 'edit', $vendas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendas', 'action' => 'delete', $vendas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendas->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
