<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota[]|\Cake\Collection\CollectionInterface $notas
 */
use Cake\Datasource\ConnectionManager;

$connection = ConnectionManager::get('default');
?>
<div class="notas index content">
    <?= $_SESSION['Auth']['User']['id'] == 1 ? $this->Html->link(__('Cadastrar Notificação'), ['action' => 'add'], ['class' => 'button float-right']) : '' ?>

    <div class="table-responsive">
        <table>

            <tbody>
                <?php foreach ($notas as $nota): ?>
                    <tr class="linha <?= $connection->execute('select count(id) from usersnotas where nota_id= :nota_id ', [':nota_id' => $nota->id])->fetchall()[0][0] == 1 ? '' : 'nlida' ?> " data-link=" <?= '/venda/notas/view/' . $nota->id ?>">

                        <td><?= h($nota->comunicado) ?>
                            <br>

                            <span style="font-size: 10px;"><?= h($nota->created) ?></span>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
