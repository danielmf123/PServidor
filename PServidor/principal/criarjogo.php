<?php

//Incluir ligação ao servidor//
include('utils/config.php');

//Incluir classe de jogo//
include('utils/jogo.php');

session_start();

$Jogo = new Jogo();

$ID_Jogador = $Jogo->getIdJogador($_SESSION['LogadoEm']);

$ID_Jogo = $Jogo->configjogo($ID_Jogador);

Header("Location: jogo.php?id=$ID_Jogo");

?>