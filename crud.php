<?php

include "inc/inc_konek.php";

class crud{
    public $table, $field, $db;

    function __construct($table, $field)
    {
        $this->table = $table;
        $this->field = $field;
    }
}

class post extends crud{
    function postData($nama,$harga,$type){
        $sql1 = "insert into {$this->table} (nama,harga,type) Values ('{$nama}','{$harga}','{$type}')";
        $q1 = mysqli_query($this->db,$sql1);
        echo $q1;
    }
}
class update extends crud{
    function update($id){

    }
}
class delete extends crud{

}
class select extends crud{
    function select($idparam,$idvalue,$order){

        if($idparam != null){
            $sql1 = "select * from {$this->table}";
                $q1 = mysqli_query($this->db,$sql1);
                echo $q1;
        }else{
            if($order == null){
                $sql1 = "select * from {$this->table} where {$idparam} = '{$idvalue}'";
                $q1 = mysqli_query($this->db,$sql1);
                echo $q1;
            }else{
                $sql1 = "select * from {$this->table} where {$idparam} = '{$idvalue}' ORDER BY {$order}";
                $q1 = mysqli_query($this->db,$sql1);
                echo $q1;
            }
        }
       
    }
}

$select1 = new select("fav",null);
$select1->select(null,null,null);
