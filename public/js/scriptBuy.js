const inputs = document.getElementsByClassName('form-control');

function verifyValid() {
    let inputsValid = document.getElementsByClassName('is-valid');

    if (inputsValid.length >= inputs.length) {
        document.getElementById('btn-buy').disabled = false;
    } else {
        document.getElementById('btn-buy').disabled = true;
    }
}

function verifyInputs(x) {

    // INPUT NAME AND PHONE
    if (x == 0 || x == 2) {
        if (inputs[x].value.length > 7) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value.length == 0) {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT CPF
    if (x == 1) {
        if (inputs[x].value.length >= 11) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value.length == 0) {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT EMAIL
    if (x == 3) {

        let teste = /\S+@\S+\.\S+/
        let result = teste.test(inputs[x].value)

        if (result) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT UF
    if (x == 4) {
        if (inputs[x].value) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT City
    if (x == 5) {
        if (inputs[x].value) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT ADDRESS
    if (x == 6) {
        if (inputs[x].value.length >= 8) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT HOME NUMBER
    if (x == 7) {
        if (inputs[x].value.length > 0) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT CARD NUMBER
    if (x == 8) {
        if (inputs[x].value.length >= 16) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT CVV
    if (x == 9) {
        if (inputs[x].value.length == 3) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT DUE DATE
    if (x == 10) {
        if (!(inputs[x].value.length == "")) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    //INPUT QUANTITY
    if (x == 11) {
        if (inputs[x].value.length > 0) {
            inputs[x].setAttribute("class", "form-control is-valid");
        } else if (inputs[x].value == "") {
            inputs[x].setAttribute("class", "form-control");
        } else {
            inputs[x].setAttribute("class", "form-control is-invalid");
        }
    }

    verifyValid();
}
