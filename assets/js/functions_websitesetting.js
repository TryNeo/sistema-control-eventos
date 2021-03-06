
$(function(){
    

    const fieldsToValidate = ['website_image','website_favicon'];
    const configValid = configToValidate()

    get_website_setting();
    get_contact_setting();
    sendingDataServerSideWebsite('#fntWebsitesetting',configValid,fieldsToValidate,'websitesetting/setWebsite','.needs-validation',get_website_setting());
    sendingDataServerSideWebsite('#fntContactsetting',configValid,fieldsToValidate,'websitesetting/setContact','.needs-validations',get_contact_setting());

});



function get_website_setting(){
    $.ajax({
        type: 'GET',
        url: base_url+"websitesetting/getWebsite",
    }).then(function (data) {
        let objdata = JSON.parse(data);
        $('#id_website_setting').val(objdata.id_website_setting ? objdata.id_website_setting : "");
        $('#website_title').val(objdata.website_title ? objdata.website_title : "");
        $('#website_about').val(objdata.website_about ? objdata.website_about : "");
        $('#website_image').val(objdata.website_image ? objdata.website_image : "");
        $('#website_favicon').val(objdata.website_favicon ? objdata.website_favicon : "");
        $('#website_clients').val(objdata.website_clients ? objdata.website_clients : "");
        $('#website_expirience').val(objdata.website_expirience ? objdata.website_expirience : "");
        $('#website_proyects').val(objdata.website_proyects ? objdata.website_proyects : "");
    });
}


function get_contact_setting(){
    $.ajax({
        type: 'GET',
        url: base_url+"websitesetting/getContact",
    }).then(function (data) {
        let objdata = JSON.parse(data);
        $('#id_contact_setting').val(objdata.id_contact_setting ? objdata.id_contact_setting : "");
        $('#contact_title').val(objdata.contact_title ? objdata.contact_title : "");
        $('#contact_address').val(objdata.contact_address ? objdata.contact_address : "");
        $('#contact_phone').val(objdata.contact_phone ? objdata.contact_phone : "");
        $('#contact_email').val(objdata.contact_email ? objdata.contact_email : "");
        $('#contact_schedule').val(objdata.contact_schedule ? objdata.contact_schedule : "");
        $('#google_map').val(objdata.google_map ? objdata.google_map : "");
        $('#facebook').val(objdata.facebook ? objdata.facebook : "");
        $('#twitter').val(objdata.twitter ? objdata.twitter : "");
        $('#linkedin').val(objdata.linkedin ? objdata.linkedin : "");
        $('#instagram').val(objdata.instagram ? objdata.instagram : "");
    });
}


function configToValidate() {
    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: base_url_assets+"js/jbvalidatorLangEs.json",
    });
    validatorServerSide.validator.custom = function (el, event) {

        if($(el).is('[name=website_image]')){
            let value= $(el).val()

            if (!validateImage(value)){
                return 'La url '+value+' ingresada no es una imagen';
            }
            
        }

        if($(el).is('[name=website_favicon]')){
            let value= $(el).val()

            if (!validateImage(value)){
                return 'La url '+value+' ingresada no es una imagen';
            }
            
        }


    }

    return validatorServerSide
}



function sendingDataServerSideWebsite(idForm,validatorServerSide,fieldsToValidate,urlMethod,classValidate,refreshData){
    $(idForm).on('submit',function (e) {
        e.preventDefault();
        if(validatorServerSide.checkAll(classValidate) === 0){
            let formData = $(this).serializeArray();
            $.ajax({
                url: base_url+urlMethod,
                type: $(idForm).attr("method"),
                data: formData,
                dataType: 'json'
            }).done(function (data) {
                if(data.status){
                    mensaje('success','Exitoso',data.msg);
                    refreshData();
                }else{
                    if (!jQuery.isEmptyObject(data.formErrors)){
                        fieldsToValidate.forEach((value,index) => {
                            if (data.formErrors.hasOwnProperty(fieldsToValidate[index])){
                                validatorServerSide.errorTrigger($('[name='+fieldsToValidate[index]+']'), data.formErrors[''+fieldsToValidate[index]+'']);
                            }
                        });
                    }else{
                        if(data.msg == "error"){
                        }else{
                            mensaje("error","Error",data.msg);
                        }
                    }
                }
            }).fail(function (error) {
                get_website_setting();
                mensaje("error","Error",'Hubo problemas con el servidor, intentelo nuevamente')
            })
        }
    })
}