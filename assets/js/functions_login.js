$(function(){
    const fieldsToValidate = ['username','password']

    let validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
    });
    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name=username]')){
            let value= $(el).val()
            if (!validateUser(value)){
                return 'El usuario ingresado no es valido';
            }
            
        }

        if($(el).is('[name=password]')){
            let value= $(el).val()

            if (!validateUser(value)){
                return 'La contraseña ingresada no es valido';
            }
            
        }
    }

    sendingDataServerSideLogin('#fntLogin',validatorServerSide,fieldsToValidate);
});


function sendingDataServerSideLogin(idForm,validatorServerSide,fieldsToValidate){
    let url = $(idForm).attr("action");
    $(idForm).on('submit',function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $.ajax({
            url: url,
            type: $(idForm).attr("method"),
            data: formData,
            dataType: 'json'
        }).done(function (data) {
            if(data.status){
                mensaje('success','Exitoso',data.msg);
                
                setTimeout(function(){
                    $.LoadingOverlay("show");
                }, 1500);
                
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                    window.location = data.url;
                }, 4000);
            }else{
                if (!jQuery.isEmptyObject(data.formErrors)){
                    console.log(data.formErrors)
                    fieldsToValidate.forEach((value,index) => {
                        if (data.formErrors.hasOwnProperty(fieldsToValidate[index])){
                            validatorServerSide.errorTrigger($('[name='+fieldsToValidate[index]+']'), data.formErrors[''+fieldsToValidate[index]+'']);
                        }
                    });
                }else{
                    mensaje("error","Error",data.msg);
                }

            }
        }).fail(function (error) {
            mensaje("error","Error",'Hubo problemas con el servidor, intentelo nuevamente')
        })
    })
}
