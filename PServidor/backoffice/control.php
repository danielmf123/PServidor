<?php

include('utils/config.php');

require 'utils/funcs.php';

$palavras = get_palavras();

require 'gestWords.php';


echo $palavras;

?>