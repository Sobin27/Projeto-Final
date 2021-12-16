<?php

namespace core\Views;

use Core\Model\crud;
use Core\Classes\Banco;
use PDO;
use PDOException;

echo "<a href= '/cadastro'>Novo</a>";


$consults = new crud();
$consults->read();

?>
