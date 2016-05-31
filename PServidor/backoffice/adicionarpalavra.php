<?php

//Incluir ficheiro de configuraçao//
include('utils/config.php');

//Ler os dados do formulário//
$Palavra = $_POST['palavra'];
$Sugestao = $_POST['sugestao'];

//Adicionar nova palavra ao sistema//
$Adicionar_Palavra = $CONFIG->prepare("INSERT INTO palavras(Palavra,Dica) VALUES (?,?)");
$Adicionar_Palavra->execute(array($Palavra,$Sugestao));

//Redirecionar para a pagina princnipal//
Header('Location: index.php');

?>