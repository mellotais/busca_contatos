<?php 

include_once("acao.php");

$busca = isset($_POST['busca'])?$_POST['busca']:'';

if ($busca != " "){
    $contatos = get_dados();
    $cont = [];

    foreach($contatos as $contato){

        if(($contato["Nome"]) == $busca){
            $cont[] = $contato;
        }
        
    }
    echo json_encode($cont); 
}

?>