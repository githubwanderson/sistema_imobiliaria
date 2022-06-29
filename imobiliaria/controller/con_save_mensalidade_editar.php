<?php
// ==================================================
// VERIFICAR SE TODOS OS CAMPOS DO ARRAY ESTÃO PREENCHIDOS // FUTURO**
$ID             = $_POST['ID'];
$ID_CONTRATO    = $_POST['ID_CONTRATO'];
$PAGINA_RETORNO = $_POST['PAGINA_RETORNO'];
unset($_POST['ID']);
unset($_POST['PAGINA_RETORNO']);
unset($_POST['ID_CONTRATO']);

// ==================================================
// ADICIONAR ELEMENTOS NECESSARIOS 

// TABELA 
$tabela = 'mensalidade';

// ==================================================
// CONEXAO COM BD // CLASSE DE AJUDA

include_once 'database/Query.php';
include_once 'helper/Helper.php';

// ==================================================
// RETORNA ARRAY SEPARADO COM AS CHAVES E VALORES 

$dados = new Helper();
$dados = $dados->retornOneRowUpdate($_POST);

// echo $dados;exit;

// ==================================================
// ENVIAR QUERY E SALVA NO BD

$tabela3    = "mensalidade";
$where      = "ID = ".$ID;

$bd3        = new Query();
$r = $bd3->update($tabela3, $dados, $where);

// ==================================================
// TRATAR CASO ERRO // FUTURO**
//
//

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO 
// SUCESSO OU FALHA
// RETORNO PROVISÓRIO PARA A PAGINA DE CADASTRO SEM ALERTA


if($PAGINA_RETORNO==1)
{
    $_GET['p']  = 'gestaoVencido';
}
else
{
    $_GET['p']  = 'contratoEditar';
    $_GET['id'] = $ID_CONTRATO;
}

include 'index.php';      

// ==================================================
// TESTES...

// echo "data inicio: ".$_POST['DT_INICIO'];
// echo "<br>data fim: ".$_POST['DT_FIM'];
// echo "<br>mensalidade: ".$l2_mensalidade;
// echo "<br>tx_adm: ".$_POST['VL_TX_ADM'];
// echo "<br>repasse: ".$l2_repasse;
// echo "<br>dias restantes: ".$l2_dias_pg_parcial;
// echo "<br>";
// echo "<br>prim_mensalidade: ".$l3_vl_mensalidade_dia;
// echo "<br>prim_repasse: ".$l3_vl_repasse_dia;
// echo "<br>prim_condominio: ".$l3_vl_condominio_dia;
// echo "<br>";

// var_dump($dados_contrato,$teste);
// var_dump($teste);

// exit;

?>







