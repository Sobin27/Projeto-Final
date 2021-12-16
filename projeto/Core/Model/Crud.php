<?php

namespace Core\Model;


use Core\Classes\Banco;
use Core\Controller\Main;
use Exception;
use PDO;

class crud
{
    public function create()
    {

        $cone = new Banco();

        $cone->inserir([
            'email' => $this->email,
            'senha' => $this->senha,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
        ]);

        header('location:/');
    }

    public function create2()
    {
        $cone = new Banco();

        $cone->inserir2([
            'nome' => $this->nome,
            'idade' => $this->idade,
            'profissao' => $this->profissao
        ]);
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function read()
    {

        $list = new Banco();
        $consults = $list->prepare('SELECT * FROM informacoes');

        echo "<div> <table border = '1'> <tr><td>ID</td><td>Nome</td><td>Idade</td><td>Profissão</td><td>Ações</td></tr>";
        foreach ($consults as $key => $values) {
            echo "<tr><td>" . $consults[$key]->id . "</td> 
            <td>" . $consults[$key]->Nome . "</td> 
            <td>" . $consults[$key]->Idade . "</td> 
            <td>" . $consults[$key]->Profissao . "</td> 
            <td><a href ='/update'>Up</a>//<a href ='/delete'>Del</a>//<a href ='/detalhe'>Detalhes</a></td> </tr>";
        }
    }
}
