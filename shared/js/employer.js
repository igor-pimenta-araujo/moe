$(document).ready(function () {

    function loadingImg(message="") {
        return message + "&nbsp;<i class='fa fa-circle-o-notch fa-spin'></i>";
    }

    $("#form_vacancy").submit(function() {

        $.ajax({
            type: "post",
            url: base_url + "employer/register_vacancy",
            dataType: "json",
            data: $(this).serialize(),
            beforeSend:function (){
                $('#btn_vacancy').html(loadingImg("cadastrando"));
                $('#btn_vacancy').attr("class", "btn blue-grey darken-3 waves-effect waves-purple pulse");
            },
            success: function(json) {
                if (json['status'] == 1){
                    Swal.fire({
                        icon: "success",
                        title: json['message'],
                        confirmButtonText: `OK!`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = base_url;
                        }
                    });
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: json["message"]
                    })
                }
                $('#btn_vacancy').html("Cadastrar vaga <i class=\"material-icons right\">send</i>");
                $('#btn_vacancy').attr("class", "btn waves-effect waves-purple");
            }
        })

        return false;
    });

})