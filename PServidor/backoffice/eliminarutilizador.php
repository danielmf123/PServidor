<?php

//Incluir ligação ao servidor//
include('utils/config.php');

//Ler o utilizador selecionado//
$Utilizador = $_POST['select_utilizador'];

//Eliminar o utilizador selecionado//
$Eliminar_Utilizador = $CONFIG->prepare("DELETE FROM utilizador WHERE Username = ?");
$Eliminar_Utilizador->execute(array($Utilizador));

//Redirecionar para a pagina principal//
Header('Location: index.php');


?>