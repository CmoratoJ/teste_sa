function onLoadPage() {
    if (document.getElementById("validateScript").value) {
        validateForm();
    }
}

function validateForm() {

    const date = document.getElementById("date").value;
    const text = document.getElementById("text").value;
    const textArea = document.getElementById("textarea").value;

    if (!validateDate(date)) {
        alert("Digite uma data valida (mm-dd-YYYY)")
        return false
    }
    if (!validateText(text)) {
        alert("O texto deve possuir apenas letras minúsculas e espaços, com até 144 caracteres.")
        return false
    }
    if (!validateTextArea(textArea)) {
        alert("O texto grande deve possuir apenas letras maiúsculas, números e espaços, com até 255 caracteres.")
        return false
    }

    return true

}

function validateDate(date) {
    if (!date) return false

    const month = date.substr(0, 2);
    const day = date.substr(3, 2);
    const year = date.substr(6, 9);
    const dateComp = month + "-" + day + "-" + year;

    return date === dateComp;
}

function validateText(text) {
    let ret = false;

    ret = text !== null

    if (ret === false) return ret

    let i = text.length <= 144 ? text.length : 0;

    if (i === 0) return ret = false

    let character = "";

    while (i--) {
        character = text.charAt(i)
        ret = character.charCodeAt() >= 97 && character.charCodeAt() <= 122 || character.charCodeAt() === 32

        if (ret === false) return ret
    }

    return ret
}

function validateTextArea(textArea) {
    let ret = false;

    ret = textArea !== null

    if (ret === false) return ret

    let i = textArea.length <= 255 ? textArea.length : 0;

    if (i === 0) return ret = false

    let character = "";

    while (i--) {
        character = textArea.charAt(i)
        ret = character.charCodeAt() >= 48 && character.charCodeAt() <= 57 || character.charCodeAt() >= 65 && character.charCodeAt() <= 90 ||
            character.charCodeAt() === 32

        if (ret === false) return ret
    }

    return ret
}

function maskDate(chars) {

    const v = chars.value;
    if (v.match(/^\d{2}$/) !== null) {
        chars.value = v + '-';
    } else if (v.match(/^\d{2}\-\d{2}$/) !== null) {
        chars.value = v + '-';
    }

}