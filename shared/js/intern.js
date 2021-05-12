$(document).ready(function () {

    var list_employers = [];

    $('.input_vacancy').click(function (){
        if ($(this).attr("check_input") == "false"){
            list_employers.push($(this).attr("employer_id"));
            $(this).attr("check_input", "true");
        }else {
            list_employers.splice(list_employers.indexOf($(this).attr("employer_id")), 1);
            $(this).attr("check_input", "false");
        }
    });

    $('#btn_register_vacancys').click(function (){

        $.ajax({
            type: "post",
            url: base_url + "intern/register_vacancys",
            dataType: "json",
            data: {
                'list' : list_employers
            },
            success: function(json) {
                if (json['status'] == 1){
                    Swal.fire({
                        title: json['message'],
                        confirmButtonText: `OK!`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = base_url + "intern";
                        }
                    });
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: json["message"]
                    })
                }
            }
        });
        return false;
    });

    $('.btn_unfollow').click(function (){

        $.ajax({
            type: "post",
            url: base_url + "intern/unfollow_employer",
            dataType: "json",
            data: {
                'employer_id' : $(this).attr("employer_id")
            },
            success: function(json) {
                if (json['status'] == 1){
                    Swal.fire({
                        icon: "success",
                        title: json['message'],
                        confirmButtonText: `OK!`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = base_url + "intern/follow";
                        }
                    });
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: json["message"]
                    })
                }
            }
        });
    });

})