<?php

define('HOMEPATH', 'C:/Users/' . getenv("USERNAME"). '/Documents/data/');

$file = glob(HOMEPATH . "in/*.dat");

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