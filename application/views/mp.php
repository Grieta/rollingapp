<?php include ('includes/header.php');?>
<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
</style>
</head>
<?php include ('includes/nav.php');?>
<?php include ('includes/menu.php');?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/nestable/nestable.css?1423393667" />
<!-- Sidebar menu-->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Añadir Materia Prima </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Añadir Materia Prima</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="tile " >
                <!--h3 class="tile-title">Create a beautiful dashboard</h3-->
                <h3 class="tile-title">Materia Prima <span id="name_art" data-id="0"></span></h3>
                <div class="tile-body">
                    <form class="">

                        <div class="form-group input-row">

                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                            </div>
                            <input id="art_name" type="text" style="text-transform: uppercase;" class="form-control" aria-label="Nombre" aria-describedby="inputGroup-sizing-default">
                        </div>
                        </div>
                    </form>
                        <form class="hidden">
                            <div class="form-group row">
                                <div class="input-group col-md-12">
                                    <div class="input-group-lg input-group col-md-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Cant.</span>
                                        </div>
                                        <input value="0" id="art_pvp1" type="hidden" placeholder="Cantidad" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                                    </div>

                                </div>

                            </div>

                        </form>
                </div>
                <div class="tile-footer">
                    <button id="art_guardar" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-secondary" id="del_art" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Eliminar</button>&nbsp;&nbsp;&nbsp;<button id="new_art" class="btn btn-outline-info" href="#"><i class="fa fa-fw fa-lg fa-plus-circle"></i>Nuevo</button>
                </div>

            </div>


        </div>
                <div class="col-md-4">
            <div class="tile " >
                <h3 class="tile-title">Seleccionar Materia Prima</h3>
                <div class="tile-body no-padding">
                    <button class="btn btn-primary col-md-12" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   ⇊ Ver Materia Prima ⇊
  </button>
                    <div class="collapse" id="collapseExample">
  <div class="card card-body">
                    <div class="col-md-12">
                        <ul class="" style="padding: 0" id="mp_lista">
                            <?php
                            foreach ($materiaprima as $mp) {       

                            if($mp->mp_nombre == '')
                            {

                            }else{

                                               
                             ?>
                        <li style="height: 100%;display: grid;border: black 2px solid;">

                                
                                <span  
                                data-id="<?php echo $mp->idmateriaprima; ?>" 
                                style="
                                cursor: pointer;
                                height: 20px;
                                margin: 0;
                                font-size: 0.875rem;
                                border-radius: 0;" class="badge badge-warning materia"><?php echo $mp->mp_nombre; ?></span>
                                
                               

                        </li>

                    <?php 
                                }  
                        } 
                ?>
                        </ul>

                    </div>
                     </div>
</div>
                </div>
                <div class="tile-footer ">
               <div id="mp-selection" class="" ></div>
               </div>
               

            </div>
        </div>

    </div>
</main><!-- Essential javascripts for application to work-->
<?php include ('includes/essencial_js.php');?>
<script src="<?php echo base_url(); ?>assets/js/libs/nestable/jquery.nestable.js"></script>

<script src="<?php echo base_url(); ?>assets/js/core/demo/DemoUILists.js"></script>
<!-- motor javascript para los calculos y controladores de aticulos y lineas -->
<script type="text/javascript">
    $(document).ready(function () {
        var cargandonoti;

        $('.materia').click(function () {
            $.ajax({
                                    url: "<?= base_url(); ?>BtnDirectos/materiaprima/carg",
                                    data: {
                                        "idmateriaprima": $(this).attr('data-id')
                                    },
                                    dataType:'json',
                                    method: "POST",
                                    beforeSend: function (xhr) {
                                        cargandonoti = $.notify({
                                            title: "Cargando:",
                                            message: "Cargando Materia Prima."
                                        }, {
                                            z_index: 1052,
                                            allow_dismiss: true,
                                            showProgressbar: true,
                                            type: 'warning'
                                        });
                                    }
                                    })
                                        .done(function (data) {

                                    //var datos = data.split(';');
                                    $.each(data, function (key, val) {
                                        $('#art_name').val(val.mp_nombre);
                                        $('#art_pvp1').val(val.mp_cant);
                                        $('#name_art').html("- "+val.mp_nombre);
                                        $('#name_art').attr('data-id',val.idmateriaprima);
                                    });
                                    cargandonoti.update('progress', '100');
                                    cargandonoti.close();

                                    //swal("¡Listo!", "Ca", "success");

            });
        });

        $('#art_name').keyup(function () {
            if($('#art_name').val() == '')
            {
            $('#name_art').html("");    
            }else{
            $('#name_art').html("- "+$(this).val().toUpperCase());
            }
            
        });

        $('#art_guardar').click(function () {
            guardar();
        });
        $('#del_art').click(function () {
            
        });
        $('#new_art').click(function () {
            input_empty();
        });
        function actualizar_mp() {
            var list = '';
             $.ajax({
                                    url: "<?= base_url(); ?>BtnDirectos/materiaprima/act",
                            
                                    method: "POST",
                                    dataType:"json",
                                    beforeSend: function (xhr) {
                                                                            }
                                    })
                                        .done(function (data) {
                                             $.each(data, function (key, val) {
                                                list += '<li style="height: 100%;display: grid;border: black 2px solid;">';
                                                list +='<span data-id="'+val.idmateriaprima+'" style="cursor: pointer; height: 20px;margin: 0;font-size: 0.875rem;border-radius: 0;" class="badge badge-warning materia">'+val.mp_nombre+'</span>';
                                                list += '</li>'
                                                });
                                            $('#mp_lista').html(list);
                                                    $('.materia').click(function () {
            $.ajax({
                                    url: "<?= base_url(); ?>BtnDirectos/materiaprima/carg",
                                    data: {
                                        "idmateriaprima": $(this).attr('data-id')
                                    },
                                    dataType:'json',
                                    method: "POST",
                                    beforeSend: function (xhr) {
                                        cargandonoti = $.notify({
                                            title: "Cargando:",
                                            message: "Cargando Materia Prima."
                                        }, {
                                            z_index: 1052,
                                            allow_dismiss: true,
                                            showProgressbar: true,
                                            type: 'warning'
                                        });
                                    }
                                    })
                                        .done(function (data) {

                                    //var datos = data.split(';');
                                    $.each(data, function (key, val) {
                                        $('#art_name').val(val.mp_nombre);
                                        $('#art_pvp1').val(val.mp_cant);
                                        $('#name_art').html("- "+val.mp_nombre);
                                        $('#name_art').attr('data-id',val.idmateriaprima);
                                    });
                                    cargandonoti.update('progress', '100');
                                    cargandonoti.close();

                                    //swal("¡Listo!", "Ca", "success");

            });
        });

                                        });

        }

        function input_empty() {
            $('#art_name').val("");
            $('#art_pvp1').val("");
            $('#name_art').html("");
            $('#name_art').attr('data-id',"0");
        }
        function guardar() {
            var name = $('#art_name').val();
            var cant = $('#art_pvp1').val();
            var name_dupli = $('#name_art').html();
            var idmateriaprima= $('#name_art').attr('data-id');
            var cargandonoti;
            switch (idmateriaprima){
                case '0':
                     swal(
                    "¿Deseas Guardar Materia Prima \"" + name.toUpperCase() +
                            "\"?",
                    {
                        buttons: {
                            cancel: "¡No!", catch  : {
                                text : "Guardar",
                                value: "catch"
                            }
                        }
                    }
                    ).then((value) => {
                    switch (value) {

                        case "catch":
                        //GUARDAR
                            $.ajax({
                                    url: "<?= base_url(); ?>BtnDirectos/materiaprima/add",
                                    data: {
                                        "mp_cant": cant,
                                        "mp_nombre": name.toUpperCase()
                                    },
                                    method: "POST",
                                    beforeSend: function (xhr) {
                                        cargandonoti = $.notify({
                                            title: "Guardando:",
                                            message: "Guardando Materia Prima."
                                        }, {
                                            z_index: 1052,
                                            allow_dismiss: true,
                                            showProgressbar: true,
                                            type: 'warning'
                                        });
                                    }
                                    })
                                        .done(function (data) {

                                    input_empty();
                                    actualizar_mp();
                                    var datos = data.split(';');
                                    cargandonoti.update('progress', '100');
                                    cargandonoti.close();
                                    swal("¡Listo!", "La Materia Prima ha sido Guardada", "success");

                                    });

                        break;

                        default:
                            swal("Materia Prima no Guardada.");
                    }
                    });
                break;
                default:
                     swal(
                    "¿Deseas Editar Materia Prima \"" + name.toUpperCase() +
                            "\"?",
                    {
                        buttons: {
                            cancel: "¡No!", catch  : {
                                text : "Editar",
                                value: "catch"
                            }
                        }
                    }
                    ).then((value) => {
                    switch (value) {

                        case "catch":
                        //EDITAR
                            $.ajax({
                                    url: "<?= base_url(); ?>BtnDirectos/materiaprima/edit",
                                    data: {
                                        "idmateriaprima": idmateriaprima,
                                        "mp_cant": cant,
                                        "mp_nombre": name.toUpperCase()
                                    },
                                    method: "POST",
                                    beforeSend: function (xhr) {
                                        cargandonoti = $.notify({
                                            title: "Editando:",
                                            message: "Editando Materia Prima."
                                        }, {
                                            z_index: 1052,
                                            allow_dismiss: true,
                                            showProgressbar: true,
                                            type: 'warning'
                                        });
                                    }
                                    })
                                        .done(function (data) {
                                    input_empty();
                                    actualizar_mp();
                                    var datos = data.split(';');
                                    cargandonoti.update('progress', '100');
                                    cargandonoti.close();
                                    swal("¡Listo!", "Materia Prima Editada", "success");

                                    });

                        break;

                        default:
                            swal("Materia Prima no Editada.");
                    }
                    });
                break;

            }
               
        }

    });
</script>
</body>
</html>