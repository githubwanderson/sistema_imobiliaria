<div class="container-fluid">
    
    <div class="container divform ">

        <h4> MENSALIDADES VENCIDAS </h4>
        <hr>     
        
        	<table class="table table-light table-striped table-sm table-hover text-center">
				<thead>		
					<tr>
						<th>ID</th> 			
						<th>ID CONTRATO</th> 
						<th>ENDEREçO</th> 
						<th>PROPRIETARIO</th>		
						<th>CLIENTE</th> 
						<th>DATA REFERENCIA</th>								
						<th>MENSALIDADE R$</th>
						<th>MENSALIDADE PAGO</th>
						<th>REPASSE R$</th>
						<th>REPASSE PAGO</th>
						<th>EDITAR</th>					
					</tr>
				</thead>
				<tbody>

				<?php
					foreach ($rows_mensalide as $v)
					{ 
                        echo "
                        <tr> 
                            <td> ".$v['ID']." </td>
                            <td> ".$v['ID_CONTRATO']." </td>
                            <td> ".$v['ENDERECO']." </td>
                            <td> ".$v['DESC_PROPRIETARIO']." </td>
                            <td> ".$v['DESC_CLIENTE']." </td>
                            <td> ".$v['DT_REF']." </td>
                            <td> ".$v['VL_MENSALIDADE']." </td>
                            <td> ".$v['DESC_PG_MENSALIDADE']." </td>
                            <td> ".$v['VL_REPASSE']." </td>
                            <td> ".$v['DESC_PG_REPASSE']." </td>  
                            <td> <a href='index.php?p=mensalidadeEditar&id=".$v['ID']."&r=1' title='EDITAR' class='btn_edit text-dark'> EDITAR </td>
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
					</tr>
				</tfoot>
			</table>   
    
    </div>
</div>
