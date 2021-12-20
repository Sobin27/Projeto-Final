<?php

use Core\Controller\Main;
use Firebase\JWT\JWT;

$router = array();

$router['index'] = [
    'rota' => '/',
    'controller' => "Main",
    'action' => "index"
];

$router['cadastro'] = [
    'rota' => '/cadastro',
    'controller' => "Main",
    'action' => "cadastro"
];

$router['criar_cliente'] = [
    'rota' => '/criar_cliente',
    'controller' => "Main",
    'action' => "create_cliente"
];

$router['login'] = [
    'rota' => '/login',
    'controller' => "Main",
    'action' => "logar"
];

$router['logado'] = [
    'rota' => '/logado',
    'controller' => "Main",
    'action' => "painel"
];

$router['detalhe'] = [
    'rota' => '/detalhe',
    'controller' => "Main",
    'action' => "detalhes"
];

$router['update'] = [
    'rota' => '/update',
    'controller' => "Main",
    'action' => "atualizar"
];

$router['formupdate'] = [
    'rota' => '/formupdate',
    'controller' => "Main",
    'action' => "formatualizar"
];

$router['delete'] = [
    'rota' => '/delete',
    'controller' => "Main",
    'action' => "deletar"
];

$router['deletar'] = [
    'rota' => '/deletar',
    'controller' => "Main",
    'action' => "delete"
];


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
foreach ($router as $rota) :
    if ($url === $rota['rota']) :

        //echo JWT::encode(['user' => 'sob'], key(["chavezinha"]));

        $controlador = 'Core\\Controller\\' . ucfirst($rota['controller']);
        $metodo = $rota['action'];

        $ctr = new $controlador();
        $ctr->$metodo();
        return;
    endif;
endforeach;

$ctr = new Main();
$ctr->index();

return;
