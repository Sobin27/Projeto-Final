<?php

namespace Core\Controller;

use Core\Classes\Home;
use Core\Model\crud;
use Core\Model\Usuario;
use Core\Classes\Banco;

class Main
{

    public function index()
    {

        Home::Layout([
            'Login',
        ]);
    }

    public function cadastro()
    {

        Home::layout([
            'Cadastro',
        ]);
    }

    public function create_cliente()
    {
        if (isset($_POST['nome'], $_POST['idade'], $_POST['profissao'])) {

            $crud = new crud();

            $crud->nome = $_POST['nome'];
            $crud->idade = $_POST['idade'];
            $crud->profissao = $_POST['profissao'];

            $crud->create2();
        }

        if (isset($_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['cpf'])) {

            $crud = new crud();

            $crud->email = $_POST['email'];
            $crud->senha = $_POST['senha'];
            $crud->telefone = $_POST['telefone'];
            $crud->cpf = $_POST['cpf'];

            $crud->create();
        }
    }

    public function atualizar()
    {
        $editar = new crud();
        $editar->update();
    }

    public function formatualizar()
    {

        Home::layout([
            'Formatualizar',
        ]);
    }

    public function deletar()
    {
        Home::layout([
            'FormDeletar',
        ]);
    }

    public function logar()
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        $lg = new Usuario();
        $lg->login($email, $senha);
    }

    public function informacoes()
    {
    }

    public function painel()
    {

        home::layout([
            'Logado',
        ]);
    }

    public function detalhes()
    {

        home::layout([
            'Detalhes',
        ]);
    }

    public function delete()
    {
        $del = new crud();
        $del->delete();
    }
}
