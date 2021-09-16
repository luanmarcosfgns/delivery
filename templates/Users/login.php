<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="column-responsive column-50 login"style="max-width: 500px; margin-top: 100px;">
    <div class="users form content ">

        <?= $this->Form->create() ?>
        <fieldset>
            <center>

                <?php
                echo $this->Form->control('username', ['label' => 'Usuário']);
                echo $this->Form->control('password', ['label' => 'Senha']);
                ?>
                </br>
                <?=
                $this->Html->link(
                        'Cadastre-se',
                        ['controller' => 'Users', 'action' => 'add'], ['style' => 'color:blue']
                )
                ?>
        </fieldset>
        <?= $this->Form->button(__('Entrar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
</div>
