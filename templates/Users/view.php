<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * <?= h($user->id) ?>
 */
?>
<div class="row">
    <style>
        .titulo{
            border: none;
        }
        .option{
            color: #000000;
        }
        tr td p{
            font-size: 14px;
            color: #606c76;
        }



    </style>

    <div class="column-responsive column-80">
        <div class="users view content">
            <h3></h3>
            <table>
                <tr class="linha" data-link="<?= '/venda/users/editar/' . $user->id ?>" >
                    <td class="option">Olá, <?= h($user->nome) ?><br>


                        <p>Vamos comprar</p>
                    </td>

                </tr>

                <tr class="titulo">
                    <td>MEUS DADOS</td>

                </tr>
                <tr class="linha" data-link="<?= '/venda/users/editar/' . $user->id ?>">
                    <td class="option">Editar dados cadastrais</td>
                </tr>
                <tr class="linha" data-link="<?= '/venda/enderecos/lista/' ?>" >

                    <td class="option" >
                        Adicionar Endereço

                    </td>
                </tr>
                <tr>
                    <td class="titulo"> CONFIGURAÇÕES</td>
                </tr>
                <tr class="linha" data-link="<?= '/venda/users/logout' ?>">
                    <td class="option">
                        Sair

                    </td>
                </tr>
                <tr>


                </tr>

            </table>
        </div>
    </div>
</div>
