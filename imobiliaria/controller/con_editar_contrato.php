<?php

// ==================================================
// PASSANDO OS VALORES DO POST PARA VAR 
$ID = $_GET['id']; // ID QUE SERA ATUALIZADO

// ==================================================
// CONEXAO COM BD 
include_once 'database/Query.php';
include_once 'helper/Helper.php';

// ==================================================
// PEGAR DADOS 

$sql = "SELECT a.*,
        DT_INICIO, 
        DT_FIM, 
        b.NOME NOME_CLIENTE, 
        c.ENDERECO
        FROM contrato a
        JOIN pessoa b ON b.ID = a.ID_PESSOA_CLIENTE
        JOIN imovel c ON c.ID = a.ID_IMOVEL  
        WHERE a.ID = $ID
        ";

$bd_dados = new Query();
$bd_dados = $bd_dados->select($sql,0);

// ==================================================
// PEGAR DADOS DESC SELECT
$sql1 = "SELECT *
        FROM descricao
        WHERE REF = 1";

$bd_select = new Query();
$bd_select = $bd_select->select($sql1,1);

// ==================================================
// PEGAR DADOS MENSALIDADE
$sql2 = "SELECT 
                a.ID,
                DATE_FORMAT(a.DT_REF, '%d/%m/%Y' ) DT_REF,

                a.VL_MENSALIDADE,
                b.DESC PG_MENSALIDADE,
                DATE_FORMAT(a.DT_PG_MENSALIDADE, '%d/%m/%Y' ) DT_PG_MENSALIDADE,

                a.VL_REPASSE,
                c.DESC PG_REPASSE,
                DATE_FORMAT(a.DT_PG_REPASSE, '%d/%m/%Y' ) DT_PG_REPASSE,

                a.VL_CONDOMINIO,
                d.DESC PG_CONDOMINIO,
                DATE_FORMAT(a.DT_PG_CONDOMINIO, '%d/%m/%Y' ) DT_PG_CONDOMINIO


        FROM mensalidade a

        JOIN descricao b  ON b.ID = a.PG_MENSALIDADE
        JOIN descricao c  ON c.ID = a.PG_REPASSE
        JOIN descricao d  ON d.ID = a.PG_CONDOMINIO

        WHERE a.ID_CONTRATO = $ID
        ";

// $sql2 = "SELECT * FROM mensalidade WHERE ID = $ID";

$bd_mensalidade = new Query();
$bd_mensalidade = $bd_mensalidade->select($sql2,1);

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO


?>







