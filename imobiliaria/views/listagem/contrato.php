<div class="container-fluid">
    
    <div class="container divform ">

        <h4> LISTAGEM CONTRATO </h4>
        <hr>     
        
        <table class="table table-light table-striped table-sm table-hover text-center">
				<thead>		
					<tr>
						<th>ID</th> 			
						<th>CLIENTE</th> 
						<th>IMOVEL</th> 
						<th>DATA INICIO</th>		
						<th>DATA FIM</th> 
						<th>TAXA ADM</th>								
						<th>ALUGUEL R$</th>
						<th>CONDOMINIO R$</th>
						<th>IPTU R$</th>
						<th>TX_ADM R$</th>						
						<th>EDITAR</th>					
					</tr>
				</thead>
				<tbody>

				<?php
					foreach ($bd_lista as $v)
					{ 
                        echo "
                        <tr> 
                            <td> ".$v['ID']." </td>
                            <td> ".$v['NOME_CLIENTE']." </td>
                            <td> ".$v['ENDERECO']." </td>
                            <td> ".$v['DT_INICIO']." </td>

                            <td> ".$v['DT_FIM']." </td>
                            <td> ".$v['TX_ADM']." </td>
                            <td> ".$v['VL_ALUGUEL']." </td>
                            <td> ".$v['VL_CONDOMINIO']." </td>

                            <td> ".$v['VL_IPTU']." </td>
                            <td> ".$v['VL_TX_ADM']." </td>  
                            <td> ".$v['ATIVO']." </td>  

                            <td> <a href='index.php?p=contratoEditar&id=".$v['ID']."' title='EDITAR' class='btn_edit text-dark'> EDITAR </td>
                        </tr> 
                        ";
                    }                         
				?>   					
				
				</tbody>
				<tfoot>
					<tr> 
						<th></th> 
						<th></th> 
						<th></th> 
						<th></th> 

						<th></th>  
						<th></th> 
						<th></th> 					
						<th></th> 

						<th></th> 					
						<th></th> 					
						<th></th> 		
						<th></th> 					
					</tr>
				</tfoot>
			</table>   
    
    </div>
</div>
