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
                <legend><?= __('Cadastro') ?></legend>
                <?php
                echo $this->Form->control('username', ['label' => 'Usuário']);
                echo $this->Form->control('password', ['label' => 'Senha']);

                echo $this->Form->control('nome');
                echo $this->Form->control('sobrenome');
                echo $this->Form->control('datanascimento', ['label' => 'Data de Nascimento']);
                echo $this->Form->control('CPF_CNPJ', ['label' => 'CNPJ/CPF']);
                echo $this->Form->control('telefone');
                echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Finalizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
