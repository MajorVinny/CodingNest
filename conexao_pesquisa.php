<?php

$host="localhost";
$nomedobanco="pesquisa";
$usuario="root";
$senha="";

$conexao=mysqli_connect($host, $usuario, $senha, $nomedobanco);

if($conexao){/* testa a conexão */
   
}else{
    die("<h1>" + "ERRO:" + $err->getMessage() + "</h1>");
}

?>