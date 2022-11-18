const fotos = document.getElementsByClassName('small-imgs');
const img = document.getElementById('product_full_img');
const button = document.getElementById('button_leaveCart');

function mudaBotao(x) {
    if ( x == 1 ) {
        button.setAttribute("class", "button-cart-red");
        button.innerHTML = "<ion-icon name='cart-outline'></ion-icon><ion-icon name='remove-circle-outline'></ion-icon> Remover do carrinho";
    } else {
        button.setAttribute("class", "btn-cart-disabled");
        button.innerHTML = "<ion-icon name='cart-outline'></ion-icon><ion-icon name='checkmark-outline'></ion-icon> Adicionado ao carrinho";
    }
}

function trocaFoto(foto) {
    img.src = fotos[foto].src;
}
