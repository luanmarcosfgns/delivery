<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $venda
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="vendas form content">
            <?= $this->Form->create($venda) ?>
            <fieldset>
                <p><?= __('Endereço que será entregue') ?></p>
                <?php
                echo $this->Form->control('pagamento');
                echo $this->Form->control('troco');
                ?>



            </fieldset>
            <?= $this->Form->button(__('Finalizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
