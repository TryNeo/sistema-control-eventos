$(function(){
    const columnData = [
        {"data":"id_rol"},
        {"data":"nombre_rol"},
        {"data":"modulos"},
        {"data":"opciones"},

    ]
    
 
    const tablePermisos =  configDataTables('.tablePermisos',base_url+"permisos/getPermisos",columnData)


    const listCamps =  ["#id_permiso","#id_rol"];
    
    const configValid = configToValidate()

    clickModal("#modalPermiso","Crear | Permisos",listCamps);
    fetchSelect(base_url+"roles/getSelectRoles","#id_rol","Selecciona un rol")
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
                $('#id_modulo').val('');
                $('#id_mdoulo').trigger('change.select2');
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


function clickModalEditingPermisos(id){
    $("#modalPermiso").modal("show");
    document.querySelector('#modalTitle').innerHTML = "Actualizar Permiso";
    document.querySelector('.changeText').innerHTML = " Actualizar registro ";
    const columnData2 = [
        {"data":"id_permiso"},
        {"data":"nombre_modulo"},
    ]
    $('.tableModulo').DataTable().clear();
    $('.tableModulo').DataTable().destroy()
    const tablePermisosModulo =  configDataTables('.tableModulo',base_url+"permisos/getPermiso/"+id,columnData2)
    $("#id_rol").val(id);

}