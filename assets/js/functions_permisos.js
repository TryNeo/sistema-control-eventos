$(function(){
    const columnData = [
        {"data":"id_rol"},
        {"data":"nombre_rol"},
        {"data":"modulos"},
        {"data":"opciones"},

    ]
    
 
    const tablePermisos =  configDataTables('.tablePermisos',base_url+"permisos/getPermisos",columnData)


    const listCamps =  ["#id_permiso","#id_rol"];


    const fieldsToValidate = ['id_rol']
    const configValid = configToValidate()

    clickModalLogin("#modalPermiso","Crear | Permisos",listCamps,true);
    fetchSelect(base_url+"roles/getSelectRoles","#id_rol","Selecciona un rol")
    sendingDataServerSide('#fntPermiso',configValid,fieldsToValidate,listCamps,tablePermisos,"permisos/setPermiso","#modalPermiso");
    fntSearchEmpleado()

})


function formatRepo (repo) {
    if (repo.loading) {
        return repo.text;
    }

    var option = $(
        '<div class="wrapper container">'+
            '<div class="row">'
                +'<div class="col-lg-8">'
                +'<p style="margin-bottom:0;">'
                    +'<b>Nombre: </b>'+repo.text+'<br>'
                    +'<b>Descripcion: </b>'+repo.descripcion
                +'</p>'
                +'</div>'
            +'</div>'
        +'</div>'
    )

    return option;
}

function fntSearchEmpleado(){
    $('#id_modulo').select2({
        theme: "bootstrap-5",
        language:'es',
        allowClear:true,
        ajax: {
            url: base_url+"permisos/getSelectModulos",
            type: "POST",
            dataType: 'json',
            delay:250,
            data: function (params) {
                let queryParameters = {
                    search: params.term
                }
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder:"Buscar ...",
        templateResult: formatRepo,
    }).on('select2:select',function(e){
        e.preventDefault();
        let data = e.params.data;
        let id_modulo = data.id;
        let ajaxUrl = base_url+"permisos/getSelectSearchModulos/"+id_modulo;
        $.ajax({
            type: 'GET',
            url: ajaxUrl
        }).then(function (data) {
            let objdata = JSON.parse(data); 
            if(objdata.status){
                let request_two =  (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                let ajaxUrl_two = base_url+"permisos/setPermisoModulo";
                let formData = new FormData();
                $('#id_modulo').val('')
                $('#id_modulo').trigger('change.select2');
                formData.append("id_modulo",objdata.msg['id_modulo']);
                formData.append("id_rol",document.getElementById("id_rol").value);
                request_two.open("POST",ajaxUrl_two,true);
                request_two.send(formData);
                request_two.onreadystatechange = function(){
                    if(request_two.readyState==4 && request_two.status == 200){
                        let objdatatwo = JSON.parse(request_two.responseText);
                        if(objdatatwo.status){
                            $('.tableModulo').DataTable().ajax.reload()
                        }else{
                            mensaje("error","Error",objdatatwo.msg);
                        }
                    }
                }
            }
        });


    });
}



function configToValidate(){

    const validatorServerSide = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: base_url_assets+"js/jbvalidatorLangEs.json",
    });
    validatorServerSide.validator.custom = function(el, event){

        if($(el).is('[name=id_rol]')){
            let value= $(el).val()
            if (!validateEmptyField(value)){
                return 'Este campo es obligatorio';
            }
        }
        
    }

    return validatorServerSide
}



function clickModalLogin(nameSelector,modalName,listCamps){
    $('#openModal').on('click',function (e) {
        $('#form4').addClass('hidden-data');
        $("#fntCrearPerm").removeClass("hidden-data");
        $("option:selected").removeAttr("selected");
        $('#id_rol').removeAttr('disabled');
        var options = {
            "backdrop" : "static",
            "keyboard": false,
            "show":true
        }
        
        document.querySelector('#modalTitle').innerHTML = modalName;
        document.querySelector('.changeText').innerHTML = "Crear ";
        listCamps.forEach(element => {
            document.querySelector(element).value = '';
            $(element).addClass('is-invalid');
        });
        $(nameSelector).modal(options);
    });
}

function clickModalEditingPermisos(id){
    $("option:selected").removeAttr("selected");
    $("#id_rol").attr('disabled', 'disabled');
    $("#id_rol option[value='"+id+"']").attr('selected', 'selected');
    $('#id_rol').removeClass('is-invalid');
    $('#id_rol').addClass('is-valid');
    $("#modalPermiso").modal("show");
    document.querySelector('#modalTitle').innerHTML = "Actualizar Permiso";
    const columnData2 = [
        {"data":"id_permiso"},
        {"data":"nombre_modulo"},
    ]
    $('.tableModulo').DataTable().clear();
    $('.tableModulo').DataTable().destroy();
    const tablePermisosModulo =  configDataTables('.tableModulo',base_url+"permisos/getPermiso/"+id,columnData2,'<"row" <"col-sm-12 col-md-6"> <"col-sm-12 col-md-6"> >rt<"row" <"col-sm-12 col-md-5"i> <"col-sm-12 col-md-7"p> >')
    $("#fntCrearPerm").addClass("hidden-data");
    $('#form4').removeClass('hidden-data');
}
