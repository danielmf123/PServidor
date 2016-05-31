<?php

//Incluir ligação ao servidor//
include('utils/config.php');

//Verificar se o utilizador pretende definir a palavra a modificar ou se pretende modificar apenas//
if(isset($_POST['select_utilizador'])){

    //Caso a palavra esteja definida retoramos o seu valor para o endereco//
    $Utilizador = $_POST['select_utilizador'];

    //Ler a dica da palavra mencionada//
    $Ler_Utilizador = $CONFIG->prepare("SELECT * FROM utilizador WHERE Username = ?");
    $Ler_Utilizador->execute(array($Utilizador));

    while($row = $Ler_Utilizador->fetch()){

        $ID = $row['ID'];
        $Nome = $row['Nome'];
        $Username = $row['Username'];
        $Data_Nascimento = $row['Data_Nascimento'];
        $Tipo = $row['Tipo'];
        $Email = $row['Email'];

    }

    Header("Location: gestUsers.php?id=$ID&nome=$Nome&username=$Username&data_nasc=$Data_Nascimento&tipo=$Tipo&email=$Email");

}
else{

    //Ler os dados do formulário//
    echo $ID = $_POST['id'];
    echo $Username = $_POST['username'];
    echo $Email = $_POST['email'];
    echo $Tipo_Conta = $_POST['tipo'];
    echo $Nome = $_POST['nome'];
    echo $Data_Nascimento = $_POST['data_nasc'];

    //Se a palavra não estiver definida modificamos//
    $ModificarUtilizador = $CONFIG->prepare('UPDATE utilizador SET Nome = ? , Data_Nascimento = ? , Email = ? , Username = ? , Tipo = ? WHERE ID = ?');
    $ModificarUtilizador->execute(array($Nome,$Data_Nascimento,$Email,$Username,$Tipo_Conta,$ID));

    //Redirecionar para a pagina principal//
    Header('Location: gestUsers.php');

}

?>