<?php

//Incluir configuração//
include('utils/config.php');

//Ler os dados do formulário//
echo $Nome = $_POST['nome'];
echo $Utilizador = $_POST['username'];
echo $Password = $_POST['password'];
echo $Email = $_POST['email'];
echo $Data_Nasc = $_POST['data_nasc'];
echo $Tipo = $_POST['privilegios'];

//Encriptar a password//
$Password_Encript = sha1($Password);

//Verificar se existe algum utilizador identico registado//
$Verificar_Existencia = $CONFIG->prepare("SELECT * FROM utilizador WHERE Username = ?");
$Verificar_Existencia->execute(array($Utilizador));

//Ler todos os valores existentes enquanto a query for verdadeira//
while($row = $Verificar_Existencia->fetch()){

    //Incrementar a quantidade de registos verdadeiros encontrados//
    $Count++;

}

//Caso a variavel contadora seja = 0 podemos registar o utilizador//
if($Count == 0){

    $Registar_Utilizador = $CONFIG->prepare("INSERT INTO utilizador(Nome,Data_Nascimento,Email,Username,Password,Tipo) VALUES(?,?,?,?,?,?)");
    $Registar_Utilizador->execute(array($Nome,$Data_Nasc,$Email,$Utilizador,$Password_Encript,$Tipo));

}

//Redirecionar para a pagina principal//
Header('Location: index.php');



?>