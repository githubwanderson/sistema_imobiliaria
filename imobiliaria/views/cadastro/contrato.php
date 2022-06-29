<div class="container-fluid">
    
    <div class="container divform">

        <h4> CONTRATO </h4>
        <hr>

        <form action="route.php" method="post">

            <input type="text" name="ROUTE" style="display:none" value="salvarContrato">

            <div class="row">
                <div class="col-md">
                    <label>CLIENTE</label>                                          
                    <select class="form-control" name="ID_PESSOA_CLIENTE">
                        <?php 
                            // $rows_cliente ESTA DECLARADA NO ARQUIVO con_contrato.php
                            foreach ($rows_cliente as $k => $v) 
                            {
                                $value  = $v['ID'];
                                $desc   = $v['NOME'];
                                echo "<option value=$value>$desc</option>";                       
                            }                 
                        ?>
                    </select>
                </div>
                <div class="col-md">
                    <label>IMÓVEL</label>                                          
                    <select class="form-control" name="ID_IMOVEL">
                        <?php 
                            // $rows_imovel ESTA DECLARADA NO ARQUIVO con_contrato.php
                            foreach ($rows_imovel as $k => $v) 
                            {
                                $value  = $v['ID'];
                                $desc   = $v['NOME'];
                                echo "<option value=$value>$desc</option>";                       
                            }                 
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <label>ALUGUEL R$</label>
                    <input type="number" class="form-control" name="VL_ALUGUEL" required min=1>
                </div> 
                <div class="col-md">
                    <label>DATA INICIO</label>
                    <input type="date" class="form-control" name="DT_INICIO" required>
                </div> 
                <!-- <div class="col-md">
                    <label>DATA FIM</label>
                    <input type="date" class="form-control" name="DT_FIM">
                </div>  -->          
            </div>

            <div class="row">
                <div class="col-md">
                    <label>TAXA ADMINISTRAÇÃO %</label>
                    <input type="number" class="form-control" name="TX_ADM" required min=1.00>
                </div> 
                <div class="col-md">
                    <label>CONDOMINIO R$</label>
                    <input type="number" class="form-control" name="VL_CONDOMINIO" required min=0.00>
                </div> 
                <div class="col-md">
                    <label>IPTU R$</label>
                    <input type="number" class="form-control" name="VL_IPTU" required min=0.00>
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
