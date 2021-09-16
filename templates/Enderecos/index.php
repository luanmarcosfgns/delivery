<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco[]|\Cake\Collection\CollectionInterface $enderecos
 */
?>
<div class="enderecos index content">
    <a href="/venda/enderecos/add"  class="button" > <img src="/venda/img/inserir.png" class="img-inserir" width="15px;">Inserir</a>
    <p><?= __('Selecione o endereço') ?></p>
    <br>
    <div class="table-responsive">
        <table>

            <tbody>
                <?php foreach ($enderecos as $endereco): ?>
                    <tr class="tr linha" data-link="<?= '/venda/enderecos/index/' . $endereco->id ?>">
                        <?php
                        $json_file = file_get_contents("https://viacep.com.br/ws/" . str_replace('-', '', $endereco->cep) . "/json/");
                        $json_str = json_decode($json_file, true);
                        ?>
                        <td><b>Rua:</b><?= $json_str['logradouro'] ?></td>
                        <td><b>Bairro:</b><?= $json_str['bairro'] ?></td>
                        <td><b>Estado:</b><?= $json_str['uf'] ?></td>

                        <td><b>CEP:</b><?= $json_str['cep'] ?></td>
                        <td><b>Numero:</b><?= h($endereco->numero) ?></td>
                        <td><b>Complemento:</b><?= h($endereco->complemento) ?></td>
                        <td></td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('Ultimo')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
            <?= $this->Paginator->last(__('Anterior') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__(' Mostrando {{current}} Registros de {{count}} no total')) ?></p>
    </div>
</div>
