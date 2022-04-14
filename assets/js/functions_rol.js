document.addEventListener('DOMContentLoaded',function(){
    let table_rol = $('.tableRol').DataTable({
        "aProcessing":true,
        "responsive":true,
        "destroy": false,
        "searching": false,
        "aServerSide":true,
        "info": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        },
        "ajax":{
            "url" :"#",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_rol"},
            {"data":"nombre_rol"},
            {"data":"descripcion"},
            {"data":"estado"},
            {"data":"opciones"}
        ],
        "order":[[0,"desc"]]
    });
});
