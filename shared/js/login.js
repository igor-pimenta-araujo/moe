const BASE_URL = "https://www.localhost/webestagio/";

$(document).ready(function () {

    function loadingImg(message = null) {
        return "<i class=\"fas fa-circle-notch fa-spin\"></i>&nbsp;" + message;
    };

    $("#btn_login").click(function() {

        $.ajax({
            type: "post",
            url: BASE_URL + "user/authUser",
            dataType: "json",
            data: {
                "email": $("#input_email").val(),
                "password": $("#input_password").val()
            },
            success: function(json) {
                if (json["status"] == 1) {
                    alert(json["message"]);
                    window.location = BASE_URL + "app";
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