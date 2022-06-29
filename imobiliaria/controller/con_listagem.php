<?php

// var_dump($_GET);exit;
// ==================================================
// CONEXAO COM BD 
include_once 'database/Query.php';

// ==================================================
// ENVIAR QUERY
// L=1 CONTRATO // L=2 IMOVEL // L=3 CLIENTE // L=4 PROPRIETARIO

if(isset($_GET["l"]))
{
        $l = $_GET["l"];

        switch (true) 
        {
                case ($l==1):           
                        $tabela = "contrato a";
                        $join   = " 
                                JOIN pessoa b ON b.ID = a.ID_PESSOA_CLIENTE
                                JOIN imovel c ON c.ID = a.ID_IMOVEL  
                                JOIN descricao d ON d.ID = a.ATIVO                              
                                ";
                        $tabela = $tabela.$join;
                        $select = "
                                a.*,
                                DATE_FORMAT(a.DT_INICIO, '%d/%m/%Y') DT_INICIO, 
                                DATE_FORMAT(a.DT_FIM, '%d/%m/%Y') DT_FIM, 
                                b.NOME NOME_CLIENTE, 
                                c.ENDERECO, 
                                d.DESC ATIVO
                                ";
                        break;

                default:
                echo 'ERRO - TRATAR ERRO';exit;
                        break;
        }
}
else
{
        echo 'ERRO - TRATAR ERRO'; exit;
}


$sql = "SELECT $select FROM $tabela";
$bd_lista   = new Query();
$bd_lista   = $bd_lista->select($sql,1);

// var_dump($bd_lista);exit;

?>







