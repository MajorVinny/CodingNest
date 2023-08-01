<?php

$host="localhost";
$nomedobanco="Sugestao";
$usuario="root";
$senha="";

$conexao_sugestao=mysqli_connect($host, $usuario, $senha, $nomedobanco);

if($conexao_sugestao){/* testa a conexão */
   
}else{
    die("<h1>" + "ERRO:" + $err->getMessage() + "</h1>");
}

?>