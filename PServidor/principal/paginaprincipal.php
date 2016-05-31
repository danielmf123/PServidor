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
                <a class="pull-left logo" href="index.php">
                    <h1><img class="img-responsive" src="utils/forca.png" alt="logo"></h1>
                </a>
            </div>
            <div class="menu pull-right">
                <a href = "editarperfil.php"> <i class="fa fa-align-justify"></i> <?php echo $_SESSION['LogadoEm']; ?> </a>
                <a href = "logout.php"> <i class="fa fa-align-justify"></i> Sair </a>
                <?php

                //Verificar se o tipo de conta é de administrador//
                if($Tipo == "Administrador"){

                    echo '
                    
                    <a href = "../backoffice/"> <i class="fa fa-align-justify">BackOffice</i></a>
                    
                    ';

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

                            <div class="text-center">
                                <a href = "jogo.php"><h2 class="page-header">Jogar Agora! <img src = "images/play.png"></img></h2></a>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box">
                                        <h3>Top 10</h3>
                                        <p>

                                            <?php

                                            include('utils/jogo.php');

                                            $Jogo = new Jogo();

                                            $Pontos = $Jogo->top10();

                                            ?>

                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div><!--/#about-page-->

        </div><!--/.carousel-inner-->
    </div>
</section>


<?php

require_once("utils/footer.html");

?>

</body>
</html>