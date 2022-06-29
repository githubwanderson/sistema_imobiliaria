<?php

// ==================================================
// CONEXAO COM BD 
include_once 'database/Query.php';

// ==================================================
// ENVIAR QUERY

$sql = "SELECT ID, NOME
        FROM pessoa
        WHERE ATIVO = 1 AND LOCATARIO_PROPRIETARIO = 1
        ORDER BY NOME";
        
$bd     = new Query();
$rows   = $bd->select($sql,1);

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO

?>







