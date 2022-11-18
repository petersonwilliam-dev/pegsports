const carrossel = document.getElementById("carrossel");
var idx = 0;
var time;
const itens = [
    {
        src: "/img/bicicleta.webp",
        name: "Mobilidade"
    },
    {
        src: "/img/calcao.webp",
        name: "Calções"
    },
    {
        src: "/img/camisa.webp",
        name: "Camisas de times"
    },
    {
        src: "/img/moletom.webp",
        name: "Moletons"
    },
    {
        src: "/img/relogio.jpg",
        name: "Acessórios"
    },
    {
        src: "/img/chuteira.webp",
        name: "Chuteiras"
    },
    {
        src: "/img/fone.png",
        name: "Eletrônicos"
    },
    {
        src: "/img/suplemento.png",
        name: "Suplementos"
    },
]

const imgs = document.getElementsByClassName('img_item');
const namesItens = document.getElementsByClassName('name_item');
const barraProdutos = document.getElementById("car");
var idx = 0;

for (let i = 0; i < itens.length; i++) {
    imgs[i].src = itens[i].src;
    imgs[i].alt = itens[i].name;
    namesItens[i].innerHTML = itens[i].name;
}

function moveCarrosel() {
    idx++;
    let ScreenWidth = window.innerWidth*-1;

    if (idx > 1) {
        idx = 0;
        carrossel.style.transform = `translateX(${0}px)`;
    } else if (idx == 1) {
        carrossel.style.transform = 'translateX('+ScreenWidth+'px)';
    }
}

time = setInterval(moveCarrosel, 10000);
