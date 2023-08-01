async function carregar_dados(valor) {
    if (valor.length >= 1) {
        var dados = await fetch('pesquisar_dados.php?nome=' + valor);
        var resposta = await dados.json();
        console.log(resposta);

        var resultado = "<ul class='list-group' id='list-color-result'>";

        if (resposta['status']) {
            for (i = 0; i < resposta['dados'].length; i++) {
                resultado += "<li class='list-group-item-action decoracao'>" + "<a href='Second_page.php?id_tag="+ resposta['dados'][i].id +"'>" + "<div class='conteudo_da_pesquisa'>" + "<i id='icon-list' class='fa-regular fa-file' style='color: #ffffff;'></i>" + resposta['dados'][i].id+ "</div>"  + "</a>" + "</li>";
            }
        } else {
            resultado = "<ul class='list-group' id='list-color-result'><div class='conteudo_da_pesquisa'><li class='list-group-item decoracao'>Código não encontrado.<a href='Sugestao.html'>Solicitar código</a></li></div></ul>";
        }
        resultado += "</ul>";
        document.getElementById("resutado_da_pesquisa").innerHTML = resultado;
    } else {
        document.getElementById("resutado_da_pesquisa").innerHTML = "";
    }
}