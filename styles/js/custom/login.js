$(document).ready(function () {


var url = window.location.protocol;

    $('body').keyup(function(e) {
        if(e.keyCode == 13) {
            $('#login').click();
        }
    });

    $('#login').click(function () {
        var user,pass;
        user = $("#user").val();
        pass = $("#pass").val();

        if(user == "" || pass == ""){

            alertar(3);
        }else{
            $.ajax({
                url: ""+url+"login/logeo",
                data:{"user":user,"pass":pass},
                method:"POST",
                beforeSend: function( xhr ) {
                    alertar(2);
                }
            })
                .done(function( data ) {
                 var datos =  data.split(';');

                    if(datos[1]=="1"){
                        alertar(1);
                        location.href = ""+url+"inicio";
                    }else if(datos[1] == "2"){
                        alertar(4);
                    }else if(datos[1] == "3"){
                        alertar(5);
                    }else if(datos[1] == "4"){
                        alertar(6);
                    }
                });
        }

    });

    function alertar(x){
        switch (x){
            case 1:
                var alerta = '<div class="login-alert alert alert-success" role="alert">' +
                    '<strong>Ingreso Correcto! </strong>Estamos Preparando todo correctamente por favor espera.</div>';
                $('#alerta').html(alerta);
                break;
            case 2:
                var alerta = '<div class="login-alert alert alert-info" role="alert">' +
                    '<strong>Ingresando! </strong>Verificando datos.</div>';
                $('#alerta').html(alerta);

                break;
            case 3:
                var alerta = '<div class="login-alert alert alert-warning" role="alert">' +
                    '<strong>Datos Vacios! </strong>No puedes dejar campos vaciós por favor vuelba a intentar.</div>';
                $('#alerta').html(alerta);
                window.setTimeout(function() {
                    $(".login-alert").fadeTo("slow", 0).slideUp("slow", function(){
                        $(this).remove();
                    });
                }, 2000);
                break;
            case 4:
                var alerta = '<div class="login-alert alert alert-danger" role="alert">' +
                    '<strong>Error! </strong>Usuario bloqueado o suspendido.</div>';
                $('#alerta').html(alerta);
                window.setTimeout(function() {
                    $(".login-alert").fadeTo("slow", 0).slideUp("slow", function(){
                        $(this).remove();
                    });
                }, 2000);
                break;
            case 5:
                var alerta = '<div class="login-alert alert alert-danger" role="alert">' +
                    '<strong>Error! </strong>Empresa bloqueada o suspendida.</div>';
                $('#alerta').html(alerta);
                window.setTimeout(function() {
                    $(".login-alert").fadeTo("slow", 0).slideUp("slow", function(){
                        $(this).remove();
                    });
                }, 2000);
                break;
                case 6:
            var alerta = '<div class="login-alert alert alert-danger" role="alert">' +
                '<strong>Error! </strong>Datos incorrectos usuario no encontrado.</div>';
            $('#alerta').html(alerta);
            window.setTimeout(function() {
                $(".login-alert").fadeTo("slow", 0).slideUp("slow", function(){
                    $(this).remove();
                });
            }, 2000);
            break;
        }
    }
});