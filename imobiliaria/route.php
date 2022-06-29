<?php 
  
if($_POST['ROUTE'])
{
    $r = $_POST['ROUTE']; unset($_POST['ROUTE']);

    switch (true) 
    {
        case ($r=='salvarPessoa'):             
            include 'controller/con_save_pessoa.php';          
            include 'controller/con_save.php'; 
            break;

        case ($r=='salvarImovel'):
            include 'controller/con_save_imovel.php';          
            include 'controller/con_save.php';      
            break;    
            
        case ($r=='salvarContrato'):
            include 'controller/con_save_contrato.php';      
            break;   
        
        case ($r=='salvarEditarContrato'):
            include 'controller/con_save_editar_contrato.php';  
            include 'controller/con_save.php';     

            break;     

        case ($r=='salvarEditarMensalidade'):
            include 'controller/con_save_mensalidade_editar.php';      
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

?>



