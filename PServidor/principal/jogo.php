<?php

session_start();

//Incluir ficheiro de configuração//
include("utils/config.php");

include("utils/utilizador.php");

if(!isset($_SESSION['LogadoEm'])){

    Header('Location: index.php');

}

//$clienteSelecionado = new Utilizador($_SESSION['LogadoEm'],"Padrao");
$clienteSelecionado = new Utilizador();

$Tipo = $clienteSelecionado->getTipoContaFROMdb($_SESSION['LogadoEm']);

$clienteSelecionado->_constructor($_SESSION['LogadoEm'],$Tipo);
$Tipo = $clienteSelecionado->getTypeConta();
$Nome = $clienteSelecionado->getNomeConta();


?>
<!DOCTYPE html>
<html lang="pt">

<?php

require_once ("utils/header.html");

?>

<body>

<!--.preloader-->

<!--/.preloader-->

<header id="header">
    <div class="container">
        <div class="container-inner">
            <div class="logo pull-left">
                <a class="pull-left logo" href="index.html">
                    <h1><img class="img-responsive" src="../../utils/forca.png" alt="logo"></h1>
                </a>
            </div>
            <div class="menu pull-right">
                <a href = "#login" data-toggle="modal" data-target="#login"> <i class="fa fa-align-justify"></i> <?php echo $_SESSION['LogadoEm']; ?> </a>
                <a href = "logout.php"> <i class="fa fa-align-justify"></i> Sair </a>


                <?php

                if(isset($_GET['id'])){

                    echo '<a href = "finalizarjogo.php"> <i class="fa fa-align-justify"></i> Finalizar Jogo </a>';

                }
                else{

                    echo '<a href = "criarjogo.php"> <i class="fa fa-align-justify"></i> Criar Jogo </a>';

                }
                ?>

            </div>
        </div>
    </div>
</header> <!--/#header-->



<section id="welcome-page">

    <div id="page-slider" class="carousel slide" data-interval="false">

        <ol class="carousel-indicators visible-xs">
            <li data-target="#page-slider" data-slide-to="1" class="active"></li>
        </ol>

        <div class="carousel-inner">

            <div id="about-page" class="item active">
                <div class="container">

                    <div class="vertical-middle">
                        <div class="vertical-middle-inner">


                            <div class="row">
                                <div class="col-sm-12">
                                    <?php

                                    //Incluir classe de jogo//
                                    include('utils/jogo.php');

                                    //ler o ID do jogo definido no ID para ler as informações//

                                    //Verificar se o jogo foi criado//
                                    if(isset($_GET['id'])){



                                    $ID_Jogo = $_GET['id'];

                                    //Através do ID de jogo vamos ler a palavra e a sugestão escolhida//
                                    $Ler_Palavra = $CONFIG->prepare("SELECT palavras.Palavra,palavras.Dica  FROM palavras INNER JOIN jogo ON Palavra_ID = palavras.ID WHERE jogo.ID = ?");
                                    $Ler_Palavra->execute(array($ID_Jogo));

                                    while($row = $Ler_Palavra->fetch()){

                                        $Palavra = $row['Palavra'];
                                        $Dica = $row['Dica'];

                                        //Definir um cookie com o valor da palavra//
                                        setcookie('Palavra',$Palavra,time() + 3600);

                                    }





                                    echo "
                                    <h3 id = 'headerdica'>Dica</h3>
                                    <label id ='dica' name = 'dica'>$Dica</label>
                                    <button type = 'button' id = 'btnmostrar' onclick = 'Mostrar()' hidden>Mostrar</button> 
                                    <button type = 'button' id = 'btnocultar' onclick = 'Ocultar()' >Ocultar</button> 
                                    ";

                                        $Jogo = new Jogo();

                                        $Tentativas = $Jogo->getTentantivas($ID_Jogo);

                                        $Calcular_Tentativas = 6 - $Tentativas;

                                        echo "<label>Ainda tem $Calcular_Tentativas de 6 tentativas</label><br>";

                                        $Letras_Adivinhadas = $Jogo->getPalavrasCertas($ID_Jogo);

                                        switch ($Calcular_Tentativas){

                                            case 1:
                                                echo "<img src = 'utils/img_jogo/6fail.png'>";
                                                break;
                                            case 2:
                                                echo "<img src = 'utils/img_jogo/5fail.png'>";
                                                break;
                                            case 3:
                                                echo "<img src = 'utils/img_jogo/4fail.png''>";
                                                break;
                                            case 4:
                                                echo "<img src = 'utils/img_jogo/3fail.png'>";
                                                break;
                                            case 5:
                                                echo "<img src = 'utils/img_jogo/2fail.png''>";
                                                break;
                                            case 6:
                                                echo "<img src = 'utils/img_jogo/1fail.png'>";
                                                break;

                                        }


                                        //Verificar se as 6 tentantivas foram excedidas para mostrar a palavra//
                                        if($Calcular_Tentativas == 0){
                                            echo "<br>";
                                            $Jogo->getPalavra($ID_Jogo);
                                            Header('Location: finalizarjogo.php');

                                        }


                                    }
                                    else{


                                        echo "Jogo não criado";

                                    }

                                    ?>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <button type = "button" value = "Q" ><a href = "workerjogo.php?key=Q">Q</a></button>
                                    <button type = "button" value = "W" ><a href = "workerjogo.php?key=W">W</a></button>
                                    <button type = "button" value = "E"><a href = "workerjogo.php?key=E">E</a></button>
                                    <button type = "button" value = "R"><a href = "workerjogo.php?key=R">R</a></button>
                                    <button type = "button" value = "T"><a href = "workerjogo.php?key=T">T</a></button>
                                    <button type = "button" value = "Y"><a href = "workerjogo.php?key=Y">Y</a></button>
                                    <button type = "button" value = "U"><a href = "workerjogo.php?key=U">U</a></button>
                                    <button type = "button" value = "I"><a href = "workerjogo.php?key=I">I</a></button>
                                    <button type = "button" value = "O"><a href = "workerjogo.php?key=O">O</a></button>
                                    <button type = "button" value = "P"><a href = "workerjogo.php?key=P">P</a></button>
                                    <br>
                                    <button type = "button" value = "A"><a href = "workerjogo.php?key=A">A</a></button>
                                    <button type = "button" value = "S"><a href = "workerjogo.php?key=S">S</a></button>
                                    <button type = "button" value = "D"><a href = "workerjogo.php?key=D">D</a></button>
                                    <button type = "button" value = "F"><a href = "workerjogo.php?key=F">F</a></button>
                                    <button type = "button" value = "G"><a href = "workerjogo.php?key=G">G</a></button>
                                    <button type = "button" value = "H"><a href = "workerjogo.php?key=H">H</a></button>
                                    <button type = "button" value = "J"><a href = "workerjogo.php?key=J">J</a></button>
                                    <button type = "button" value = "K"><a href = "workerjogo.php?key=K">K</a></button>
                                    <button type = "button" value = "L"><a href = "workerjogo.php?key=L">L</a></button>
                                    <button type = "button" value = "Ç"><a href = "workerjogo.php?key=Ç">Ç</a></button>
                                    <br>
                                    <button type = "button" value = "Z"><a href = "workerjogo.php?key=Z">Z</a></button>
                                    <button type = "button" value = "X"><a href = "workerjogo.php?key=X">X</a></button>
                                    <button type = "button" value = "C"><a href = "workerjogo.php?key=C">C</a></button>
                                    <button type = "button" value = "V"><a href = "workerjogo.php?key=V">V</a></button>
                                    <button type = "button" value = "B"><a href = "workerjogo.php?key=B">B</a></button>
                                    <button type = "button" value = "N"><a href = "workerjogo.php?key=N">N</a></button>
                                    <button type = "button" value = "M"><a href = "workerjogo.php?key=M">M</a></button>

                                </div>

                                <?php



                                ?>

                            </div>


                    </div>

                </div>
            </div><!--/#about-page-->

        </div><!--/.carousel-inner-->
    </div>
</section>

<script type = "text/javascript">

function Mostrar(){

    document.getElementById('dica').style.display = "inline";
    document.getElementById('headerdica').style.display = "inline";
    document.getElementById('btnocultar').style.display = "inline";
    document.getElementById('btnmostrar').style.display = "none";

}

function Ocultar(){


    document.getElementById('dica').style.display = "none";
    document.getElementById('headerdica').style.display = "none";
    document.getElementById('btnocultar').style.display = "none";
    document.getElementById('btnmostrar').style.display = "inline";


}


</script>

<?php

require_once("utils/footer.html");

?>

</body>
</html>