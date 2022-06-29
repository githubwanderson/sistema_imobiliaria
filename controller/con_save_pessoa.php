<?php

// ==================================================
// ADICIONAR ELEMENTOS NECESSARIOS 
// DATA 
$_POST['DT_CADASTRO']   = date('Y/m/d H:i:s');

// TABELA 
$tabela = 'pessoa';

// ESPECIALIZACAO PESSOA
// IS EXISTIR DIA_REPASSE ENTAO ADICIONA LOCATARIO_PROPRIETARIO = 1     
isset($_POST['DIA_REPASSE']) ? $_POST['LOCATARIO_PROPRIETARIO'] = 1 : null;

?>







