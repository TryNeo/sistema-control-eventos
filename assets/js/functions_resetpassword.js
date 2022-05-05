$(function(){
    sendingDataServerSideResetpasword()
});


function sendingDataServerSideResetpasword(){
    if(data.status){

    }else{
        Swal.fire({
            icon: "error",
            title: "Error",
            text: data.msg,
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        })
    }
}