$(function(){

    const columnData = [
        {"data":"id_rol"},
        {"data":"nombre_rol"},
        {"data":"descripcion"},
        {"data":"estado"},
        {"data":"opciones"}]

    let tableRoles =  configDataTables('.tableRol',base_url+"roles/getRoles",columnData)
    


    clickModal();
    
    const fieldsToValidate = ['nombre_rol','descripcion']
    const configValid = configToValidate()

    sendingDataServerSide('#fntRol',configValid,fieldsToValidate);
});




function configToValidate(){

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
    });
    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name=nombre_rol]')){
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


function sendingDataServerSide(idForm,validatorServerSide,fieldsToValidate){
    $(idForm).on('submit',function (e) {
        e.preventDefault();
        if(validatorServerSide.checkAll('.needs-validation') === 0){
            let formData = $(this).serializeArray();
            $.ajax({
                url: base_url+'roles/setRol',
                type: $(idForm).attr("method"),
                data: formData,
                dataType: 'json'
            }).done(function (data) {
                if(data.status){
                    mensaje('success','Exitoso',data.msg);
                    
                }else{
                    mensaje("error","Error",data.msg);
                }
            }).fail(function (error) {
                mensaje("error","Error",'Hubo problemas con el servidor, intentelo nuevamente')
            })
        }else{
            console.log("error")
        }
    })
}


function clickModal(){
    $('#openModal').on('click',function (e) {
        abrir_modal(["#id_rol","#nombre_rol","#descripcion"]);
    })
}