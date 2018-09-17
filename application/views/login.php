
<!DOCTYPE html>
<html>
<head>
    <title>Control Administrativo Comidissima</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/styles/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/styles/css/bootstrap-reboot.min.css">
    <style>
        .login-page {
            background-image: url(<?php echo base_url(); ?>styles/img/bg.jpg);
            background-position: center center;
            background-attachment: fixed;
            background-repeat: repeat;
            background-position: 90% 0;
            -ms-background-size: cover;
            -o-background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-size: cover;
        }

        .form-sing{
            margin-top: 10%;
            margin-bottom: 5%;
        }

        .login-logo{
            font-size: 35px;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 300;
            margin-top: 5%;
        }

        .cuadrito{
            background-color: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 10px;
            border-left: 10px solid crimson;
        }
    </style>
</head>
<body class="login-page">
<div class="login-logo">
    <a href="https://admin.comidissima.com/"><img src="<?php echo base_url(); ?>styles/img/grietalogo.png" height="auto" width="300"></a>
</div>
<div id="alerta" class="col-md-4 col-sm-6 offset-md-4">


</div>

<div class="container-fluid">
    <div class="row align-items-center">

        <div class="col-md-4 col-sm-6 offset-md-4">
            <form method="post" enctype="multipart/form-data">
                <div class="cuadrito">
                    <h5 align="center">Ingresar a Sistema</h5>
                    <div class="form-group">
                        <label for="user">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="user" aria-describedby="emailHelp" placeholder="Ingrese su Nombre de Usuario.">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" id="pass" aria-describedby="emailHelp" placeholder="Ingrese su Contraseña.">
                    </div>
                    <div class="form-group row">
                        <div class="offset-md-7 col-md-4 col-sm-12 ">
                            <button type="button" id="login" class="btn btn-primary btn-block btn-flat">INGRESAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="<?php echo base_url(); ?>styles/styles/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>styles/js/custom/login.js"></script>

</body>
</html>