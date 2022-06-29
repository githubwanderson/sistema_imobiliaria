<?php

// ==================================================
// CONEXAO COM BD 
include_once 'database/Query.php';

// ==================================================
// PEGAR DADOS PARA SELECT CLIENTE

$sql = "SELECT ID, NOME
        FROM pessoa
        WHERE ATIVO = 1 AND LOCATARIO_PROPRIETARIO = 0
        ORDER BY NOME";

$bd_cliente     = new Query();
$rows_cliente   = $bd_cliente->select($sql,1);

// ==================================================
// PEGAR DADOS PARA SELECT IMOVEL
$sql = "SELECT a.ID, CONCAT(a.ENDERECO, ' - ',b.NOME) NOME
        FROM imovel a
        JOIN pessoa b ON b.ID = a.ID_PROPRIETARIO
        WHERE a.ATIVO = 1
        ORDER BY a.ENDERECO";

$bd_imovel     = new Query();
$rows_imovel   = $bd_imovel->select($sql,1);
// var_dump($rows_imovel);exit;

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO

?>







