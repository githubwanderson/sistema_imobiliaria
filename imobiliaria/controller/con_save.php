<?php

// ==================================================
// CONEXAO COM BD // CLASSE DE AJUDA

include_once 'database/Query.php';
include_once 'helper/Helper.php';

// ==================================================
// VERIFICAR SE TODOS OS CAMPOS ESTÃO PREENCHIDOS // FUTURO**
// RETORNA ARRAY SEPARADO COM AS CHAVES E VALORES

$dados = new Helper();
$dados = $dados->retornOneRow($_POST);
$key   = $dados['KEY'];
$value = $dados['VALUE'];

// var_dump($dados);exit;


// ==================================================
// SALVAR NO BD
$bd     = new Query();
$result = $bd->insert($tabela, $key, $value);

// ==================================================
// DIRECIONAR RESPOSTA AO USUARIO 
// SUCESSO OU FALHA
// RETORNO PROVISÓRIO PARA A PAGINA DE CADASTRO SEM ALERTA
switch (true) 
{
    case ($r=='salvarPessoa'):  
        $_GET['p'] = isset($_POST['DIA_REPASSE']) ? 'cadastroProprietario' : 'cadastroCliente';         
        break;

    case ($r=='salvarImovel'):  
        $_GET['p'] = 'cadastroImovel';
        break;    
        
    case ($r=='salvarContrato'):    
        $_GET['p'] = 'cadastroContrato';
        break;    
    
    default:
        $_GET['p'] = 'nulo';
        break;
}

include 'index.php';      

// var_dump($r);exit;

?>







