<?php 

session_start();

//Incluir ficheiro de configuração//
include("utils/config.php");


if(isset($_SESSION['LogadoEm'])){

    Header('Location: paginaprincipal.php');

}


?>
<!DOCTYPE html>
<html lang="pt">

<?php

require_once ("utils/header.html");

?>

<body>

<!--.preloader-->
<div class="preloader"><i class="fa fa-circle-o-notch fa-spin"></i></div>
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
                <a href = "#login" data-toggle="modal" data-target="#login"> <i class="fa fa-align-justify"></i> Login </a>

            </div>
        </div>
    </div>
</header> <!--/#header-->


<div id="registar" class="item">
    <div class="container">

        <div class="vertical-middle">
            <div class="vertical-middle-inner">

                <div class="text-center">
                    <h2 class="page-header">Preencha os dados!</h2>
                </div>

                <form class="form-horizontal" id="contact-form" role="form" action = "registarutilizador.php" method = "POST">
                    <div class="form-group form-status">
                        <div class="col-sm-offset-2 col-sm-6">
                            <div class="form-status-content">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="text" name="nome" class="form-control input-lg" placeholder="Nome" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="email" name="email" class="form-control input-lg" placeholder="Email" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="text" name="utilizador" class="form-control input-lg" placeholder="Utilizador" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="password" name="password" class="form-control input-lg" placeholder="Password" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="date" name="data_nasc" class="form-control input-lg" placeholder="Data de Nascimento" required="required">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn btn-lg btn-transparent">Registar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div><!--/#contact-page-->

<!-- Modal -->
<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="contact-form" role="form" action = "validarlogin.php" method = "POST">

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="text" name="utilizador" class = "form-control" placeholder="Utilizador" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="password" name="password" class = "form-control" placeholder="Password" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn btn-lg btn-transparent">Login</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php

require_once("utils/footer.html");

?>

</body>
</html>