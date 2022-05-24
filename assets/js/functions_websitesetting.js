
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
    });
}