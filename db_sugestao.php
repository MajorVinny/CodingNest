<?php


$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$comentario = $_POST["comentario"];

include("conexao_sugestao.php");

mysqli_query($conexao_sugestao, "INSERT INTO `dados_sugestao`(`nome`, `email`, `assunto`, `comentario`) VALUES ('[$nome]','$email]','[$assunto]','[$comentario]')");

header("location:Sugestao.html");
?>