<?php

// ==================================================
// CONEXAO COM BD 
include_once 'database/Query.php';

// ==================================================
// VERIFICAR SE "VENCIDOS" OU "POR PERIODO"


// ==================================================
// ENVIAR QUERY

$dataAtual      = date("Y-m-d");
$diaAtual       = date("d");

$sql = "SELECT 
                a.ID, 
                a.ID_CONTRATO,
                LEFT(c.ENDERECO,40) ENDERECO,
                d.NOME DESC_CLIENTE,
                e.NOME DESC_PROPRIETARIO,
                DATE_FORMAT(a.DT_REF, '%d/%m/%Y' ) DT_REF,

                a.VL_MENSALIDADE,
                f.DESC DESC_PG_MENSALIDADE, 

                a.VL_REPASSE,
                g.DESC DESC_PG_REPASSE,

                a.VL_CONDOMINIO,
                f.DESC DESC_PG_CONDOMINIO

        FROM mensalidade a

        JOIN contrato b ON b.ID = a.ID_CONTRATO
        JOIN imovel c   ON c.ID = b.ID_IMOVEL
        JOIN pessoa d   ON d.ID = b.ID_PESSOA_CLIENTE
        JOIN pessoa e   ON e.ID = c.ID_PROPRIETARIO
        JOIN descricao f   ON f.ID = a.PG_MENSALIDADE
        JOIN descricao g   ON g.ID = a.PG_REPASSE
        JOIN descricao h   ON h.ID = a.PG_CONDOMINIO
        WHERE 
                a.ATIVO = 1 AND a.DT_REF <= '$dataAtual' AND a.PG_MENSALIDADE = 0 
                OR
                a.ATIVO = 1 AND a.DT_REF <= '$dataAtual' AND e.DIA_REPASSE <= $diaAtual AND a.PG_REPASSE = 0                           
        ORDER BY c.ENDERECO       
        ";

$bd_mensalide   = new Query();
$rows_mensalide = $bd_mensalide->select($sql,1);

// var_dump($rows_mensalide);exit;

?>







