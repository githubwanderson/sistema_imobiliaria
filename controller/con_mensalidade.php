<?php

// ==================================================
// PASSANDO OS VALORES DO POST PARA VAR 
$ID             = $_GET['id']; // ID QUE SERA ATUALIZADO
$PAGINA_RETORNO = $_GET['r']; // ONDE SERA O RETORNO DA MENSALIDADE // 1=gestaoVencido // 2=contratoEditar

// ==================================================
// CONEXAO COM BD 
include_once 'database/Query.php';
include_once 'helper/Helper.php';

// ==================================================
// PEGAR DADOS MENSALIDADE
$sql = "SELECT *
        FROM mensalidade
        WHERE ID = $ID";

$bd_mensalidade = new Query();
$bd_dados       = $bd_mensalidade->select($sql,0);

// ==================================================
// PEGAR DADOS DESC SELECT
$sql = "SELECT *
        FROM descricao
        WHERE REF = 1";

$bd_select = new Query();
$bd_select = $bd_select->select($sql,1);

// var_dump($bd_select);exit;

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO

?>







