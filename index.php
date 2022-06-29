<?php 

// ==================================================
// HEADER

include 'views/layout/cabecalho.php';

// ==================================================
// BODY

// ==================================================
// CARREGAMENTO PARA ENTRADA TIPO GET
if(isset($_GET['p']))
{
    $p = $_GET['p'];

    switch (true) 
    {
        case ($p=='cadastroCliente'):           
            include 'views/cadastro/pessoa/pessoa_pag_inicio.php';
            include 'views/cadastro/pessoa/pessoa_cliente.php';
            include 'views/cadastro/pessoa/pessoa_pag_fim.php';
            break;

        case ($p=='cadastroProprietario'):
            include 'views/cadastro/pessoa/pessoa_pag_inicio.php';
            include 'views/cadastro/pessoa/pessoa_proprietario.php';
            include 'views/cadastro/pessoa/pessoa_pag_fim.php';
            break;        
        
        case ($p=='cadastroImovel'):
            include 'controller/con_imovel.php'; 
            include 'views/cadastro/imovel.php';
            break;

        case ($p=='cadastroContrato'):
            include 'controller/con_contrato.php'; 
            include 'views/cadastro/contrato.php';
            break;

        case ($p=='gestaoVencido'):
            include 'controller/con_gestao.php'; 
            include 'views/listagem/gestao.php';
            break;

        case ($p=='mensalidadeEditar'):
            include 'controller/con_mensalidade.php'; 
            include 'views/editar/mensalidade.php';
            break;

        case ($p=='contratoEditar'):
            include 'controller/con_editar_contrato.php'; 
            include 'views/editar/contrato.php';
            break;

        case ($p=='listagem'):
            include 'controller/con_listagem.php'; 
            include 'views/listagem/contrato.php';
            break;
    
        default:
            include 'views/home.php';
            break;
    }
}
else
{
    include 'views/home.php';
}

// ==================================================
// CARREGAMENTO PARA RESPOSTA DE UMA AÇÃO ALERTA
// if($alert)
// {
//     include 'views/cadastro/pessoa/pessoa_pag_inicio.php';
//     include 'views/cadastro/sucesso.php';
//     include 'views/cadastro/pessoa/pessoa_pag_fim.php';
// }
// else
// {
//     include 'views/cadastro/pessoa/pessoa_pag_inicio.php';
//     include 'views/cadastro/erro.php';
//     include 'views/cadastro/pessoa/pessoa_pag_fim.php';    
// }

// ==================================================
// CASO NAO ATENDE OS REQUISITOS ANTERIORES IR PARA HOME
// include 'views/home.php';

// ==================================================
// FOOTER
include 'views/layout/rodape.php';

?>



