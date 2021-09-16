<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $venda
 */
use Cake\Datasource\ConnectionManager;

$connection = ConnectionManager::get('default');
?>
<?php
$json_file = file_get_contents("https://viacep.com.br/ws/" . str_replace('-', '', $venda->endereco->cep) . "/json/");
$json_str = json_decode($json_file, true);
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="vendas view content">
            <h3><b> Pedido: <?= h($venda->id) ?></h3>
            <table>
                <td><b>Rua:</b><?= $json_str['logradouro'] ?></td>
                <td><b>Bairro:</b><?= $json_str['bairro'] ?></td>
                <td><b>Estado:</b><?= $json_str['uf'] ?></td>

                <td><b>CEP:</b><?= $json_str['cep'] ?></td>

                <tr>

                    <td><b>Pedido Feito: </b><?= h($venda->created) ?></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        switch ($venda->status) {
                            case 1: echo 'estará sendo  entregue em breve';
                                break;
                            case 2: echo 'está sendo separada para o envio';
                                break;
                            case 3: echo 'está sendo separada para o envio';
                                break;
                            case 4: echo 'está a caminho';
                                break;
                            case 5: echo ' está Entregue';
                                break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Troco: R$ <?= number_format($connection->execute("SELECT (pagamentocliente-preco )as troco FROM vendatituloentrega where venda_id= :venda_id", [':venda_id' => $venda->id])->fetchall()[0][0], 2, '.', '') ?>
                    </td>
                </tr>
                <tr>
                    <td>



                        <iframe class="listaprodutos" src="/venda/Vendaprodutos/index/<?= $venda->id ?>">

                        </iframe>
                    </td>
                </tr>



            </table>
            <br>
            <a <?= $_SESSION['Auth']['User']['role_id'] == 1 ?: 'style="display:none"' ?> class="button" href="../edit/<?= $venda->id ?>"> Mudar Status</a>
        </div>
    </div>
</div>
