const BASE_URL = base_url;

$(document).ready(function () {

    function loadingImg(message = null) {
        return "<i class=\"fas fa-circle-notch fa-spin\"></i>&nbsp;" + message;
    };

    $("#btn_login").click(function() {

        $.ajax({
            type: "post",
            url: BASE_URL + "web/auth",
            dataType: "json",
            data: {
                "email": $("#input_email").val(),
                "password": $("#input_password").val()
            },
            success: function(json) {
                if (json["status"] == 1) {
                    Swal.fire({
                        title: json['message'],
                        confirmButtonText: `OK!`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = BASE_URL + json['office'];
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: json["message"]
                    })
                }
            },
            error: function(response) {
                console.log(response);
            }
        })

        return false;
    })

})