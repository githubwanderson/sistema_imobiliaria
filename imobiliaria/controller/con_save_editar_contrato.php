<?php

// ==================================================
// CONEXAO COM BD // CLASSE DE AJUDA

include_once 'database/Query.php';
include_once 'helper/Helper.php';

// ==================================================
// ENVIAR QUERY E SALVA NO BD

$ID = $_POST['ID'];
unset($_POST['ID']);


$tabela    = "contrato";
$where      = "ID = ".$ID;

$dados = new Helper();
$dados = $dados->retornOneRowUpdate($_POST);

// var_dump($dados );exit;


// ==================================================
// SALVAR NO BD
$bd        = new Query();
$r = $bd->update($tabela, $dados, $where);

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO 
// SUCESSO OU FALHA
// RETORNO PROVISÓRIO PARA A PAGINA DE CADASTRO SEM ALERTA

echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=listagem&l=1'>";

// $_GET['p'] = 'listagem';
// $_GET['l'] = '1';

// require '';      



?>







