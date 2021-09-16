<?php

use Cake\Datasource\ConnectionManager;

$connection = ConnectionManager::get('default');

if(!empty($_SESSION['Auth']['User']['id'])){
$contadorentrega = $connection->execute('SELECT
    if(count(Vendas.id)>9,"9+",count(Vendas.id))


FROM
  vendas Vendas
  INNER JOIN enderecos Enderecos ON Enderecos.id = (Vendas.endereco_id)
WHERE
  user_id_cliente = :user_id', ['user_id' => $_SESSION['Auth']['User']['id']])->fetchAll()[0][0];

$notificacoes = $connection->execute('SELECT
    if(count(notas.id)>9,"9+",count(notas.id))
FROM
  notas where  datafim <= now() and datainicio >= now() and notas.id not in( select nota_id from usersnotas where user_id=:user_id )
   order by id desc', [':user_id' => $_SESSION['Auth']['User']['id']])->fetchAll()[0][0];
}
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
$cakeDescription = 'Vendetor';
$link = explode('/', $_SERVER['REQUEST_URI']);
if (strtolower($link[3]) == 'login' and strtolower($link[2]) == 'users') {
    $barra1 = 'style="display:none"';
    $barra2 = 'style="display:none"';
} else
if (strtolower($link[3]) == 'add' and strtolower($link[2]) == 'users') {
    $barra1 = 'style="display:block"';
    $barra2 = 'style="display:none"';
    $voltar = './login/';
} else
if (strtolower($link[3]) == 'add' and strtolower($link[2]) == 'pessoas') {
    $barra1 = 'style = "display:block"';
    $barra2 = 'style = "display:none"';
    $voltar = '../users/add';
} else
if (strtolower($link[3]) == ''or strtolower($link[3]) == 'index' and strtolower($link[2]) == 'produtos') {
    $barra1 = '';
    $barra2 = '';
    $selecionado = '.produtos';
    if (empty($link[4])) {
        $voltar = '../users/logout';
    } else {
        $voltar = '/venda/produtos/index';
    }
} else
if (strtolower($link[3]) == 'view' and strtolower($link[2]) == 'produtos') {
    $barra1 = '';
    $barra2 = '';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.produtos';

    $voltar = '/venda/produtos/index';
} else
if (strtolower($link[3]) == 'aquisicao' and strtolower($link[2]) == 'produtos') {
    $barra1 = '';
    $barra2 = '';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.produtos';


    $voltar = '/venda/produtos/index';
} else if (strtolower($link[3]) == 'index' and strtolower($link[2]) == 'enderecos') {
    $barra1 = '';
    $barra2 = '';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.produtos';

    $voltar = '/venda/produtos/aquisicao';
} else
if (strtolower($link[3]) == 'add' and strtolower($link[2]) == 'vendatituloentrega') {
    $barra1 = '';
    $barra2 = '';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.produtos';

    $voltar = '/venda/enderecos/index';
} else
if (strtolower($link[3]) == 'edit' and strtolower($link[2]) == 'produtos') {
    $barra1 = '';
    $barra2 = '';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.produtos';

    $voltar = '/venda/produtos/view/' . $link[4];
} else if (strtolower($link[3]) == 'add' and strtolower($link[2]) == 'produtos') {
    $barra1 = '';
    $barra2 = 'style = "display:none"';
    $voltar = '../produtos/';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.produtos';
} else if (strtolower($link[3]) == 'edit' and strtolower($link[2]) == 'vendas') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/vendas/view/' . $link[4];
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.pedido';
} else if (strtolower($link[3]) == 'edit' or strtolower($link[3]) == 'add' and strtolower($link[2]) == 'sessaos') {
    $barra1 = '';
    $barra2 = 'style = "display:none"';
    $voltar = '/venda/sessaos/index';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.perfil';
} else if (strtolower($link[3]) == 'index' and strtolower($link[2]) == 'sessaos') {
    $barra1 = '';
    $barra2 = 'style = "display:none"';
    $voltar = '/venda/produtos/index';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.perfil';
} else if (strtolower($link[3]) == 'view' and strtolower($link[2]) == 'users') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '../produtos/';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.perfil';
} else if (strtolower($link[3]) == 'editar' and strtolower($link[2]) == 'users') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/users/view';
    $imgpesquisa = 'style = "display:none';
} else if (strtolower($link[3]) == 'lista' and strtolower($link[2]) == 'enderecos') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/users/view';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.perfil';
} else if (strtolower($link[3]) == 'adicionar' and strtolower($link[2]) == 'enderecos') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/users/view';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.perfil';
} else if (strtolower($link[3]) == 'editar' and strtolower($link[2]) == 'enderecos') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/enderecos/lista';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.perfil';
} else if (strtolower($link[3]) == 'index' and strtolower($link[2]) == 'vendas') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/produtos/index';
    $imgpesquisa = 'style = "display:none';

    $selecionado = '.pedido';
} else if (strtolower($link[3]) == 'view' and strtolower($link[2]) == 'vendas') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/vendas/index';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.perfil';
    $selecionado = '.pedido';
} else if (strtolower($link[3]) == 'index' and strtolower($link[2]) == 'notas') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/produtos/index';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.notas';
} else if (strtolower($link[3]) == 'view' and strtolower($link[2]) == 'notas') {
    $barra1 = '';
    $barra2 = '';
    $voltar = '/venda/notas/index';
    $imgpesquisa = 'style = "display:none';
    $selecionado = '.notas';
} else {
    $barra1 = 'style = "display:none"';
    $barra2 = 'style = "display:none"';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

        <?= $this->Html->css('milligram.min.css') ?>
        <?= $this->Html->css('cake.css') ?>
        <?= $this->Html->css('demo.css') ?>
        <?= $this->Html->css('normalize.css') ?>
        <?= $this->Html->css('component.css') ?>
        <?= $this->Html->css('animate.css') ?>

        <?= $this->Html->script('jquery-3.5.0.min.js') ?>
        <script>

            $(document).ready(function() {
                $('<?= $selecionado ?>').css('opacity', '1');
                //Define visualização da pesquisa ao carregar de uma pagina
                if ($('.pesquisa').val() != '') {
                    $('.pesquisa').css('display', 'block');
                    $('.img-pesquisa').css('display', 'none');
                    $('.finalizar').css('display', 'none');
                }

                // Define opacidade de um de cada botão do mmenu da parte inferior quando está em uma determiada pagina

                $('.img-pesquisa').css('opacity', '1').click(function() {
                    $('.img-pesquisa').css('display', 'none');
                    $('.finalizar').css('display', 'none');
                    $('.opcao').click(function() {
                        $('.opcao').css('opacity', '0.6');
                    });
                    // Define quando que quando clicado fora do input de pesquisa o mesmo precisa  desaaparecer.

                    $('.pesquisa').css('display', 'block').focusout(function() {
                        $('.pesquisa').css('display', 'none');
                        $('.img-pesquisa').css('display', 'block');
                        $('.finalizar').css('display', 'block');
                    });
                });
                //Coração da pesquisa define que quando acabar de digitar em 1,5 segundos o mesmo dará inicio a pesquisa.

                var typingTimer;
                var doneTypingInterval = 1500;
                $('.pesquisa').keyup(function() {
                    clearTimeout(typingTimer);
                    if ($('.pesquisa').val) {
                        typingTimer = setTimeout(doneTyping, doneTypingInterval);
                    }
                });
                function doneTyping() {
                    var pesquisa = $('.pesquisa').val();
                    pesquisa = pesquisa.replace('ç', 'c');
                    $(location).attr('href', '<?= '/' . $link[1] . '/' . $link[2] . '/' . $link[3] . '/' ?>' + pesquisa);
                    $('.btn-final').css('display', 'none');
                }
                $('#pagamentocliente').keyup(function() {

                    if ($('#titulo').val() == 1) {

                        if (parseFloat($('#pagamentocliente').val()) > parseFloat($('#troco').val())) {

                            $('#troco-display').html(' Troco: ' + (parseFloat($('#pagamentocliente').val()) - parseFloat($('#troco').val())).toLocaleString('pt-BR', {style: 'currency', currency: 'BRL'}));

                        }

                    }

                });


            });


        </script>

        <script>

            $(document).ready(function() {
                $('.linha').click(function() {
                    $(location).attr('href', $(this).attr('data-link'))



                });
                $('.mais').click(function() {
                    $('.input-quantidade').val(parseFloat($('.input-quantidade').val()) + 1);
                });
                $('.menos').click(function() {
                    if ($('.input-quantidade').val() > 1) {
                        $('.input-quantidade').val(parseFloat($('.input-quantidade').val()) - 1);
                    } else {
                        $('.input-quantidade').val(1);
                    }
                });
            });


        </script>




        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <div class="conteudo container animated fadeIn">

            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <div class=" barra1" <?= empty($barra1) ? '' : $barra1 ?>>
            <ul  class="gn-menu-main">

                <li><a class="" href="<?= empty($voltar) ? '' : $voltar ?>"><?= $this->Html->image('voltar.png', ['width' => '19px']) ?></a></li>
                <li><input  style="display: none;"  value="<?= empty($_SESSION['pesquisa']) ? '' : $_SESSION['pesquisa'] ?>"type="text" placeholder="Digite a sua Pesquisa" class="pesquisa animated fadeIn"></li>
                <li <?= empty($imgpesquisa) ?: $imgpesquisa ?>"><img class="img-pesquisa" src="/venda/img/pesquisa.png"></li>
                <li <?= empty($imgpesquisa) ?: $imgpesquisa ?> class="lileft finalizar  "><a <?= empty($imgpesquisa) ?: $imgpesquisa ?> class="button btn-final" href="/venda/produtos/aquisicao" ><?= $this->Html->image('finalizar.png', ['style' => 'width:25px;', 'class' => 'produtos']) ?><spam style="color: white;"><strong > <?= empty($_SESSION['listadeprodutos']) ? 0 : count($_SESSION['listadeprodutos']['id']) ?></strong></spam></a></li>
            </ul>

        </div>


        <div class="down-navbar" <?= empty($barra2) ? '' : $barra2 ?> >
            <a href="/venda/produtos/index" class="opcao produtos"><?= $this->Html->image('inicio.png', ['style' => 'width:40px;
', 'class' => 'produtos']) ?></a>
            <a href="/venda/vendas/index" class="opcao pedido"><?=
                $this->Html->image('pedido.png', ['style' => 'width:50px;', 'class' =>
                    'pedido'])
                ?> <span style="color: black;"> <?= $contadorentrega ?> </span> </a>
            <a href="/venda/users/view" class="opcao "><?= $this->Html->image('perfil.png', ['style' => 'width:40px;
', 'class' => 'perfil']) ?></a>
            <a href="/venda/notas/index" class="opcao nota"><?= $this->Html->image('notifica.png', ['style' => 'width:40px;', 'class' => 'notas']) ?><span style="color: black;"><?= $notificacoes ?></span></a>
        </div>





        <footer>
        </footer>
    </body>
</html>
<?php
$_SESSION['pesquisa'] = '';
?>