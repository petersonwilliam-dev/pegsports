const containers = document.querySelectorAll("[data-option]");

function amostraConteudo(x) {
    for (let i = 0; i < containers.length; i++) {
        if (i == x) {
            containers[i].style.display = "block";
        } else {
            containers[i].style.display = "none";
        }
    }
}
