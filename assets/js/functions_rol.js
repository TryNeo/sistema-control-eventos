$(function(){

    
    $('#openModal').on('click',function (e) {
        e.preventDefault();
        abrir_modal(["#id_rol","#nombre_rol","#descripcion"]);
    })
});

