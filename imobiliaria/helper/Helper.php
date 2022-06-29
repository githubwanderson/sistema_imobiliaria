<?php

class Helper 
{
    // ==================================================
    // RECEBE UM ARRAY E DEVOLVE UM ARRAY COM UMA LINHA CAMPO KEY 
    // E UMA LINHA CAMPO VALOR 
    // PARA EFETUAR INSERT NO BANCO DE DADOS

    public function retornOneRow($array)
    {
        $novoArray  = [];
        $key        = false;
        $valor      = false;

        // PEGANDO AS CHAVES E VALORES 
        foreach ($array as $k => $v) 
        {
            if($key)
            {
                $key    = $key.",".$k;
                $valor  = $valor.",'".$v."'";
            }
            else
            {
                $key     = $k;
                $valor   = "'".$v."'";
            }
        }

        // CRIANDO STRINGS PARA INSERT
        $novoArray['KEY']   = "(".$key.")";
        $novoArray['VALUE'] = "(".$valor.")"; 

        return $novoArray;
    }

    // ==================================================
    // RECEBE UM ARRAY E DEVOLVE UM ARRAY COM UMA LINHA CAMPO KEY 
    // E MULTIPLAS LINHAS CAMPO VALOR 
    // PARA EFETUAR INSERT NO BANCO DE DADOS

    public function retornMultRow($array)
    {
        $novoArray          = [];
        $key                = false;
        $valor              = false;
        $novoArray['VALUE'] = false;

        foreach ($array as $k => $v) 
        {
            // PEGAR OS DADOS DE CADA ELEMENTO DO ARRAY MULT $ARRAY 
            foreach ($v as $k2 => $v2) 
            {
                // PEGANDO VALORES
                if($valor)
                {
                    $valor  = $valor.",'".$v2."'";
                }
                else
                {
                    $valor   = "'".$v2."'";
                }

                // PEGANDO AS CHAVES // APENAS DO PRIMEIRO LAÇO
                if(!$novoArray['VALUE'])
                {
                    if($key)
                    {
                        $key    = $key.",".$k2;
                    }
                    else
                    {
                        $key     = $k2;
                    }
                }              
            }

            // CRIANDO STRINGS PARA INSERT MULTIPLO
            if($novoArray['VALUE'])
            {
                $novoArray['VALUE'] = $novoArray['VALUE'].",(".$valor.")"; 
            }
            else
            {
                $novoArray['VALUE'] = "(".$valor.")"; 
                $novoArray['KEY']   = "(".$key.")";
            }
            $valor = false;    
        }
        return $novoArray;
    }

    // ==================================================
    // RECEBE UM ARRAY E DEVOLVE UMA STRING UNINDO KEY E VALUE 
    // PARA EFETUAR UPDATE NO BANCO DE DADOS    
    public function retornOneRowUpdate($array)
    {
        $update     = false;
        // PEGANDO AS CHAVES E VALORES 
        foreach ($array as $k => $v) 
        {
            if($update)
            {
                $update  = $update.",".$k."='".$v."'";
            }
            else
            {
                $update  = $k."='".$v."'";
            }
        }
        return $update;
    }
    // ==================================================
    // RECEBE UM ARRAY + ID E DESC QUE SERA UTILIZADO PARA O OPTION DESSE ARRAY + ID QUE FICARA SELECIONADO

    public function preenchaSelect($array,$array_id,$array_desc,$seletor)
    {
        foreach ($array as $value) 
        {
            $id     = $value[$array_id];
            $desc   = $value[$array_desc];
            $select = $id == $seletor ? "selected='selected'" : "";
            echo "<option value=$id $select>$desc</option>";      
        }
    }

}

?>