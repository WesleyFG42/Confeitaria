function mostrarConteudo(id) {
    // Oculta todos os conteúdos
    var conteudos = document.querySelectorAll('#conteudo > div');
    for (var i = 0; i < conteudos.length; i++) {
        conteudos[i].classList.add('oculto');
    }
    // Mostra o conteúdo específico
    document.getElementById(id).classList.remove('oculto');
    // Rola para o topo da página
    window.scrollTo(0, 0);
}

function carregarConteudo(url) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Limpa o conteúdo anterior
            document.getElementById('conteudo-carregado').innerHTML = "";
            // Atualiza o conteúdo
            document.getElementById('conteudo-carregado').innerHTML = this.responseText;
            // Mostra o conteúdo carregado
            document.getElementById('conteudo-carregado').classList.remove('oculto');
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}
