<?php

class Utilizador{


    protected $_nome;
    protected $_conta;
    protected $_config;


    public function _constructor($Nome,$Conta){

        $this->_nome = $Nome;
        $this->_conta = $Conta;


    }

public function getTypeConta(){

    return $this->_conta;

}

    public function getNomeConta(){

        return $this->_nome;

    }

    public function getTipoContaFROMdb($Utilizador){

        $CONFIG = new PDO("mysql:dbname=pwebs;host=localhost","Bruno", "abcd12345!");

        $Obter_Tipo = $CONFIG->prepare("SELECT Tipo FROM utilizador WHERE Username = ?");

        $Obter_Tipo->execute(array($Utilizador));

        while($row = $Obter_Tipo->fetch()){

            return $row['Tipo'];

        }
        

    }




}

