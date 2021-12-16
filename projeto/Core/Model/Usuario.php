<?php

namespace Core\Model;

use Core\Classes\Banco;


class Usuario
{
    public function login($email, $senha)
    {
        $cone = new Banco();

        $params = [
            ':email' => $email,
            ':senha' => $senha,
        ];

        $verifi = $cone->prepare("SELECT * FROM pessoais WHERE email = :email AND senha = :senha", $params);

        if (count($verifi) != 1) {

            header('location:/cadastro');
            return false;
        } else {
            header('location:/logado');

            return true;
        }
    }
}
