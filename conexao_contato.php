<?php

$host="localhost";
$nomedobanco="contatos";
$usuario="root";
$senha="";

$conexao_contatos=mysqli_connect($host, $usuario, $senha, $nomedobanco);

if($conexao_contatos){/* testa a conexão */
   
}else{
    die("<h1>" + "ERRO:" + $err->getMessage() + "</h1>");
}

?>