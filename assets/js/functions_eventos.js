$(function(){

    const columnData = [
        {"data":"id_evento"},
        {"data":"nombre_evento"},
        {"data":"cupo"},
        {"data":"fecha_inicio_hora_inicio"},
        {"data":"fecha_fin_hora_fin"},
        {"data":"nombre_categoria"},
        {"data":"nombre_invitado"},
        {"data":"clave_evento"},
        {"data":"estado"},
        {"data":"opciones"},
    ]


    const tableInvitados =  configDataTables('.tableEvento',base_url+"eventos/getEventos",columnData)

    const listCamps =  ['#id_evento',"#nombre_evento","#cupo","#color_evento","#id_categoria","#id_invitado",
                            "#fecha_evento_inicio","#hora_evento_inicio","#fecha_evento_fin","#hora_evento_fin"];
    const fieldsToValidate = ['id_evento',"nombre_evento","cupo","color_evento","id_categoria","id_invitado",
                                "fecha_evento_inicio","hora_evento_inicio","fecha_evento_fin","hora_evento_fin"];
    
    const configValid = configToValidate()

    clickModal("#modalEvento","Crear | Evento",listCamps);
    fetchSelect(base_url+"categorias/getSelectCategorias","#id_categoria","Selecciona una categoria")
    fetchSelect(base_url+"anfitrion/getSelectInvitados","#id_invitado","Selecciona un invitado")
    
    sendingDataServerSide('#fntEvento',configValid,fieldsToValidate,listCamps,tableInvitados,"eventos/setEvento","#modalEvento");

})

function configToValidate(){

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: base_url_assets+"js/jbvalidatorLangEs.json",
    });
    validatorServerSide.validator.custom = function(el, event){

        if (el.name != "id_evento"){
            if($(el).is('[name='+el.name+']')){
                let value= $(el).val()
                if (!validateEmptyField(value)){
                    return 'Este campo es obligatorio';
                }
            }
        }
        if($(el).is('[name=nombre_evento]')){
            let value= $(el).val()

            if (!validString(value)){
                return 'El nombre '+value+' contiene numeros o caracteres especiales';
            }
            
        }

        if($(el).is('[name=fecha_evento_inicio]')){
            let value= $(el).val()

            if (!validateFecha(value)){
                return 'La fecha '+value+' no es valida';
            }
            
        }

        
        if($(el).is('[name=hora_evento_inicio]')){
            let value= $(el).val()

            if (!validateHora(value)){
                return 'La Hora '+value+' no es valida';
            }
            
        }


        if($(el).is('[name=fecha_evento_fin]')){
            let value= $(el).val()

            if (!validateFecha(value)){
                return 'La fecha '+value+' no es valida';
            }
            
        }

        if($(el).is('[name=hora_evento_fin]')){
            let value= $(el).val()

            if (!validateHora(value)){
                return 'La Hora '+value+' no es valida';
            }
            
        }
    }

    return validatorServerSide
}


