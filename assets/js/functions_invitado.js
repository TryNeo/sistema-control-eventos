$(function(){
    const columnData = [
        {"data":"id_invitado"},
        {"data":"nombre_invitado"},
        {"data":"apellido_invitado"},
        {"data":"descripcion"},
        {"data":"estado"},
        {"data":"opciones"}]

    const tableInvitados =  configDataTables('.tableInvitado',base_url+"invitados/getInvitados",columnData)

    const listCamps =  ["#id_invitado","#nombre_invitado","#apellido_invitado","#descripcion_invitado"];
    
    
    const fieldsToValidate = ['nombre_invitado','apellido_invitado','descripcion']
    const configValid = configToValidate()

    clickModal("#modalInvitado","Crear | Invitado",listCamps);

    
    sendingDataServerSide('#fntInvitado',configValid,fieldsToValidate,listCamps,tableInvitados,"invitados/setInvitado","#modalInvitado");
})





function configToValidate(){

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
    });
    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name=nombre_invitado]')){
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


