$(function(){
    const columnData = [
        {"data":"id_usuario"},
        {"data":"foto"},
        {"data":"nombre_apellido"},
        {"data":"usuario"},
        {"data":"email"},
        {"data":"ultimo_online"},
        {"data":"nombre_rol"},
        {"data":"estado"},
        ]

    const tableUsuarios =  configDataTables('.tableUsuarios',base_url+"usuarios/getUsuarios",columnData)
})



setInterval(function(){
    $(".tableUsuarios").DataTable().ajax.reload();
},2000);




