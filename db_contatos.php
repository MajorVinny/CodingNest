<?php


$nome = $_POST["nome"];
$email = $_POST["email"];
$comentario = $_POST["comentario"];

include("conexao_contato.php");

mysqli_query($conexao_contatos, "INSERT INTO `dados_contato`(`nome_contato`, `email_contato`, `comentario_contato`) VALUES ('[$nome]','[$email]','[$comentario]')");

header("location:Contatos.html");
?>