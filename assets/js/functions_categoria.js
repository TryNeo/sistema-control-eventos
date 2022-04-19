$(function(){
    const columnData = [
        {"data":"id_categoria"},
        {"data":"nombre_categoria"},
        {"data":"descripcion"},
        {"data":"estado"},
        {"data":"opciones"}]

    const tableRoles =  configDataTables('.tableCategoria',base_url+"categorias/getCategorias",columnData)

    const listCamps =  ["#id_categoria","#nombre_categoria","#descripcion"];
    
    
    const fieldsToValidate = ['nombre_categoria','descripcion']
    const configValid = configToValidate()

    clickModal("#modalCategoria","Crear | Categoria",listCamps);
    sendingDataServerSide('#fntCategoria',configValid,fieldsToValidate,listCamps,tableRoles,"categorias/setCategoria","#modalCategoria");
})





function configToValidate(){

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
    });
    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name=nombre_categoria]')){
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


