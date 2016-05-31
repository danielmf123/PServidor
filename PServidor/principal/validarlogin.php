<?php

//Incluir ficheiro de configuração//
include('utils/config.php');

//Iniciar sessão//
session_start();

//Obter os dados do formulário//
$Utilizador = $_POST['utilizador'];
$Password = $_POST['password'];

//Encriptar a password//
$Password_Encript = sha1($Password);

//Verificar se o utilizador existe no sistema//
$Verificar_Login = $CONFIG->prepare("SELECT Username , Password , Tipo FROM utilizador WHERE Username = ? AND Password = ?");
$Verificar_Login->execute(array($Utilizador,$Password_Encript));

$Count = 0;

while($row = $Verificar_Login->fetch()){

    $Count++;

}


//Caso seja detetado 1 registo vamos criar uma sessão e cookie para o utilizador//
if($Count ==1){

    $_SESSION['LogadoEm'] = $Utilizador;
    setcookie('LogadoEm',$Utilizador,time() + 3600);


    Header('Location: index.php');

}
else{

    echo "Login Errado <a href = 'index.php'>Voltar</a>";

}

?>