<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Mudar dados cadastrais') ?></legend>
                <?php
                echo $this->Form->control('password', ['label' => 'Senha']);

                echo $this->Form->control('nome');
                echo $this->Form->control('sobrenome');
                echo $this->Form->control('datanascimento', ['label' => 'Data de nascimento']);
                echo $this->Form->control('CPF_CNPJ', ['label' => 'CPF ou CNPJ']);
                echo $this->Form->control('telefone');
                echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
