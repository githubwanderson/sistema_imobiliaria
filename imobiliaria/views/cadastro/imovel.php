<div class="container-fluid">
    
    <div class="container divform">

        <h4> IMÓVEL </h4>
        <hr>

        <form action="route.php" method="post">

            <input type="text" name="ROUTE" style="display:none" value="salvarImovel">

            <div class="row">
                <div class="col-md">
                    <label>PROPRIETARIO</label>    
                    <select class="form-control" name="ID_PROPRIETARIO">    
                        <?php 
                            // $rows ESTA DECLARADA NO ARQUIVO con_imovel.php
                            foreach ($rows as $k => $v) 
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
                    <label>ENDEREÇO</label>
                    <input type="text" class="form-control" name="ENDERECO">
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
