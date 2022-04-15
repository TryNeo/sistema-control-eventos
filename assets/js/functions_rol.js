$(function(){
    let columnData = [
        {"data":"id_rol"},
        {"data":"nombre_rol"},
        {"data":"descripcion"},
        {"data":"estado"},
        {"data":"opciones"}]

    let tableRoles =  configDataTables('.tableRol',"http://localhost/sistema-control-eventos/roles/getRoles",columnData)
    
    $('#openModal').on('click',function (e) {
        abrir_modal(["#id_rol","#nombre_rol","#descripcion"]);
    })
    
    const fieldsToValidate = ['nombre_rol','descripcion']
    let a = configToValidate(fieldsToValidate)

});




function configToValidate(fieldsToValidate){

    let validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
    });
    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name='+event.target.name+']')){
            let value= $(el).val()
            if (!validString(value)){
                return 'El nombre '+value+' contiene numeros o caracteres especiales';
            }
            
        }
        
        
        if (event.target.name ==="descripcion"){
            if($(el).is('[name='+event.target.name+']')){
                let value= $(el).val()
                if (!validateStringLength(value,40)){
                    return 'La descripcion'+value+' debe ser mas larga';
                }
                
            }
        }
        
    }

}

