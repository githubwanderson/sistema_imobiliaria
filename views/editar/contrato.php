<div class="container-fluid">
    
    <div class="container divform">

        <h4> EDITAR CONTRATO </h4>
        <hr>

        <form action="route.php" method="post">

            <input type="text" name="ROUTE" style="display:none" value="salvarEditarContrato">

            <div class="row">
                <div class="col-md">
                    <label>ID</label>
                    <input type="number" class="form-control" name="ID" readonly value=<?php echo $bd_dados['ID']; ?>>
                </div> 
                <div class="col-md">
                    <label>CLIENTE</label>
                    <input type="text" class="form-control" readonly value=<?php echo $bd_dados['NOME_CLIENTE']; ?>>
                </div> 
                <div class="col-md">
                    <label>IMOVEL</label>
                    <input type="text" class="form-control" readonly value='<?php echo $bd_dados['ENDERECO']; ?>'>
                </div> 
            </div>

            <div class="row mt-2">

                <div class="col-md">
                    <label>DATA INICIO</label>
                    <input type="date" class="form-control" name="DT_INICIO" value=<?php echo $bd_dados['DT_INICIO']; ?>>
                </div> 
                <div class="col-md">
                    <label>DATA FIM</label>
                    <input type="date" class="form-control" name="DT_FIM" value=<?php echo $bd_dados['DT_FIM']; ?>>
                </div> 

                <div class="col-md">
                    <label>TAXA ADM %</label>
                    <input type="number" class="form-control" name="TX_ADM" value=<?php echo $bd_dados['TX_ADM']; ?>>
                </div>    

                <div class="col-md">
                    <label>TAXA ADM R$</label>
                    <input type="number" class="form-control" name="VL_TX_ADM" value=<?php echo $bd_dados['VL_TX_ADM']; ?>>
                </div>   
            </div>       

            <div class="row mt-2">

                <div class="col-md">
                    <label>VALOR ALUGUEL R$</label>
                    <input type="number" class="form-control" name="VL_ALUGUEL" value=<?php echo $bd_dados['VL_ALUGUEL']; ?>>
                </div>          
                <div class="col-md">
                    <label>VALOR CONDOMINIO R$</label>
                    <input type="number" class="form-control" name="VL_CONDOMINIO" value=<?php echo $bd_dados['VL_CONDOMINIO']; ?>>
                </div>   
                <div class="col-md">
                    <label>VALOR IPTU R$</label>
                    <input type="number" class="form-control" name="VL_IPTU" value=<?php echo $bd_dados['VL_IPTU']; ?>>
                </div>    
           
                <div class="col-md">
                    <label>ATIVO</label>                                          
                    <select class="form-control" name="PG_MENSALIDADE">
                        <?php       
                            $preenchaAtivo = new Helper();
                            $preenchaAtivo->preenchaSelect($bd_select,'ID','DESC',$bd_dados['ATIVO']);
                        ?>
                    </select>  
                </div>          

            </div>
          

            <div class="row mt-2">
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">SALVAR</button>            
                </div>
            </div>

        </form>
    </div>

    <div class="container divform">
        <h4> MENSALIDADE </h4>
        <hr>
        
        <table class="table table-light table-striped table-sm table-hover text-center">
				<thead>		
					<tr>
						<th>DATA REFERENCIA</th>								
						<th>MENSALIDADE R$</th>
						<th>MENSALIDADE PAGO</th>
						<th>REPASSE R$</th>
						<th>REPASSE PAGO</th>
                        <th>CONDOMINIO R$</th>
						<th>CONDOMINIO PAGO</th>
						<th>EDITAR</th>					
					</tr>
				</thead>
				<tbody>

				<?php
					foreach ($bd_mensalidade as $v)
					{ 
                        echo "
                        <tr>                  
                            <td> ".$v['DT_REF']." </td>
                            <td> ".$v['VL_MENSALIDADE']." </td>
                            <td> ".$v['PG_MENSALIDADE']." </td>
                            <td> ".$v['VL_REPASSE']." </td>
                            <td> ".$v['PG_REPASSE']." </td>  
                            <td> ".$v['VL_CONDOMINIO']." </td>
                            <td> ".$v['PG_CONDOMINIO']." </td>  
                            <td> <a href='index.php?p=mensalidadeEditar&id=".$v['ID']."&r=2' title='EDITAR' class='btn_edit text-dark'> EDITAR </td>
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
									
					</tr>
				</tfoot>
			</table>  

    </div>

</div>

