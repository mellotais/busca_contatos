<?php

define('JSON','contatos.json');

$acao = isset($_POST['acao'])?$_POST['acao']:'';

if ($acao =='Salvar'){
    //formata data
    $data = DateTime::createFromFormat('Y-m-d', $_POST['nascimento']);
    $datastatus = FALSE;
    if($data && $data->format('Y-m-d') === $_POST['nascimento']){
    $datastatus = TRUE;
    }
    //validações
    if (empty($_POST["nome"])) {
        echo "Nome inválido";
    }elseif (empty($_POST["email"])) {
        echo "Email inválido";
    }elseif ($_POST["idade"] < 0 or $_POST["idade"] > 120 or ! is_numeric($_POST["idade"])) {
        echo "Idade inválida";
    }elseif ($datastatus == FALSE) {
        echo "Data inválida";
    }elseif ($_POST["origem"]!= "1" and $_POST["origem"]!= "2"and $_POST["origem"]!= "3") {
        echo "Origem inválida";
    }elseif ($_POST["cidade"]!= "1" and $_POST["cidade"]!= "2"and $_POST["cidade"]!= "3" and $_POST["cidade"]!= "4"and $_POST["cidade"]!= "5") {
        echo "Cidade inválida";
    }elseif ($_POST["sexo"]!= "1" and $_POST["sexo"]!= "2") {
        echo "Sexo inválido";
    }else{

        //pega "ação" do link
        $acao = isset($_GET['acao'])?$_GET['acao']:'';

        //identificação 
        if($acao =='editar'){
            $id = isset($_GET['id'])?$_GET['id']:'';
        }else{
            $id = 0;    //id temporario
        }
        
        if ($id == 0){
            $dados = get_dados();
            $id = nextID($dados);   //set de id real
            $organiz = organize($id);
    
            if ($dados){ 
                array_push($dados,$organiz);
            }else{
                $dados[] = $organiz;
            }
    
            file_put_contents(JSON,json_encode($dados));
    
            header('location: contato.php');
        }else{
            //alterar ao invés de adicionar
            $organiz = organize($id);
            alterar($organiz);
            header('location: index.php'); 
        }
        
    }
}else {
    
    $acao = isset($_GET['acao'])?$_GET['acao']:'';
    $id = isset($_GET['id'])?$_GET['id']:'';

    //chama a função
    if ($acao == 'excluir'){
        excluir($id);
    }
}

//exclui
function excluir($id){
    $dados = get_dados();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1);
    file_put_contents(JSON,json_encode($dados));
}

//altera
function alterar($alterado){
    $dados = get_dados();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $alterado['id'])
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1,array($alterado));
    file_put_contents(JSON,json_encode($dados));
}

function get_dados(){
    //pega dados do json
    $contatos[] = "";

    if (file_exists(JSON)){
        $conteudo =file_get_contents(JSON);
        $contatos = json_decode($conteudo, true);
    }

    return $contatos;
}

function organize($id){
    //formata dados do formulario
    $nome =$_POST["nome"];
    $email =$_POST["email"];
    $idade =$_POST["idade"];
    $data =$_POST["nascimento"]; 
    $origem =$_POST["origem"];
    $cidade =$_POST["cidade"];
    $sexo =$_POST["sexo"];
    

    $dados = array("id"=>strval($id), "Nome"=>$nome, "Email"=>$email, "Idade"=>$idade, "Data"=>$data,  "Origem"=>$origem, "Cidade"=>$cidade, "Sexo"=>$sexo);

    return $dados;
}

function nextID($dados){
    //aplica IDs
    $id = 0;
    if ($dados)
        $id = intval($dados[count($dados)-1]['id']);
    return ++$id;
}

?>