<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Upload component
 */
class UploadComponent extends Component {

    function file($arquivo) {


        $dados = file($arquivo);

//Ler os dados do array
        $upload = implode('', $dados);
        return $upload;
    }

}
