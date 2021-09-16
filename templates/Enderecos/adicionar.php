<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="enderecos form content">
            <?= $this->Form->create($endereco) ?>
            <fieldset>
                <legend><?= __('Novo Endereço') ?></legend>
                <?php
                echo $this->Form->control('cep');
                echo $this->Form->control('numero');
                echo $this->Form->control('complemento');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
