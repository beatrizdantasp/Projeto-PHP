
function confirmarExclusao(nome) {
    return confirm("Tem certeza que deseja excluir " + nome + "?");
}

function filtrarContatos() {
    var input = document.getElementById("busca");
    var filtro = input.value.toLowerCase();
    var cards = document.getElementsByClassName("contato-card");
    for (var i = 0; i < cards.length; i++) {
        var nome = cards[i].getElementsByClassName("nome")[0].textContent.toLowerCase();
        if (nome.includes(filtro)) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
