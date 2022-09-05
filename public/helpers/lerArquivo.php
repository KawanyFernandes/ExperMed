<?php

define('HOMEPATH', 'C:/Documents/data/');//colocar caminho da sua pasta

$file = glob(HOMEPATH . "in/*.dat");

echo($file);
foreach ($file as $dados){
    
    $teste = "'$dados'";
    $replaced = trim($teste, "'");
    $file_lines = file("$replaced");
    $file_json = json_encode($file_lines);
    unlink($replaced);
}

header('Content-Type: application/json');
echo json_encode($file_lines);
exit;

?>