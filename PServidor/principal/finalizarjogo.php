<?php

//Incluir ligação ao servidor//
include('utils/config.php');

echo $ID_Jogo = $_COOKIE['IDJogo'];

//Verificar quantas letras a pessoa falhou para calcular os pontos//
$Verificar_Falhanco = $CONFIG->prepare("SELECT * FROM logs_jogo WHERE ID_Jogo = ? AND Estado = 'Errado'");
$Verificar_Falhanco->execute(array($ID_Jogo));

while($row = $Verificar_Falhanco->fetch()){

    echo $Count++;

}

switch ($Count){

    case 0:
        $Pontuacao = 6;
        break;
    case 1:
        $Pontuacao = 5;
        break;
    case 2:
        $Pontuacao = 4;
        break;
    case 3:
        $Pontuacao = 3;
        break;
    case 4:
        $Pontuacao = 2;
        break;
    case 5:
        $Pontuacao = 1;
        break;
    case 6:
        $Pontuacao = 0;
        break;

}

echo "Pontos: " . $Pontuacao;

//Atualizar a pontuacao do jogo//
$Atualizar_Pontos = $CONFIG->prepare("UPDATE jogo SET Pontuacao = ? WHERE ID = ?");
$Atualizar_Pontos->execute(array($Pontuacao,$ID_Jogo));

//Apagar letras que o utilizador inseriu//
$Apagar_Letras = $CONFIG->prepare("DELETE FROM logs_jogo WHERE ID_Jogo = ?");
$Apagar_Letras->execute(array($ID_Jogo));

//Eliminar os cookies de jogo//
setcookie('Palavra','',time()-3600);
setcookie('IDJogo','',time()-3600);

//Redirecionar para a pagina principal//
Header('Location: index.php');

?>