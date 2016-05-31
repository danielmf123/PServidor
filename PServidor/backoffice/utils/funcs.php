<?php


	function get_palavras(){

		$CONFIG = new PDO("mysql:dbname=pwebs;host=localhost", "Bruno", "abcd12345!");

		$Ler_Palavras = $CONFIG->prepare("SELECT * FROM palavras");
					
		$Ler_Palavras->execute();

		while($row = $Ler_Palavras->fetch()){

			$Palavra = $row['Palavra'];

			echo "<option value='$Palavra'>$Palavra</option>";

		}


	}


function get_totalUtilizadores(){

	$CONFIG = new PDO("mysql:dbname=pwebs;host=localhost", "Bruno", "abcd12345!");

	$Contar_Utilizadores = $CONFIG->prepare("SELECT ID FROM utilizador");
	$Contar_Utilizadores->execute();
	$Count_Utilizadores=0;
	while($row = $Contar_Utilizadores->fetch()){

		$Count_Utilizadores++;

	}

	echo $Count_Utilizadores;

}

function get_AllNomeUtilizador(){

	$CONFIG = new PDO("mysql:dbname=pwebs;host=localhost", "Bruno", "abcd12345!");

	$Ler_Nome = $CONFIG->prepare("SELECT Username FROM utilizador");
	$Ler_Nome->execute();
	while($row = $Ler_Nome->fetch()){

		$Username = $row['Username'];
		echo "<option value = '$Username'>$Username</option>";

	}

}
				


?>