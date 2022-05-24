
$(function(){
    
    get_website_setting();
});



function get_website_setting(){
    $.ajax({
        type: 'GET',
        url: base_url+"websitesetting/getWebsite",
    }).then(function (data) {
        let objdata = JSON.parse(data);
        $('#id_website_setting').val(objdata.id_website_setting ? objdata.id_website_setting : "");
        $('#website_name').val(objdata.website_title ? objdata.website_title : "");
        $('#website_about').val(objdata.website_about ? objdata.website_about : "");
        $('#website_image').val(objdata.website_image ? objdata.website_image : "");
        $('#website_favicon').val(objdata.website_favicon ? objdata.website_favicon : "");
        $('#website_clients').val(objdata.website_clients ? objdata.website_clients : "");
        $('#website_expirience').val(objdata.website_expirience ? objdata.website_expirience : "");
        $('#website_proyects').val(objdata.website_proyects ? objdata.website_proyects : "");
    });
}