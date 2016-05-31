<?php

//Incluir ligação ao servidor//
include('utils/config.php');

//Verificar se o utilizador pretende definir a palavra a modificar ou se pretende modificar apenas//
if(isset($_POST['select_palavra'])){

    //Caso a palavra esteja definida retoramos o seu valor para o endereco//
    $Palavra = $_POST['select_palavra'];

    //Ler a dica da palavra mencionada//
    $Ler_Dica = $CONFIG->prepare("SELECT ID , Dica FROM palavras WHERE Palavra = ?");
    $Ler_Dica->execute(array($Palavra));

    while($row = $Ler_Dica->fetch()){

        $Dica = $row['Dica'];
        $ID = $row['ID'];

    }

    Header("Location: index.php?palavra=$Palavra&dica=$Dica&id=$ID");

}
else{

    //Ler os dados do formulário//
    $ID = $_POST['id'];
    $Palavra = $_POST['palavra'];
    $Dica = $_POST['dica'];

    echo $ID;
    echo $Palavra;
    echo $Dica;

    //Se a palavra não estiver definida modificamos//
    //$Modificar_Palavra = $CONFIG->prepare("UPDATE palavras SET Palavra = ? , Dica = ? WHERE Palavra = ?");
    $ModificarPalavra = $CONFIG->prepare('UPDATE palavras SET Palavra = ? , Dica = ? WHERE ID = ?');
    $ModificarPalavra->execute(array($Palavra,$Dica,$ID));

    //Redirecionar para a pagina principal//
    Header('Location: index.php');

}

?>