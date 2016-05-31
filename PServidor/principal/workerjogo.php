<?php

//Incluir ligação ao servidor//
include('utils/config.php');

$Key = $_GET['key'];

$Palavra = strtoupper($_COOKIE['Palavra']);

$ID_Jogo = $_COOKIE['IDJogo'];

$pos = strpos($Palavra,$Key);

$Estado;

//Caso a posição seja diferente de falsa significa que encontrou algo
if ($pos !== false) {

    //Verificar se o utilizador já esgotou as tentativas//
    $Verificar_Tentantivas = $CONFIG->prepare("SELECT ID FROM logs_jogo WHERE ID_Jogo = ?");
    $Verificar_Tentantivas->execute(array($ID_Jogo));
    $Tentativas_Restantes=0;

    while($row = $Verificar_Tentantivas->fetch()){

        $Tentativas_Restantes++;

    }

   // if(!$Tentativas_Restantes >6){



    $Estado = "Certo";
    //Adicionar Letra , posição e estado ao sistema//
    $Adicionar_Letra = $CONFIG->prepare("INSERT INTO logs_jogo(ID_Jogo,Palavra,Posicao,Letra,Estado) VALUES (?,?,?,?,?)");
    $Adicionar_Letra->execute(array($ID_Jogo,$Palavra,$pos,$Key,$Estado));

    //}

} else {

    //Verificar se o utilizador já esgotou as tentativas//
    $Verificar_Tentantivas = $CONFIG->prepare("SELECT ID FROM logs_jogo WHERE ID_Jogo = ?");
    $Verificar_Tentantivas->execute(array($ID_Jogo));
    $Tentativas_Restantes=0;
    while($row = $Verificar_Tentantivas->fetch()){

        $Tentativas_Restantes++;

    }

    //if(!$Tentativas_Restantes >6){



        $Estado = "Errado";
        //Adicionar Letra , posição e estado ao sistema//
        $Adicionar_Letra = $CONFIG->prepare("INSERT INTO logs_jogo(ID_Jogo,Palavra,Posicao,Letra,Estado) VALUES (?,?,?,?,?)");
        $Adicionar_Letra->execute(array($ID_Jogo,$Palavra,$pos,$Key,$Estado));

    //}

}

$URL = "jogo.php?id=$ID_Jogo";
//Redirecionar para a pagina do jogo//
Header("Location: " . $URL);



?>