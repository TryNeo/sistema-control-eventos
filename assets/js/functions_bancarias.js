$(function(){
    const columnData = [
        {"data":"id_bancaria"},
        {"data":"nombre_banco"},
        {"data":"tipo"},
        {"data":"nro_cuenta"},
        {"data":"ced_ruc"},
        {"data":"email"},
        {"data":"descripcion"},
        {"data":"estado"},
        {"data":"opciones"}]

    const tableBancaria =  configDataTables('.tableBancaria',base_url+"bancarias/getBancarias",columnData)

    const listCamps =  ["#id_bancaria","#nombre_banco","#tipo","#nro_cuenta","#ced_ruc","#email","#descripcion"];
    
    
    const fieldsToValidate = ['id_bancaria','nombre_banco',"tipo", "nro_cuenta", "ced_ruc", "email", "descripcion"]
    const configValid = configToValidate()

    clickModal("#modalBancaria","Crear | Cuentas Bancarias",listCamps);
    sendingDataServerSide('#fntBancaria',configValid,fieldsToValidate,listCamps,tableBancaria,"bancarias/setBancaria","#modalBancaria");
})



function configToValidate(){

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
    });
    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name=nombre_banco]')){
            let value= $(el).val()
            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }

            if (!validString(value)){
                return 'El nombre '+value+' contiene numeros o caracteres especiales';
            }
            
        }

        if($(el).is('[name=descripcion]')){
            let value= $(el).val()

            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }

            if (!validateStringLength(value,20)){
                return 'La descripcion '+value+' debe ser mas larga';
            }
            
            if (!validString(value)){
                return 'La descripcion '+value+' contiene numeros o caracteres especiales';
            }
            
        }

    }

    return validatorServerSide
}


