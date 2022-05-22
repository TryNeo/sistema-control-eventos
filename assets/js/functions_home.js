$(function(){

    const fieldsToValidate = ['name','email','subject','message']

    let validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: base_url_assets+"js/jbvalidatorLangEs.json",
    });

    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name=email]')){
            let value= $(el).val()
            
            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }

            if (!validaEmail(value)){
                return 'El email '+value +' ingresado es incorrecto';
            }
        }

        if($(el).is('[name=name]')){
            let value= $(el).val()
            
            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }

            if (!validateStringLength(value,4)){
                return 'El nombre '+value +' es muy corto';
            }
        }


        if($(el).is('[name=subject]')){
            let value= $(el).val()
            
            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }

            if (!validateStringLength(value,10)){
                return 'El asunto '+value +' es muy corto';
            }
        }

        if($(el).is('[name=message]')){
            let value= $(el).val()
            
            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }

            if (!validateStringLength(value,15)){
                return 'El mensaje '+value +' es muy corto';
            }
        }

        if($(el).is('[name=g-recaptcha-response]')){
            let value= $(el).val()
            
            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }
        }

    }

    sendingDataServerSideEmail('#fntSendEmail',validatorServerSide,fieldsToValidate);

    //Animación de números
    $('ul li span').each(function () {
        const This = $(this);
        $({Count: This.text()}).animate(
            {Count:  This.parent().attr("data-count")},
            {
                duration: 2000,
                easing: "linear",
                step: function(){
                    This.text(Math.floor(this.Count))
                },
                complete: function(){
                    This.text(this.Count).css({color:"black"})
                }
            }
        )
    })

});


function sendingDataServerSideEmail(idForm,validatorServerSide,fieldsToValidate){
    let url = $(idForm).attr("action");
    $(idForm).on('submit',function (e) {
        e.preventDefault();
        if(validatorServerSide.checkAll('.needs-validation') === 0){
            let formData = $(this).serializeArray();
            $('#fntSendEmail').LoadingOverlay("show");
            $.ajax({
                url: url,
                type: $(idForm).attr("method"),
                data: formData,
                dataType: 'json'
            }).done(function (data) {
                if(data.status){
                    setTimeout(function(){
                        $('#fntSendEmail').LoadingOverlay("hide",true);;
                        document.getElementById("fntSendEmail").reset();
                        mensaje('success','Exitoso',data.msg);
                    }, 1000);
                }else{
                    if (!jQuery.isEmptyObject(data.formErrors)){
                        console.log(data.formErrors)
                        fieldsToValidate.forEach((value,index) => {
                            if (data.formErrors.hasOwnProperty(fieldsToValidate[index])){
                                validatorServerSide.errorTrigger($('[name='+fieldsToValidate[index]+']'), data.formErrors[''+fieldsToValidate[index]+'']);
                            }
                        });
                    }else{
                        $('#fntSendEmail').LoadingOverlay("hide",true);;
                        mensaje("error","Error",data.msg);
                    }
    
                }
            }).fail(function (error) {
                mensaje("error","Error",'Hubo problemas con el servidor, intentelo nuevamente')
            })
        }else{
            console.log("error")
        }
    })
}
