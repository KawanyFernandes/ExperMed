<?php

define('HOMEPATH', 'C:/Documents/data/');//colocar caminho da sua pasta
$result = $_POST['data'];

$dados = json_decode($result, true);

date_default_timezone_set('America/Sao_Paulo');
$t=time();
$date = date("YmdHis",$t);

$arquivo = fopen(HOMEPATH . 'out/' .$date. '.done.dat','a+');
if ($arquivo == false) die('Não foi possível criar o arquivo.'); 
//escrevemos no arquivo 
fwrite($arquivo, $result); 

//Fechamos o arquivo após escrever nele 
fclose($arquivo);