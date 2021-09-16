<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>



<div class="column-responsive column-80">
    <div class="produtos form content">

        <?= $this->Html->link('Sessão', ['controller' => 'sessaos', 'action' => 'index'], ['class' => 'button']) ?>
        <?= $this->Form->create($produto, ['type' => 'file']) ?>

        <fieldset>
            <div class="input text required">
                <label>Foto do Produto</label>
                <button><input type="file" name="foto" style="position: absolute;  opacity:0;" class="file" required="required" data-validity-message="This field cannot be left empty" oninvalid="this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity('')" id="foto">Upload</button>
            </div>
            <legend><?= __('Cadastro de Produtos') ?></legend>
            <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao', ['label' => 'Descrição']);
            echo $this->Form->control('unidade', ['options' => [1 => 'Duzia', 2 => 'Unidade', 3 => 'litros', 4 => 'Quilogramas', 5 => 'Metros', 6 => "Horas"]]);
            echo $this->Form->control('preco', ['label' => 'Preço', 'step' => '0.01']);
            echo $this->Form->control('sessao_id', ['options' => $sessaos, 'label' => 'Sessão']);
            ?>


        </fieldset>
        <?= $this->Form->button(__('Adicionar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

