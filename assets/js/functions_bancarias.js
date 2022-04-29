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


        if (el.name != "id_bancaria"){
            if($(el).is('[name='+el.name+']')){
                console.log(el.name)
                let value= $(el).val()
                if (!validateEmptyField(value)){
                    return 'Este campo es obligatorio';
                }
            }
        }


        if($(el).is('[name=nombre_banco]')){
            let value= $(el).val()

            if (!validString(value)){
                return 'El nombre '+value+' contiene numeros o caracteres especiales';
            }
            
        }


        if($(el).is('[name=tipo]')){
            let value= $(el).val()

            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }
            
        }


        if($(el).is('[name=descripcion]')){
            let value= $(el).val()

            if (!validateStringLength(value,5)){
                return 'La descripcion '+value+' debe ser mas larga';
            }

            
            if (!validString(value)){
                return 'La descripcion '+value+' contiene numeros o caracteres especiales';
            }

        }

        if($(el).is('[name=nro_cuenta]')){
            let value= $(el).val()
            
            if (!validaNumber(value)){
                return 'El Nro de cuenta '+value+' es invalido';
            }

        }

        
        if($(el).is('[name=ced_ruc]')){
            let value= $(el).val()
            
            if (!validaNumber(value)){
                return 'El Nro de cuenta '+value+' es invalido';
            }
        }

        if($(el).is('[name=email]')){
            let value= $(el).val()
            
            if (!validaEmail(value)){
                return 'El email '+value+' es invalido';
            }
        }

    }

    return validatorServerSide
}


