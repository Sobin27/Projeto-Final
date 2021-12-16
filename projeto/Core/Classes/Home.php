<?php

namespace Core\Classes;

use Exception;

class Home
{
    public static function layout($estrutura, $dados = null)
    {

        if (!is_array($estrutura)) {
            throw new Exception("Estruturas inválidas", 1);
        }

        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }

        foreach ($estrutura as $algumacoisa) {
            include("../Core/Views/$algumacoisa.php");
        }
    }
}
