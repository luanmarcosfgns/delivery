<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $venda
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="vendatituloentrega form content">
            <?= $this->Form->create($vendatituloentrega) ?>
            <fieldset>
                <legend>Mudar Satus da Entrega</legend>
                <?php
                echo $this->Form->control('status', ['options' => [1 => 'a entregar', 2 => 'separado para o envio', 3 => 'a caminho', 4 => 'Entregue']])
                ?>

            </fieldset>
            <?= $this->Form->button(__('Mudar Satus')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

