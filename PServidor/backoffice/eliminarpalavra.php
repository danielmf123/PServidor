<?php

//Incluir ligação ao servidor//
include('utils/config.php');

//Ler os dados do form//
$Palavra = $_POST['select_palavra'];

//Eliminar a palavra em questão do sistema//
$Eliminar_Palavra = $CONFIG->prepare("DELETE FROM palavras WHERE Palavra = ?");
$Eliminar_Palavra->execute(array($Palavra));

//Redirecionar para a pagina princinpal//
Header('Location: index.php');

?>