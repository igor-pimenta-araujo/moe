$(document).ready(function () {

    $("#form_vacancy").submit(function() {

        $.ajax({
            type: "post",
            url: BASE_URL + "employer/register_vacancy",
            dataType: "json",
            data: $(this).serialize(),
            success: function(json) {
                if (json['status'] == 1){
                    Swal.fire(
                        'Tudo certo!',
                        json['message'],
                        'success'
                    )
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: json["message"]
                    })
                }
            }
        })

        return false;
    });

})