<?php

$dbHost='Localhost';
$dbUsername='root';
$dbPassword='';
$dbName='bdfaculdade';
$conexao=new Mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
if($conexao->connect_errno){
    echo"erro";
}
    else{
        echo"conexão efetuada com sucesso";

    }

?>