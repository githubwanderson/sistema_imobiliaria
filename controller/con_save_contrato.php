<?php

// ==================================================
// CONEXAO COM BD // CLASSE DE AJUDA

include_once 'database/Query.php';
include_once 'helper/Helper.php';

// var_dump($_POST["VL_CONDOMINIO"]);exit;

// ==================================================
// ADICIONAR ELEMENTOS NECESSARIOS 

// DATA 
$_POST['DT_CADASTRO']   = date('Y/m/d H:i:s');

// TABELA 
$tabela = 'contrato';

// MESES DE CONTRATO // PADRAO = 12 // O SISTEMA DEVE GERAR 12 MENSALIDADES
$meses_contrato = 12;

// ==================================================
// CALCULO TX_ADM
// VALOR_ALUGUEL*(TX_ADM/100)

$tx_adm             = intval($_POST['TX_ADM']);
$vl_aluguel         = floatval($_POST['VL_ALUGUEL']);
$_POST['VL_TX_ADM'] =  $vl_aluguel*($tx_adm/100);

// ================================================== L1 - LOGICA 1
// CALCULO DATA FIM CONTRATO // DEVE ENCERRAR ANTES DA ULTIMA MENSALIDADE
// DATA_INICIO + ($meses_contrato - 1)

$l1_d               = $_POST['DT_INICIO'].' + '.($meses_contrato-1).' months';
$_POST['DT_FIM']    = date('Y-m-d', strtotime($l1_d));

// ULTIMO DIA DO ULTIMO MES DO CONTRATO

$l1_ultimo_dia = date("t", strtotime($_POST['DT_FIM']));
$l1_ultimo_dia_mes = 'Y-m-'.$l1_ultimo_dia;

// DATA FINAL

$_POST['DT_FIM'] = date($l1_ultimo_dia_mes, strtotime(date('Y-m', strtotime($l1_d))));

// var_dump($_POST['DT_FIM']);exit;



// ==================================================
// RETORNA ARRAY SEPARADO COM AS CHAVES E VALORES 

$dados = new Helper();
$dados = $dados->retornOneRow($_POST);
$key   = $dados['KEY'];
$value = $dados['VALUE'];

// ==================================================
// ENVIAR QUERY E SALVA NO BD

$bd          = new Query();
$id_contrato = $bd->insert($tabela, $key, $value);

// ==================================================
// TRATAR CASO ERRO // FUTURO**
//
//

// ================================================== 
// CRIAR VALOR MENSALIDADES E REPASSES PARA OS PROXIMOS 12 MESES
// ================================================== L2 - LOGICA 2
// CRIAR VALOR MENSALIDADE E REPASSE
$l2_condominio     = floatval($_POST['VL_CONDOMINIO']);
$l2_aluguel_iptu   = $_POST['VL_ALUGUEL'] + floatval($_POST['VL_IPTU']);
$l2_mensalidade    = $l2_aluguel_iptu + $l2_condominio;
$l2_repasse        = $l2_aluguel_iptu -  $_POST['VL_TX_ADM'];


// ================================================== 
// CALCULAR O VALOR DO REPASSE E MENSALIDADE DO PRIMEIRO MES SE DIA FOR DIFERENTE DE 1

$l2_inicio_dia          = date('d', strtotime($_POST['DT_INICIO']));
$incio_diferente_de_um  = false;

if($l2_inicio_dia!=1)
{
    $incio_diferente_de_um = true;

    // IDENTIFICAR DIAS RESTANTES PARA O PROXIMO DIA PRIMEIRO 
    $l2_ultimo_dia      = date("t", strtotime($_POST['DT_INICIO']));
    $l2_dias_pg_parcial = $l2_ultimo_dia - ($l2_inicio_dia-1);

    // ================================================== L3 - LOGICA 3
    // CALCULAR O VALOR DE LOCAÇÃO POR DIA VEZES A QTDE DE DIAS RESTANTES PARA O DIA 1
    $l3_vl_mensalidade_dia = ($l2_mensalidade / $l2_ultimo_dia)*$l2_dias_pg_parcial;
    $l3_vl_repasse_dia     = ($l2_repasse / $l2_ultimo_dia)*$l2_dias_pg_parcial;
    $l3_vl_condominio_dia  = ($l2_condominio / $l2_ultimo_dia)*$l2_dias_pg_parcial;
}

// ==================================================
// CRIAR MENSALIDADES PARA OS PROXIMOS 12 MESES
$dados_contrato = [];
$d = [];

$dt_ref = $_POST['DT_INICIO'].' + 1 months';
$dt_ref = date('Y-m-01', strtotime($dt_ref));

for ($i=0; $i < $meses_contrato; $i++) 
{    
    if($incio_diferente_de_um)
    {
        $d['ID_CONTRATO'] = $id_contrato;
        $d['DT_REF'] = $dt_ref; 
        $d['VL_MENSALIDADE'] = $l3_vl_mensalidade_dia;
        $d['VL_REPASSE'] = $l3_vl_repasse_dia;
        $d['VL_CONDOMINIO'] = $l3_vl_condominio_dia;
        $dados_contrato[$i] = $d;
        $incio_diferente_de_um = false;
    }
    else
    {
        $d['ID_CONTRATO'] = $id_contrato;
        $d['DT_REF'] = $dt_ref;
        $d['VL_MENSALIDADE'] = $l2_mensalidade;
        $d['VL_REPASSE'] = $l2_repasse;
        $d['VL_CONDOMINIO'] = $l2_condominio;
        $dados_contrato[$i] = $d;
    }

    $dt_ref =  $dt_ref.' + 1 months';
    $dt_ref = date('Y-m-01', strtotime($dt_ref));
}

// ==================================================
// SALVAR NO BD

$dados2 = new Helper();
$dados2 = $dados2->retornMultRow($dados_contrato);
$key2   = $dados2['KEY'];
$value2 = $dados2['VALUE'];

// ==================================================
// ENVIAR QUERY E SALVA AS MENSALIDADE NO BD

$tabela2= "mensalidade";
$bd     = new Query();
$bd->insert($tabela2, $key2, $value2);

// ==================================================
// INDISPONIBILIZAR O IMOVEL PARA LOCACAO

$tabela3    = "imovel";
$dados      = "ATIVO=0";
$where      = "ID = ".$_POST['ID_IMOVEL'];

$bd3        = new Query();
$bd3->update($tabela3, $dados, $where);

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO 
// SUCESSO OU FALHA
// RETORNO PROVISÓRIO PARA A PAGINA DE CADASTRO SEM ALERTA

$_GET['p'] = 'cadastroContrato';
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







