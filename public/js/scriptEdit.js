const buttonPromotion = document.getElementById("Promotion");
const inputPromotion = document.getElementById("pricePromotion");

function liberaPromocao() {
    if (buttonPromotion.checked) {
        inputPromotion.disabled = false;
    } else {
        inputPromotion.disabled = true;
        inputPromotion.value = null;
    }
}

