<?php
    include_once "acao.php";
    include "pesquisa.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="pagina.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title> Agenda de Contatos </title>
</head>
<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="#" class="navbar-brand">
                  
                </a>

                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="index.php?menuop=home" class="nav-link active">Home</a></li>
                        <li class="nav-item"><a href="index.php?menuop=contatos" class="nav-link">Contato</a></li>
                        <li class="nav-item"><a href="index.php?menuop=tarefas" class="nav-link">Tarefas</a></li>
                        <li class="nav-item"><a href="index.php?menuop=eventos" class="nav-link">Eventos</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
            <h3><i class="bi bi-person-square"></i> Contatos</h3>
         </div>
    </header>
    <div class="container">
        <a class="btn btn-outline-secondary mb-2" href="contato.php"><i class="bi bi-person-plus-fill"></i> Novo Contato</a>
    </div>
    <main>
<div class="container">
    <section> <!-- pesquisa -->
        <div class='row'>
            <div class='col'>
                <form action="" id='pesquisa'>
                    <div class='row'>
                        <div class='col-6'></div>
                        <div class='col-4'>
                            <input class='form-control' type="search" name='busca' id='busca'>
                        </div>
                        <div class='col-2'>
                            <button class='btn btn-primary' type="submit">Filtrar</button>
                        </div>
                    </div>
                </form>            
            </div>
        </div>
    </section>
</div> 
   <div class="container">
        <table class="table table-dark table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>Id</th><th>Nome</th><th>Email</th><th>Alterar</th><th>Excluir</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
                $dados = get_dados();
                foreach($dados as $contato){
                $alterar = "<a href='contato.php?acao=editar&id=".$contato['id']."&nome=".$contato['Nome']."&email=".$contato['Email']."&idade=".$contato['Idade']."&data=".$contato['Data']."&origem=".$contato['Origem']."&cidade=".$contato['Cidade']."&sexo=".$contato['Sexo']."'>Alt</a>";
                $excluir = "<a href='index.php?acao=excluir&id=".$contato['id']."'>Exc</a>";
                echo "<tr><td>".$contato['id']."</td><td>".$contato['Nome']."</td><td>".$contato['Email']."</td><td>".$alterar."</td><td>".$excluir."</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    </main>
    <footer class="container-fluid bg-dark text-light">
        <div class="text-center">Agenda</div>
    </footer>
    
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<p id="listagem"></p>
                
<script src="script.js"></script>
</body>
</html>