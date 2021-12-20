<?php

namespace Core\Classes;

use PDO;
use PDOException;
use Exception;

session_start();

class Banco
{

    private $ligacao;

    private function ligar()
    {
        $this->ligacao = new PDO(
            'mysql:' .
                'host=' . MYSQL_SERVER . ';' .
                'dbname=' . MYSQL_DATABASE . ';',
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    private function desligar()
    {
        $this->ligacao = null;
    }

    public function execute($tabela, $params = [])
    {
        try {
            $confirm = $this->ligacao->prepare($tabela);
            $confirm->execute($params);
            return $confirm;
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    }

    public function prepare($sql, $parametros = null)
    {
        $sql = trim($sql);

        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception("Base de dados - Não é uma instrução em select", 1);
        }

        $this->ligar();
        $resultados = null;

        try {
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }

        $this->desligar();

        return $resultados;
    }

    public function up($sql, $parametros = null)
    {
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception("Base de dados - Não é uma instrução em update", 1);
        }

        $this->ligar();

        $resultados = null;

        try {
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            return false;
        }
        $this->desligar();

        return $resultados;
    }

    public function inserir($values)
    {
        $this->ligar();

        $campos = array_keys($values);
        $valores = array_pad([], count($campos), '?');

        $tabela = 'INSERT INTO pessoais (' . implode(',', $campos) . ') VALUES(' . implode(',', $valores) . ')';
        $this->execute($tabela, array_values($values));

        return $this->ligacao->lastInsertId();
        $this->desligar();
    }

    public function inserir2($values)
    {

        $this->ligar();

        $campos = array_keys($values);
        $valores = array_pad([], count($campos), '?');

        $tabela = 'INSERT INTO informacoes (' . implode(',', $campos) . ') VALUES(' . implode(',', $valores) . ')';
        $this->execute($tabela, array_values($values));

        return $this->ligacao->lastInsertId();
        $this->desligar();
    }

    public function del($sql, $parametros = null)
    {
        if (!preg_match("/^DELETE/i", $sql)) {
            throw new Exception("Base de dados - Não é uma instrução em delete", 1);
            //die("Base de dados - Não é uma instrução em select");
        }

        //Liga
        $this->ligar();

        $resultados = null;

        try {
            //Comunicação com o banco
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            //Caso exista erros
            return false;
        }

        //Encerra a conexão com o banco de dados
        $this->desligar();

        //Retorna os resultados obtidos
        return $resultados;
    }
}
