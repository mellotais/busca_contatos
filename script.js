window.onload = (function (){
    document.getElementById('pesquisa').addEventListener('submit',function(ev){
        ev.preventDefault();
        carregaDados(document.getElementById('busca').value);
    })

});

function carregaDados(busca){
    var xhttp = new XMLHttpRequest(); 
    xhttp.onload = function() {
        ourData = JSON.parse(xhttp.responseText);
        montaTabela(ourData);
    }
    xhttp.open("POST", "pesquisa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("busca=" + busca);
}

function montaTabela(ourData){
        el = document.getElementById("lista");
        el.remove();

        var tabela = "<table class='table lista-contatos' id='lista'><thead><tr><th>Id</th><th>Nome</th><th>Email</th><th>Alterar</th><th>Excluir</th></tr></thead>";
        for (let it in ourData) {
            if (ourData[it].Nome == busca.value){
                tabela += "<tr><td>" + ourData[it].id + "</td>";
                tabela += "<td>" + ourData[it].Nome + "</td>";
                tabela += "<td>" + ourData[it].Email + "</td>";
                tabela += "<td><a href='novo/index.php?acao=editar&id="+ourData[it].id+"'>Alt</a></td>";
                tabela += "<td><a href='#' onclick=excluir('index.php?acao=excluir&id="+ourData[it].id+"','"+ourData[it].nome+"')>Exc</a></td></tr>";
            }
            
        }
        tabela += "</table>";
        document.getElementById('listagem').innerHTML = tabela;
}