<div class="container-fluid">
    
    <div class="container divform">

        <h4> EDITAR MENSALIDADE </h4>
        <hr>

        <form action="route.php" method="post">

            <input type="text" name="ROUTE" style="display:none" value="salvarEditarMensalidade">
            <input type="text" name="PAGINA_RETORNO" style="display:none" value=<?php echo $PAGINA_RETORNO ?>>

            <div class="row">
                <div class="col-md">
                    <label>ID</label>
                    <input type="number" class="form-control" name="ID" readonly value=<?php echo $bd_dados['ID']; ?>>
                </div> 
                <div class="col-md">
                    <label>ID CONTRATO</label>
                    <input type="number" class="form-control" name="ID_CONTRATO" readonly value=<?php echo $bd_dados['ID_CONTRATO']; ?>>
                </div> 
                <div class="col-md">
                    <label>DATA REFERENCIA</label>
                    <input type="date" class="form-control" readonly value=<?php echo $bd_dados['DT_REF']; ?>>
                </div> 
            </div>

            <div class="row mt-2">
                <div class="col-md">
                    <label>VALOR MENSALIDADE R$</label>
                    <input type="number" class="form-control" name="VL_MENSALIDADE" value=<?php echo $bd_dados['VL_MENSALIDADE']; ?>>
                </div>          

                <div class="col-md">
                    <label>MENSALIDADE PAGA?</label>                                          
                    <select class="form-control" name="PG_MENSALIDADE">
                        <?php       
                            $preenchaMensalidade = new Helper();
                            $preenchaMensalidade->preenchaSelect($bd_select,'ID','DESC',$bd_dados['PG_MENSALIDADE']);
                        ?>
                    </select>  
                </div>

                <div class="col-md">
                    <label>DATA PAGAMENTO MENSALIDADE</label>
                    <input type="date" class="form-control" name="DT_PG_MENSALIDADE" value=<?php echo $bd_dados['DT_PG_MENSALIDADE']; ?>>
                </div> 
            </div>       

            <div class="row mt-2">

                <div class="col-md">
                    <label>VALOR REPASSE R$</label>
                    <input type="number" class="form-control" name="VL_REPASSE" value=<?php echo $bd_dados['VL_REPASSE']; ?>>
                </div>          

                <div class="col-md">
                    <label>REPASSE PAGO?</label>                                          
                    <select class="form-control" name="PG_REPASSE">
                        <?php       
                            $preenchaRepasse = new Helper();
                            $preenchaRepasse->preenchaSelect($bd_select,'ID','DESC',$bd_dados['PG_REPASSE']);
                        ?>
                    </select>  
                </div>

                <div class="col-md">
                    <label>DATA PAGAMENTO REPASSE</label>
                    <input type="date" class="form-control" name="DT_PG_REPASSE" value=<?php echo $bd_dados['DT_PG_REPASSE']; ?>>
                </div> 

            </div>

            <div class="row mt-2">

                <div class="col-md">
                    <label>VALOR CONDOMINIO R$</label>
                    <input type="number" class="form-control" name="VL_CONDOMINIO" value=<?php echo $bd_dados['VL_CONDOMINIO']; ?>>
                </div>          

                <div class="col-md">
                    <label>CONDOMINIO PAGO?</label>                                          
                    <select class="form-control" name="PG_CONDOMINIO">
                        <?php       
                            $preenchaCondominio = new Helper();
                            $preenchaCondominio->preenchaSelect($bd_select,'ID','DESC',$bd_dados['PG_CONDOMINIO']);
                        ?>
                    </select>  
                </div>

                <div class="col-md">
                    <label>DATA PAGAMENTO CONDOMINIO</label>
                    <input type="date" class="form-control" name="DT_PG_CONDOMINIO" value=<?php echo $bd_dados['DT_PG_CONDOMINIO']; ?>>
                </div> 

            </div>

            <div class="row mt-2">
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">SALVAR</button>            
                </div>
            </div>

        </form>
    </div>
</div>

