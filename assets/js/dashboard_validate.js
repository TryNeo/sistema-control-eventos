const regex_string = '^[a-zA-ZáéíóñÁÉÍÓÚÑ ]+$';
const regex_numbers = '^[0-9]+$';
const regex_fechas = new RegExp("([0-9]{4}[-](0[1-9]|1[0-2])[-]([0-2]{1}[0-9]{1}|3[0-1]{1})|([0-2]{1}[0-9]{1}|3[0-1]{1})[-](0[1-9]|1[0-2])[-][0-9]{4})");
const regex_username_password = '^[a-zA-Z0-9_-]{4,18}$';
const regex_email = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
const regex_image = '[^\\s]+(.*?)\\.(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$';
const regex_hora = /^(0?[1-9]|1[0-2]):([0-5]\d)\s?((?:A|P)\.?M\.?)$/i;


function validateUser(value){
    if(value.match(regex_username_password) === null){
        return false;
    }
    return true;
}


function validString(value){
    if (value.match(regex_string) === null){
        return false;
    }
    return true;
}

function validateStringLength(value,MaxStringlength){
    if(value.length >= MaxStringlength){
        return true;
    }
    return false;
}


function validateEmptyField(value){
    if(value === ""){
        return false;
    }
    return true;
}

function validateImage(value){
    if (value.match(regex_image) === null){
        return false;
    }
    return true;
}

function validateFecha(value){
    if (value.match(regex_fechas) === null){
        return false;
    }
    return true;
}

function validateHora(value){
    if (value.match(regex_hora) === null){
        return false;
    }
    return true;
}

function validaNumber(value){
    if (value.match(regex_numbers) === null){
        return false;
    }
    return true;
}


function validaEmail(value){
    if (value.match(regex_email) === null){
        return false;
    }
    return true;
}
