<?php

session_start();

//Incluir ligação ao servidor//
include('utils/config.php');


//Ler o ID da conta//
$Ler_ID = $CONFIG->prepare("SELECT ID FROM utilizador WHERE Username = ?");
$Ler_ID->execute(array($_SESSION['LogadoEm']));

while($row = $Ler_ID->fetch()){

    $ID = $row['ID'];

}

//Verificar se o utilizador está a alterar o email ou a password//

if(isset($_POST['email'])){

    $Email = $_POST['email'];

    $Alterar_Email = $CONFIG->prepare("UPDATE utilizador SET Email = ? WHERE ID = ?");
    $Alterar_Email->execute(array($Email,$ID));

}
elseif(isset($_POST['password'])){


    $Password = $_POST['password'];
    $Password_Encript = sha1($Password);

    $Alterar_Password = $CONFIG->prepare("UPDATE utilizador SET Password = ? WHERE ID = ?");
    $Alterar_Password->execute(array($Password_Encript,$ID));

}

//Terminar a sessão ao utilizador//
$_SESSION = array();

session_destroy();

//Redirecionar para a pagina principal//
Header('Location: index.php');

?>