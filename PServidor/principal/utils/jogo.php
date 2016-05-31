<?php

class jogo{


    public function getIdJogador($Nome){

        $CONFIG = new PDO("mysql:dbname=pwebs;host=localhost","Bruno", "abcd12345!");

        //ler o id do jogador logado//
        $Ler_IDJogador = $CONFIG->prepare("SELECT ID FROM utilizador WHERE Username = ?");
        $Ler_IDJogador->execute(array($Nome));

        while($row = $Ler_IDJogador->fetch()){

            $ID_Jogador = $row['ID'];

        }

        return $ID_Jogador;

    }


    public function configjogo($IDJogador){

        $CONFIG = new PDO("mysql:dbname=pwebs;host=localhost","Bruno", "abcd12345!");

        //Verificar quantas palavras existem//
        $Verificar_Palavras = $CONFIG->prepare("SELECT ID FROM palavras");
        $Verificar_Palavras->execute();

        $Count=0;

        while($row = $Verificar_Palavras->fetch()){

            $Count++;

        }


        //Gerar um numero aleatório no intervalo de palavras existentes//
        $Num_Palavra = rand(1,$Count);

        //Selecionar uma palavra de forma aleatória//
        $Selecionar_Palavra = $CONFIG->prepare("SELECT Palavra FROM palavras WHERE ID = ?");
        $Selecionar_Palavra->execute(array($Num_Palavra));

        $Obter_Tipo = $CONFIG->prepare("INSERT INTO jogo(Pontuacao,Palavra_ID,Utilizador_ID) VALUES (?,?,?)");

        $Obter_Tipo->execute(array("0",$Num_Palavra,$IDJogador));

        $Ler_Ultimo_ID = $CONFIG->prepare("SELECT ID FROM jogo WHERE Utilizador_ID = ?");
        $Ler_Ultimo_ID->execute(array($IDJogador));

        while($row = $Ler_Ultimo_ID->fetch()){

            $ID_Jogo = $row['ID'];

        }

        //Definir um cookie com o ID do jogo//
        setcookie('IDJogo',$ID_Jogo,time() + 3600);

        return $ID_Jogo;


        }


    public function getTentantivas($ID_Jogo){

        $CONFIG = new PDO("mysql:dbname=pwebs;host=localhost","Bruno", "abcd12345!");

        //Verificar quantas tentativas o utilizador ainda tem//
        $Verificar_Tentativas = $CONFIG->prepare("SELECT * FROM logs_jogo WHERE ID_Jogo = ? AND Estado = ?");
        $Verificar_Tentativas->execute(array($ID_Jogo,"Errado"));

        $Count = 0;

        while($row = $Verificar_Tentativas->fetch()){

            $Count++;

        }

        return $Count;

    }

    public function getPalavrasCertas($ID_Jogo)
    {

        $CONFIG = new PDO("mysql:dbname=pwebs;host=localhost", "Bruno", "abcd12345!");

        //Ler as palavras que o utilizador ja acertou//
        $Ler_Palavras = $CONFIG->prepare("SELECT Letra,Posicao FROM logs_jogo WHERE ID_Jogo = ? AND Estado = ?");
        $Ler_Palavras->execute(array($ID_Jogo, "Certo"));

        while ($row = $Ler_Palavras->fetch()) {

            $Letra = $row['Letra'];
            $Posicao = $row['Posicao'];

            echo $Palavra[$Posicao] = $Letra;

        }

    }

        public function getPalavra($ID_Jogo){

            $CONFIG = new PDO("mysql:dbname=pwebs;host=localhost","Bruno", "abcd12345!");

            //Ler a palavra certa a adivinhar//
            $Ler_Palavra = $CONFIG->prepare("SELECT palavras.Palavra FROM palavras INNER JOIN jogo ON jogo.Palavra_ID = palavras.ID WHERE jogo.ID = ?");
            $Ler_Palavra->execute(array($ID_Jogo));

            while($row = $Ler_Palavra->fetch()){

                echo $Palavra = $row['Palavra'];

            }

        }


    public function top10(){

        $CONFIG = new PDO("mysql:dbname=pwebs;host=localhost","Bruno", "abcd12345!");

        //Calcular a pontuação dos jogadores//

        $Calcular_Pontos = $CONFIG->prepare("SELECT SUM(Pontuacao) pontos , utilizador.Username FROM jogo INNER JOIN utilizador ON jogo.Utilizador_ID = utilizador.ID GROUP BY Utilizador_ID ORDER BY Pontos DESC LIMIT 10");
        $Calcular_Pontos->execute();

        while($row = $Calcular_Pontos->fetch()){

            echo $row['Username'];
            echo " ";
            echo $row['pontos'];
            echo "<br>";

        }

    }


}

?>