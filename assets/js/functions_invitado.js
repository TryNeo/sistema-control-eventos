$(function(){
    const columnData = [
        {"data":"id_invitado"},
        {"data":"url_imagen"},
        {"data":"nombre_invitado"},
        {"data":"apellido_invitado"},
        {"data":"descripcion"},
        {"data":"estado"},
        {"data":"opciones"}]

    const columnDefs = [
        {
            targets:[1],
            orderable:false,
            render:function(data,type,row){
                return '<img src="'+row.url_imagen+'" alt="avatar" width="40" class="mr-3 rounded-circle">'
            }
        }
    ];

    const tableInvitados =  configDataTables('.tableInvitado',base_url+"anfitrion/getInvitados",columnData,columnDefs)

    const listCamps =  ["#id_invitado","#nombre_invitado","#apellido_invitado","#url_imagen","#descripcion",'#facebook','#twitter','#instagram','#linkedin'];
    
    
    const fieldsToValidate = ['nombre_invitado','apellido_invitado','url_imagen','descripcion']
    const configValid = configToValidate()

    clickModal("#modalInvitado","Crear | Invitado",listCamps);

    
    sendingDataServerSide('#fntInvitado',configValid,fieldsToValidate,listCamps,tableInvitados,"anfitrion/setInvitado","#modalInvitado");
})





function configToValidate(){

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: base_url_assets+"js/jbvalidatorLangEs.json",
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

        if($(el).is('[name=apellido_invitado]')){
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


        if($(el).is('[name=url_imagen]')){
            let value= $(el).val()

            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }


            if (!validateImage(value)){
                return 'La url '+value+' ingresada no es una imagen';
            }
            
        }
        
    }

    return validatorServerSide
}


