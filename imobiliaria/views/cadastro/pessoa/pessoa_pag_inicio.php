<div class="container-fluid">
    
    <div class="container divform">

        <h4> <?php echo $p == 'cadastroProprietario' ? 'PROPRIETÁRIO' : 'CLIENTE';?> </h4>
        <hr>

        <form action="route.php" method="post">

            <input type="text" name="ROUTE" style="display:none" value="salvarPessoa">

            <div class="row">
                <div class="col-md">
                    <label>NOME</label>
                    <input type="text" name="NOME" class="form-control">
                </div>
                <div class="col-md">
                    <label>TELEFONE</label>
                    <input type="number" name="TELEFONE" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <label>E-MAIL</label>
                    <input type="email" name="EMAIL" class="form-control">
                </div> 
            </div>