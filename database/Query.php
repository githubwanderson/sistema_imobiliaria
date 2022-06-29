<?php

date_default_timezone_set('America/Sao_Paulo');

include_once "ConexaoBD.php";

class Query extends ConexaoBD
{    
    public function queryUser($sql)
    {   
        $pdo    = $this->conectar();
        $r      = $pdo->query($sql);
        return $r;       
    }

    public function insert($tabela,$key,$value)
    {   
        $sql    = "INSERT INTO $tabela $key VALUES $value";
        $pdo    = $this->conectar();
        $r      = $pdo->query($sql);
        $r      = $pdo->lastInsertId();
        return $r;       
    }

    public function select($sql,$p=null)
    {   
        $pdo    = $this->conectar();
        $r      = $pdo->query($sql);
        if($p)
        {
            $result = $r->fetchAll();
        }
        else
        {
            $result = $r->fetch();
        }
        return $result;       
    }

    public function update($tabela,$dados,$where)
    {   
        $sql    = "UPDATE $tabela SET $dados WHERE $where";
        $pdo    = $this->conectar();
        $r      = $pdo->query($sql);
        return $r;       
    }


}


?>