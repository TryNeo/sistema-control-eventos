$(function(){
    const columnData = [
        {"data":"id_categoria"},
        {"data":"nombre_categoria"},
        {"data":"descripcion"},
        {"data":"icono"},
        {"data":"estado"},
        {"data":"opciones"}]

    const columnDefs = [
        {
            targets:[3],
            orderable:false,
            render:function(data,type,row){
                return '<i class="'+row.icono+'"></i>'
            }
        }
    ]
    const tableCategoria =  configDataTables('.tableCategoria',base_url+"categorias/getCategorias",columnData,columnDefs)

    const listCamps =  ["#id_categoria","#nombre_categoria","#descripcion","#icono"];
    
    
    const fieldsToValidate = ['nombre_categoria','descripcion',"icono"]
    const configValid = configToValidate()

    clickModal("#modalCategoria","Crear | Categoria",listCamps);
    sendingDataServerSide('#fntCategoria',configValid,fieldsToValidate,listCamps,tableCategoria,"categorias/setCategoria","#modalCategoria");
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
        
        if($(el).is('[name=icono]')){
            let value= $(el).val()
            if (!validateStringLength(value,5)){
                return 'El nombre del icono '+value+' debe ser mas largo';
            }
            
        }

    }

    return validatorServerSide
}


