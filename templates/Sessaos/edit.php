<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sessao $sessao
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="sessaos form content">
            <?= $this->Form->create($sessao) ?>
            <fieldset>
                <legend><?= __('Add Sessao') ?></legend>
                <?php
                echo $this->Form->control('nome');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
