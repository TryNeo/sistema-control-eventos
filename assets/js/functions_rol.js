$(function(){
    let tableRoles =  $('.tableRol').DataTable({
        "sDom": '<"row" <"col-sm-12 col-md-6"l> <"col-sm-12 col-md-6"f> >rt<"row" <"col-sm-12 col-md-5"i> >',
        "aProcessing":true,
        "aServerSide":true,
        responsive:true,
        "language":{
            "url" : "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax":{
            "url" :"http://localhost/sistema-control-eventos/roles/getRoles",
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
    
    $('#openModal').on('click',function (e) {
        e.preventDefault();
        abrir_modal(["#id_rol","#nombre_rol","#descripcion"]);
    })
    $('div.dataTables_length select').addClass("form-control form-control-sm");
    $('div.dataTables_filter input').addClass("form-control form-control-sm");

});

