<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendatituloentrega $vendatituloentrega
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="vendatituloentrega form content">
            <?= $this->Form->create($vendatituloentrega) ?>
            <fieldset>
                <legend>Total: R$ <?= number_format($_SESSION['totalprodutos'], 2, ',', '') ?></legend>
                <?php
                echo $this->Form->control('titulo', ['options' => [1 => 'Dinheiro', 2 => 'Cartão de Débito', 3 => 'Cartão de Crédito'], 'label' => 'Pagamento']);
                echo $this->Form->control('pagamentocliente', ['label' => 'Valor em mãos ', 'type' => 'number', 'min' => $_SESSION['totalprodutos'], 'step' => 0.10]);
                echo $this->Form->control('troco', ['type' => 'hidden', 'value' => $_SESSION['totalprodutos']])
                ?>
                <span id="troco-display">Troco: R$ 0,00</span>
            </fieldset>
            <?= $this->Form->button(__('Finalizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
