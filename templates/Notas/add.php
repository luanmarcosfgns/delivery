<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota $nota
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="notas form content">
            <?= $this->Form->create($nota, ['type' => 'file']) ?>

            <legend><?= __('Notificar') ?></legend>
            <div class="input text required">
                <label>Banner</label>
                <button><input type="file" name="imagem" style="position: absolute;  opacity:0;" class="file" required="required" data-validity-message="This field cannot be left empty" oninvalid="this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity('')" id="foto">Upload</button>
            </div>
            <br>
            <?php
            echo $this->Form->control('comunicado');
            echo $this->Form->control('descricao');
            echo $this->Form->control('datafim');
            echo $this->Form->control('datainicio');
            ?>

            <?= $this->Form->button(__('Anunciar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
