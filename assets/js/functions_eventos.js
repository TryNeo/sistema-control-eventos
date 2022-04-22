$(function(){
    const listCamps =  [];

    clickModal("#modalEvento","Crear | Evento",listCamps);
    fetchSelect(base_url+"categorias/getSelectCategorias","#id_categoria","Selecciona una categoria")
    fetchSelect(base_url+"invitados/getSelectInvitados","#id_invitado","Selecciona un invitado")

})

