<?php
    include "acao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contato</title>
   
</head>
<body>
    <div class="content">
        <h1> Contato </h1>
        <form method="post" enctype="multipart/form-data" name="myForm">
            <div>
                <label class="col-sm-2 col-form-label" >Id:</label>
                <input readonly class="form-control-plaintext" type="text" id="id" name="id"  value= >
            </div>
            <div>
                <p>Nome:</p>
                <input type="text" placeholder="Digite seu nome" id=" nome" name="nome" class="inputs required" value=<?=isset($_GET['nome'])?$_GET['nome']:''?>>
                <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
            </div>
            <div>
                <p>Email:</p>
                <input type="email" placeholder="Digite seu email" id="email" class="inputs required" name="email"  value=<?=isset($_GET['email'])?$_GET['email']:''?>>
                <span class="span-required">Digite um email válido</span>
            </div>
            <div>
                <p>Data de Nascimento:</p>
                <input type="date" id="nascimento" name="nascimento" class="form-control" value=<?=isset($_GET['data'])?$_GET['data']:''?> >
                <span class="span-required"> Digite uma data válida </span>
            </div>
            <div>
                <p>Idade:</p>
                <input type="number" placeholder="Digite sua idade" id="idade" name="idade" class="inputs required"  value=<?=isset($_GET['idade'])?$_GET['idade']:''?>>
                <span class="span-required">Idade deve ter no mínimo 1 caracteres</span>
            </div>
            <div>
                <p>Origem de contato: </p>
                    <select class="inputs required"  placeholder="Digite a origem" name="origem" id="origem">
                        <option value="0"> Selecione </option>
                        <option value="1" <?php if(isset($_GET['origem']) and $_GET['origem']=='1') echo 'selected'; ?>>Escola</option>
                        <option value="2" <?php if(isset($_GET['origem']) and $_GET['origem']=='2') echo 'selected'; ?>>Trabalho</option>
                        <option value="3" <?php if(isset($_GET['origem']) and $_GET['origem']=='3') echo 'selected'; ?>>Outro</option>
                    </select>
            </div>
            <div>
                <p>Cidade:</p>
                    <select class="inputs required"  placeholder="Digite sua cidade"  name="cidade" id="cidade" >
                        <option value="0">Selecione</option>
                        <option value="1" <?php if(isset($_GET['cidade']) and $_GET['cidade']=='1') echo 'selected'; ?>>Joinville</option>
                        <option value="2" <?php if(isset($_GET['cidade']) and $_GET['cidade']=='2') echo 'selected'; ?>>Florianópolis</option>
                        <option value="3" <?php if(isset($_GET['cidade']) and $_GET['cidade']=='3') echo 'selected'; ?>>Itajaí</option>
                        <option value="4" <?php if(isset($_GET['cidade']) and $_GET['cidade']=='4') echo 'selected'; ?>>Blumenau</option>
                        <option value="5" <?php if(isset($_GET['cidade']) and $_GET['cidade']=='5')echo 'selected'; ?>>Rio do Sul</option>
                    </select>
            </div>          
            <p>Sexo:</p>
            <div class="box-select">
                    <div>
                        <input type="radio" id="m" value="2" name="sexo" <?php if(isset($_GET['sexo']) and $_GET['sexo']=='2') echo 'checked'; ?>>
                        <label for="m">Masculino</label>
                    </div>
                    <div>
                        <input type="radio" id="f"  name="sexo" value="1" <?php if(isset($_GET['sexo']) and $_GET['sexo']=='1') echo 'checked'; ?>>
                        <label for="f">Feminino</label>
                    </div>
            </div>
            <fieldset>
                <div class="box-select">
                    <div>
                        <label for="imagem" class="form-label">Imagem de Perfil</label>
                        <input class="form-control" name="img" type="file" id="formFile">
                    </div>
                </div>
            </fieldset>
 
            <input type="submit" value="Salvar" name="acao">
            <input type="reset" value="Limpar">
 
        </form>
    </div>
</body>
</html>

