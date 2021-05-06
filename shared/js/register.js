const BASE_URL = base_url;

$(document).ready(function () {

    function loadingImg(message = null) {
        return "<i class=\"fas fa-circle-notch fa-spin\"></i>&nbsp;" + message;
    };

    $("#input_employer").click(function() {

        $("#div_employer").attr("style", "display: block");
        $("#div_intern").attr("style", "display: none");

    });

    $("#input_intern").click(function() {

        $("#div_employer").attr("style", "display: none");
        $("#div_intern").attr("style", "display: block");

    });

    $("#btn_register_employer").click(function() {

        $.ajax({
            type: "post",
            url: BASE_URL + "employer/register",
            dataType: "json",
            data: {
                "email": $("#input_email").val(),
                "password": $("#input_password").val(),
                "password_confirm": $("#input_password_confirm").val(),
                "employer_name": $("#input_employer_name").val(),
                "employer_address": $("#input_employer_address").val(),
                "employer_contact_name": $("#input_employer_contact").val(),
                "employer_description": $("#input_employer_description").val()
            },
            success: function(json) {
                if (json["status"] == 1) {
                    Swal.fire({
                        title: json['message'],
                        confirmButtonText: `OK!`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = BASE_URL;
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
    });

    $("#btn_register_intern").click(function() {

        $.ajax({
            type: "post",
            url: BASE_URL + "intern/register",
            dataType: "json",
            data: {
                "email": $("#input_email").val(),
                "password": $("#input_password").val(),
                "password_confirm": $("#input_password_confirm").val(),
                "intern_name": $("#input_intern_name").val(),
                "intern_curriculum": $("#input_intern_curriculum").val(),
                "intern_curse": $("#input_intern_curse").val(),
                "intern_year": $("#input_intern_year").val()
            },
            success: function(json) {
                if (json["status"] == 1) {
                    Swal.fire({
                        title: json['message'],
                        confirmButtonText: `OK!`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = BASE_URL;
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
    });

})