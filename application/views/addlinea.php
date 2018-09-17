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
            <h1><i class="fa fa-dashboard"></i> Añadir Linea/Articulo </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Añadir Linea/Articulo</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="tile " >
                <!--h3 class="tile-title">Create a beautiful dashboard</h3-->
                <h3 class="tile-title">Artículos <span id="name_art" data-id="0"></span></h3>
                <div class="tile-body">
                    <form class="">
                        <div class="form-group input-row">
                            <div class="input-group col-md-12">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <?= $sel_lines ?>
                                </select>
                                <div class="input-group-append">
                                    <button  data-toggle="modal" data-target="#modal_addlinea" class="btn btn-outline-secondary" id="add_linea" type="button">
                                        AÑADIR LINEA
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-row">

                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                            </div>
                            <input id="art_name" type="text" style="text-transform: uppercase;" class="form-control" aria-label="Nombre" aria-describedby="inputGroup-sizing-default">
                        </div>
                        </div>

                        <div class="form-group input-row">
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descripción</span>
                            </div>
                            <textarea id="art_descrip" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        </div>
                    </form>
                    <br>

                    <form>
                        <div class="input-row">

                        </div>
                        <div class="input-group  col-md-12" data-toggle="buttons">
                            <label class="btn btn-primary checkss   active" >
                                <input id="art_isiva" style="display: none" type="checkbox" autocomplete="off" checked>
                                <span class="fa fa-check fa-check fa-lg" style="font-size: 2em"></span>

                            </label>
                            <label class="text-center checkss-label" >
                                INCLUIR IVA
                            </label>

                        </div>
                        <form class="">
                            <div class="form-group row">
                                <div class="input-group col-md-12">
                                    <div class="input-group-lg input-group col-md-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">PVP $</span>
                                        </div>
                                        <input id="art_pvp1" type="text" placeholder="PVP" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                                    </div>
                                    <div class="input-group-lg input-group col-md-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">+IVA $</span>
                                        </div>
                                        <input id="art_iva" type="text" placeholder="IVA" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="input-group col-md-12">
                                    <div class="input-group-lg input-group col-md-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">COSTO $</span>
                                        </div>
                                        <input id="art_costo" type="text" placeholder="COSTO" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                                    </div>
                                    <div class="input-group-lg input-group col-md-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">%</span>
                                        </div>
                                        <input id="art_cosp" disabled type="text" placeholder="COSTO PROMEDIO" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                                    </div>
                                </div>

                            </div>
                        </form>

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
                        <ul class="" id="mp_lista">
                            <?php
                            foreach ($materiaprima as $mp) {       

                            if($mp->mp_nombre == '')
                            {

                            }else{

                                               
                             ?>
                        <li>
                            <div class="animated-checkbox">
                                <label>
                                <input type="checkbox" class="mpp_lista" id="<?php echo $mp->idmateriaprima; ?>_idmpp" data-id="<?php echo $mp->idmateriaprima; ?>">
                                <span class="label-text"><span>
                                    <input disabled="disabled" style="width: 50px;display: inline;height: 20px;padding: 0" type="number" class="form-control cantclass" id="<?php echo $mp->idmateriaprima; ?>_cantmp" >&nbsp;
                                </span><?php echo $mp->mp_nombre; ?></span>
                                </label>
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

            <div class="tile " >
                <h3 class="tile-title">Editar Artículos</h3>
                <div class="tile-body no-padding">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" id="art_bus" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="col-md-12">
                        <ul class="list-productos-horizontal" id="art_lista">


                        </ul>
                    </div>
                </div>
                                           <div class="tile-footer ">
               <div id="page-selection" class="" ></div>
               </div>
               

            </div>
        </div>

    </div>
    <div class="modal fade" id="modal_addlinea" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Añadir Linea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                                            <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                            </div>
                            <input id="line_name" type="text" style="text-transform: uppercase;" class="form-control" aria-label="Nombre" aria-describedby="inputGroup-sizing-default">
                                                  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="btn_addline"><i style="margin:0;" class="fa fa-plus"></i></button></div>
                        </div>
                        </form>
                
                                                           <div class="dd nestable-list">
                                            <ol class="dd-list">
                                    <?= $nes_lines ?>

                                                
                                            </ol>
                                        </div>
                                        <!--end .dd.nestable-list -->
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
        editdel_line();
        $('.mpp_lista').click(function () {
            if( $(this).is(':checked') ) {
                 $('#'+$(this).attr('data-id')+'_cantmp').removeAttr('disabled');
                }else{
                    $('#'+$(this).attr('data-id')+'_cantmp').attr('disabled','disabled');
                     $('#'+$(this).attr('data-id')+'_cantmp').val("");
                }
        });
        // $('.app-sidebar__toggle').click(); Enviar Nuevo Articulo
        function editdel_line() {
            $('.editar_nes').click(function () {
                var person = prompt("Editar Nombre", $(this).prev().find('div').html());
                if (person != null) {
                    $(this)
                        .prev()
                        .find('div')
                        .html(person);
                    $.ajax({
                        url: "<?= base_url(); ?>BtnDirectos/actualizar_line_art",
                        data: {
                            "setear": "5",
                            "line_name": person,
                            "idline": $(this)
                                .parent()
                                .attr("data-id")
                        },
                        method: "POST",
                        beforeSend: function (xhr) {}
                    });
                }
                //alert($(this).find('div').html()) ;
            });
            $('.cerrar_nes').click(function () {
                swal(
                    "¿Deseas Eliminar la Linea \"" + $(this).prev().prev().find('div').html() +
                            "\"?",
                    {
                        buttons: {
                            cancel: "¡No!", catch  : {
                                text : "¡Eliminar!",
                                value: "catch"
                            }
                        }
                    }
                ).then((value) => {
                    switch (value) {

                        case "catch":

                            var person = $(this)
                                .prev()
                                .prev()
                                .find('div')
                                .html();
                            $.ajax({
                                    url: "<?= base_url(); ?>BtnDirectos/actualizar_line_art",
                                    data: {
                                        "setear": "6",
                                        "line_name": person,
                                        "idline": $(this)
                                            .parent()
                                            .attr("data-id")
                                    },
                                    method: "POST",
                                    beforeSend: function (xhr) {
                                        cargandonoti = $.notify({
                                            title: "Guardando:",
                                            message: "Se esta guardando Eliminando linea."
                                        }, {
                                            z_index: 1052,
                                            allow_dismiss: true,
                                            showProgressbar: true,
                                            type: 'warning'
                                        });
                                    }
                                    })
                                        .done(function (data) {
                                    actualizar_select();
                                    actualizar_nes();

                                    var datos = data.split(';');
                                    cargandonoti.update('progress', '100');
                                    cargandonoti.close();
                                    swal("¡Listo!", "La linea ha sido eliminada", "success");

                                    });

                            break;

                        default:
                            swal("Linea no Eliminada.");

                    }
                });
            });
        }

        $('form').submit(function () {
            return false;
        });

        $('#btn_addline').click(function () {
            var line_name = $('#line_name');
            var nes_line = $('#dd').nestable('serialize');
            var neslist_line = $('.dd-list');
            var lname_val = line_name.val();
            var count_line = JSON
                .stringify(nes_line)
                .length;
            if (lname_val.trim() == '') {
                $.notify({
                    title: "Error:",
                    message: "Debes Ingresar un Nombre Primero  ."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'danger'

                });

            } else {
                $
                    .ajax({
                        url: "<?= base_url() ?>BtnDirectos/actualizar_line_art",
                        data: {
                            "setear": "3",
                            "line_name": line_name.val(),
                            "line_order": count_line
                        },
                        method: "POST",
                        beforeSend: function (xhr) {
                            cargandonoti = $.notify({
                                title: "Guardando:",
                                message: "Se esta guardando linea nueva."
                            }, {
                                z_index: 1052,
                                allow_dismiss: true,
                                showProgressbar: true,
                                type: 'warning'
                            });
                        }
                    })
                    .done(function (data) {
                        line_name.val('');
                        actualizar_select();
                        actualizar_nes();
                        var datos = data.split(';');
                        cargandonoti.update('progress', '100');
                        cargandonoti.close();

                        $.notify({
                            title: "Listo:",
                            message: "Línea nueva guardada."
                        }, {
                            z_index: 1052,
                            allow_dismiss: true,
                            type: 'success'

                        });

                    });
            }

        });

        $('#art_name').keyup(function () {
            var name = $('#art_name').val();
            if (name == '') {
                $('#name_art').html('');
            } else {
                $('#name_art').html('- ' + name.toUpperCase());

            }
        });

        function actualizar_select() {
            $
                .ajax({
                    url: "<?= base_url() ?>BtnDirectos/actualizar_line_art",
                    data: {
                        "setear": "2"
                    },
                    method: "POST",
                    beforeSend: function (xhr) {}
                })
                .done(function (data) {
                    $('#inputGroupSelect04').html(data);
                });
        }

        function actualizar_nes() {
            $.ajax({
                    url: "<?= base_url() ?>BtnDirectos/actualizar_line_art",
                    data: {
                        "setear": "4"
                    },
                    method: "POST",
                    beforeSend: function (xhr) {}
                })
                .done(function (data) {
                    $('.dd-list').html(data);
                    editdel_line();

                });
        }
        //actualizar iva por check
        $('.checkss').click(function () {
            if ($('#art_isiva').is(':checked')) {
                var pvp = $('#art_pvp1').val();
                $('#art_iva').val(pvp);
            } else {
                var pvp = $('#art_pvp1').val();
                var iva = $('#art_iva').val();
                var pvp_wzero = parseFloat(pvp);
                if (pvp.trim() == '') {} else {
                    var obt_iva = (pvp_wzero * 0.<?= $this->session->userdata('iva') ?>) +
                            pvp_wzero;

                    $('#art_iva').val(obt_iva.toFixed(2));
                }

            }
        });
        //actualizar iva por input
        $('#art_iva').keyup(function () {
            var pvp = $('#art_pvp1').val();
            var iva = $('#art_iva').val();
            var art_isiva = $('#art_isiva').is(':checked');

            if (iva == '') {
                $('#art_iva').val('');

            } else {
                if (art_isiva == false) {
                    $('#art_iva').val(pvp);

                } else {
                    var pvp_wzero = parseFloat(iva);
                    var obt_iva = (pvp_wzero / 1.<?= $this->session->userdata('iva') ?>);
                    // console.log(pvp); console.log(pvp_wzero); console.log(obt_iva);
                    $('#art_pvp1').val(obt_iva.toFixed(2));

                }

            }

        });

        $('#art_pvp1').keyup(function () {
            var pvp = $('#art_pvp1').val();
            var costo = $('#art_costo').val();
            var art_isiva = $('#art_isiva').is(':checked');

            if (pvp == '') {
                $('#art_iva').val('');
                $('#art_cosp').val('');

            } else {
                if (art_isiva == false) {
                    $('#art_iva').val(pvp);

                } else {
                    var pvp_wzero = parseFloat(pvp);
                    var obt_iva = (pvp_wzero * 0.<?= $this->session->userdata('iva') ?>) +
                            pvp_wzero;
                    // console.log(pvp); console.log(pvp_wzero); console.log(obt_iva);
                    $('#art_iva').val(obt_iva.toFixed(2));

                }

                if (costo == '') {} else {
                    var costo_wzero = parseFloat(costo);
                    var pvp_wzero = parseFloat(pvp);
                    var obt_costopro = (costo_wzero / pvp_wzero) * 100;
                    var fix_costopro = obt_costopro.toFixed(2);
                    $('#art_cosp').val(fix_costopro);

                }
            }

        });

        $('#art_costo').keyup(function () {
            var pvp = $('#art_pvp1').val();
            var costo = $('#art_costo').val();

            if (costo == '' || pvp == '') {
                $('#art_cosp').val('');

            } else {
                var costo_wzero = parseFloat(costo);
                var pvp_wzero = parseFloat(pvp);
                var obt_costopro = (costo_wzero / pvp_wzero) * 100;
                var fix_costopro = obt_costopro.toFixed(2);
                // console.log(costo_wzero); console.log(pvp_wzero); console.log(obt_costopro);
                // console.log(fix_costopro);
                $('#art_cosp').val(fix_costopro);

            }

        });

        $('.dd').change(function () {
            var a = $('.dd').nestable('serialize');
            $
                .ajax({
                    url: "<?= base_url() ?>BtnDirectos/actualizar_line_art",
                    data: {
                        "setear": "1",
                        "json_order": JSON.stringify(a)
                    },
                    method: "POST",
                    beforeSend: function (xhr) {
                        cargandonoti = $.notify({
                            title: "Guardando:",
                            message: "Se Esta Guardando el orden."
                        }, {
                            z_index: 1052,
                            allow_dismiss: true,
                            showProgressbar: true,
                            type: 'warning'
                        });
                    }
                })
                .done(function (data) {
                    actualizar_select();
                    var datos = data.split(';');
                    cargandonoti.update('progress', '100');
                    cargandonoti.close();

                    $.notify({
                        title: "Guardado:",
                        message: "Se ha Guardado el orden de las Lineas."
                    }, {
                        z_index: 1052,
                        allow_dismiss: true,
                        type: 'success'

                    });

                });
        });

    });
</script>
<!-- Google analytics script-->
<script type="text/javascript">
    $(document).ready(function () {

        $('#art_guardar').click(function () {
            save_art();
        });

        function iva(pvp)
        {
                    var pvp_wzero = parseFloat(pvp);
                    var obt_iva = (pvp_wzero * 0.<?= $this->session->userdata('iva') ?>) +
                            pvp_wzero;
                    // console.log(pvp); console.log(pvp_wzero); console.log(obt_iva);
                    $('#art_iva').val(obt_iva.toFixed(2));
        }

        function costo_pro(pvp,cos)
        {
                var costo_wzero = parseFloat(cos);
                var pvp_wzero = parseFloat(pvp);
                var obt_costopro = (costo_wzero / pvp_wzero) * 100;
                var fix_costopro = obt_costopro.toFixed(2);
                // console.log(costo_wzero); console.log(pvp_wzero); console.log(obt_costopro);
                // console.log(fix_costopro);
                $('#art_cosp').val(fix_costopro);
        }

        function art_editar(id)
        {
            var cargandonoti;
            input_empty();
                       $.ajax({
                                url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/3",
                                data: {
                                    "idarticulos": id
                                },
                                method: "POST",
                                dataType: "json",
                                beforeSend: function (xhr) {
                                    cargandonoti = $.notify({
                                        title: "Cargando:",
                                        message: "Cargando Articulo a Editar."
                                    }, {
                                        z_index: 1052,
                                        allow_dismiss: true,
                                        showProgressbar: true,
                                        type: 'warning'
                                    });
                                }
                            })
                            .done(function (data) {
                                var dato = data[0];
                                $.each(data['materiaprima'], function (key, val) {
                                    var datotes = data['materiaprima'][key];
                                    $('#'+datotes['idmpfk']+'_cantmp').val(datotes['cantxart']);//cant
                                    $('#'+datotes['idmpfk']+'_idmpp').prop("checked",true); //id
                                $('#'+datotes['idmpfk']+'_cantmp').removeAttr('disabled');
                                });
                                $('#art_name').val(dato.art_name);
                                $('#art_descrip').val(dato.art_descrip);
                                $('#art_pvp1').val(dato.art_pvp1);
                                //$('#art_iva').val(dato.art_descrip);
                                $('#art_costo').val(dato.art_costo);
                                //$('#cosp').val(dato.art_descrip);
                                iva(dato.art_pvp1);
                                costo_pro(dato.art_pvp1,dato.art_costo);
                                $('#name_art').html('- '+dato.art_name);
                                if(dato.art_isiva){
                                $('.checkss').addClass('active');
                                $('#art_isiva').prop( "checked" , true);

                                }else{
                                $('.checkss').removeClass('active');
                                $('#art_isiva').prop('checked',false);

                                }
                                $('#name_art').attr('data-id',id);
                                $('#inputGroupSelect04').val(dato.art_fkidline);
                                cargandonoti.update('progress', '100');
                                cargandonoti.close();
                                    cargandonoti = $.notify({
                                        title: "Cargado:",
                                        message: "Cargado con Exito."
                                    }, {
                                        z_index: 1052,
                                        allow_dismiss: true,
                                        type: 'success'
                                    });
                            });
        }

        function art_del() 
        {

            var idarticulos = $('#name_art').attr('data-id');
            if (idarticulos == '0') {
            swal("¡Error!", "Debes seleccionar un artículo para eliminarlo.", "error");
            }else{
            swal("¿Estás Seguro de eliminar el artículo " + $('#name_art').html() + "?", {
                buttons: {
                    cancel: "¡No!", catch  : {
                        text : "¡Eliminar!",
                        value: "catch"
                    }
                }
            }).then((value) => {
                switch (value) {

                    case "catch":
                            $.ajax({
                                url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/5",
                                data: {
                                    "idarticulos": idarticulos,

                                },
                                method: "POST",
                                beforeSend: function (xhr) {
                                    cargandonoti = $.notify({
                                        title: "Eliminando:",
                                        message: "Se esta Eliminando el Artículo :(."
                                    }, {
                                        z_index: 1052,
                                        allow_dismiss: true,
                                        showProgressbar: true,
                                        type: 'warning'
                                    });
                                }
                            })
                            .done(function (data) {
                                $('#art_name').val('');
                                $('#art_descrip').val('');
                                $('#art_pvp1').val('');
                                $('#art_iva').val('');
                                $('#art_costo').val('');
                                $('#cosp').val('');
                                $('#name_art').html('');
                                $('#name_art').attr('data-id','0');
                                $('#inputGroupSelect04').val(0);
                                var datos = data.split(';');
                                cargandonoti.update('progress', '100');
                                cargandonoti.close();
                                swal("¡Listo!", "El articulo ha sido eliminado correctamente.", "success");
                                input_empty();
act_bus($('.bootpag li.active a').html());
                            });
                        break;

                    default:
                        swal("Tu Artículo esta seguro :).");

                }
            });

            }

        }

        function input_empty()
        {
                                $('#art_name').val('');
                                $('#art_descrip').val('');
                                $('#art_pvp1').val('');
                                $('#art_iva').val('');
                                $('#art_costo').val('');
                                $('#cosp').val('');
                                $('#name_art').html('');
                                $('#name_art').attr('data-id','0');
                                $('#inputGroupSelect04').val(0);
                                $('.cantclass').val('');
                                $('.cantclass').attr('disabled','disabled');
                                $('.mpp_lista').prop('checked',false);
                                
                                
        }

        $('#new_art').click(function () {
            input_empty();
        });

        $('#del_art').click(function () {
            art_del();
        });

        // init bootpag
        function act_bus(limit)
        {
            var cc = '<div class="progress mb-2"><div class="progress-bar progress-bar-striped bg-da' +
                    'nger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemi' +
                    'n="0" aria-valuemax="100"></div> </div>';
            var buscar = $('#art_bus').val();
                        var list_art = '';

            $
                    .ajax({
                        url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/2",
                        data: {
                            "art_bus": buscar,
                            "limit": limit
                        },
                        method: "POST",
                        dataType: "json",
                        beforeSend: function (xhr) {
                            $('#art_lista').html(cc);
                        }
                    })
                    .done(function (data) {

                        var datos = data['page'];
                        var art_name = data[0]['art_name'];
                        if (data.bus == 1) {
                            $('#page-selection')
                                .bootpag({total: datos, maxVisible: 8})
                                .on("page", function (event,
                                /* page number here */
                                num) {
                                    
                                    $
                                        .ajax({
                                            url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/2",
                                            data: {
                                                "art_bus": buscar,
                                                "limit": num
                                            },
                                            method: "POST",
                                            dataType: "json",
                                            beforeSend: function (xhr) {
                                                $('#art_lista').html(cc);
                                            }
                                        })
                                        .done(function (data) {

                                            var datos = data['page'];
                                            var art_name = data[0]['art_name'];
                                            if (data.bus == 1) {
                                                $.each(data, function (key, val) {
                                                    //console.log(key+"----"+val);

                                                    if (key == 'page' || key == 'bus') {} else {

                                                        //console.log(keye+"----"+vale);
                                                        list_art += "<li data-id='" + data[key]['idarticulos'] + "' class='productos art_pro'> " +
                                                                data[key]['art_name'] + "<br> </li>";

                                                    }

                                                });

                                            } else {

                                                $('#art_lista').html(list_art);
                                            }
                                            $('#art_lista').html(list_art);
                                            $('.art_pro').click(function () {

                                                art_editar($(this).attr('data-id'))

                                            });

                                        });
                                        list_art = '';
                                });
                            $.each(data, function (key, val) {
                                //console.log(key+"----"+val);

                                if (key == 'page' || key == 'bus') {} else {

                                    //console.log(keye+"----"+vale);
                                    list_art += "<li data-id='" + data[key]['idarticulos'] + "' class='productos art_pro'> " +
                                            data[key]['art_name'] + "<br> </li>";

                                }

                            });

                        } else {}
                                           $('#art_lista').html(list_art);
                                            $('.art_pro').click(function () {

                                                art_editar($(this).attr('data-id'))

                                            });
                                            });

        }

        $('#art_bus').keyup(function () {
            var buscar = $('#art_bus').val();
            var c_buscar = buscar.length;
            var b_buscar = $('#art_bus');
            var list_art = '';
            var sumaa = 0;
            var cc = '<div class="progress mb-2"><div class="progress-bar progress-bar-striped bg-da' +
                    'nger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemi' +
                    'n="0" aria-valuemax="100"></div> </div>';
            if (c_buscar >= 3) {

                $
                    .ajax({
                        url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/2",
                        data: {
                            "art_bus": buscar,
                            "limit": "1"
                        },
                        method: "POST",
                        dataType: "json",
                        beforeSend: function (xhr) {
                            $('#art_lista').html(cc);
                        }
                    })
                    .done(function (data) {

                        var datos = data['page'];
                        var art_name = data[0]['art_name'];
                        if (data.bus == 1) {
                            $('#page-selection')
                                .bootpag({total: datos, maxVisible: 8})
                                .on("page", function (event,
                                /* page number here */
                                num) {
                                    
                                    $
                                        .ajax({
                                            url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/2",
                                            data: {
                                                "art_bus": buscar,
                                                "limit": num
                                            },
                                            method: "POST",
                                            dataType: "json",
                                            beforeSend: function (xhr) {
                                                $('#art_lista').html(cc);
                                            }
                                        })
                                        .done(function (data) {

                                            var datos = data['page'];
                                            var art_name = data[0]['art_name'];
                                            if (data.bus == 1) {
                                                $.each(data, function (key, val) {
                                                    //console.log(key+"----"+val);

                                                    if (key == 'page' || key == 'bus') {} else {

                                                        //console.log(keye+"----"+vale);
                                                        list_art += "<li data-id='" + data[key]['idarticulos'] + "' class='productos art_pro'> " +
                                                                data[key]['art_name'] + "<br> </li>";

                                                    }

                                                });

                                            } else {

                                                $('#art_lista').html(list_art);
                                            }
                                            $('#art_lista').html(list_art);
                                            $('.art_pro').click(function () {

                                                art_editar($(this).attr('data-id'))

                                            });

                                        });
                                        list_art = '';
                                });
                            $.each(data, function (key, val) {
                                //console.log(key+"----"+val);

                                if (key == 'page' || key == 'bus') {} else {

                                    //console.log(keye+"----"+vale);
                                    list_art += "<li data-id='" + data[key]['idarticulos'] + "' class='productos art_pro'> " +
                                            data[key]['art_name'] + "<br> </li>";

                                }

                            });

                        } else {}
                        $('#art_lista').html(list_art);
                        $('.art_pro').click(function () {

                            art_editar($(this).attr('data-id'))
            
                        });     
                    });

            }
        });

        function save_art() {

            var art_name,
                art_descrip,
                art_pvp1,
                art_costo,
                art_fkline,
                art_isiva,
                isupdate,
                cargandonoti;
            var mp_listacheck;
            var ii = 0;
            mp_listacheck = '';
            $(".mpp_lista:checked").each(function() {
             mp_listacheck += $(this).attr('data-id')+';'+$('#'+$(this).attr('data-id')+'_cantmp').val()+'-';
             
            });
            art_name = $('#art_name').val();
            art_descrip = $('#art_descrip').val();
            art_isiva = $('#art_isiva').is(':checked');
            art_pvp1 = $('#art_pvp1').val();
            art_costo = $('#art_costo').val();
            art_fkline = $('#inputGroupSelect04').val();
            isupdate = $('#name_art').attr('data-id');
            if (art_name.trim() == '' || art_descrip.trim() == '' || art_pvp1.trim() == '' || art_costo.trim() == '' || art_fkline == '0') {
                //poner error datos en blanco.
                $.notify({
                    title: "Error:",
                    message: "Debes Llenar todos los datos para Guardar el Articulo  ."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'danger'

                });
                // alert('vacios');
            } else {
                switch (isupdate) {
                    case '0':
                        //guardar
                        $
                            .ajax({
                                url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/1",
                                data: {
                                    "art_name": art_name.toUpperCase(),
                                    "art_isiva": art_isiva,
                                    "art_pvp1": art_pvp1,
                                    "art_costo": art_costo,
                                    "art_fkidline": art_fkline,
                                    "art_descrip": art_descrip,
                                    "art_status": "1",
                                    "materiaprima":mp_listacheck.substring(-1,mp_listacheck.length-1)
                                },
                                method: "POST",
                                beforeSend: function (xhr) {
                                    cargandonoti = $.notify({
                                        title: "Guardando:",
                                        message: "Se esta Guardando el Articulo."
                                    }, {
                                        z_index: 1052,
                                        allow_dismiss: true,
                                        showProgressbar: true,
                                        type: 'warning'
                                    });
                                }
                            })
                            .done(function (data) {
                                $('#art_name').val('');
                                $('#art_descrip').val('');
                                $('#art_pvp1').val('');
                                $('#art_iva').val('');
                                $('#art_costo').val('');
                                $('#cosp').val('');
                                $('#name_art').html('');
                                $('#inputGroupSelect04').val(0);
                                $('.cantclass').val('');
                                $('.cantclass').attr('disabled','disabled');
                                $('.mpp_lista').prop('checked',false);
                                var datos = data.split(';');
                                cargandonoti.update('progress', '100');
                                cargandonoti.close();
                                swal("¡Listo!", "El articulo ha sido guardado correctamente.", "success");

                            });

                        break;
                    case '-1':
                        //eliminar
                        break;
                    default:
                    var idarticulos = $('#name_art').attr('data-id');
                                    swal(
                    "¿Deseas Editar el Articulo " + $('#name_art').html() +
                            "?",
                    {
                        buttons: {
                            cancel: "¡No!", catch  : {
                                text : "¡Editar!",
                                value: "catch"
                            }
                        }
                    }
                ).then((value) => {
                    switch (value) {

                        case "catch":

                             $
                            .ajax({
                                url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_art/4",
                                data: {
                                    "art_name": art_name.toUpperCase(),
                                    "art_isiva": art_isiva,
                                    "art_pvp1": art_pvp1,
                                    "art_costo": art_costo,
                                    "art_fkidline": art_fkline,
                                    "art_descrip": art_descrip,
                                    "idarticulos":idarticulos,
                                     "materiaprima":mp_listacheck.substring(-1,mp_listacheck.length-1)
                                },
                                method: "POST",
                                beforeSend: function (xhr) {
                                    cargandonoti = $.notify({
                                        title: "Guardando:",
                                        message: "Se esta Guardando el Articulo."
                                    }, {
                                        z_index: 1052,
                                        allow_dismiss: true,
                                        showProgressbar: true,
                                        type: 'warning'
                                    });
                                }
                            })
                            .done(function (data) {
                                $('#name_art').attr('data-id','0');
                                $('#art_name').val('');
                                $('#art_descrip').val('');
                                $('#art_pvp1').val('');
                                $('#art_iva').val('');
                                $('#art_costo').val('');
                                $('#cosp').val('');
                                $('#name_art').html('');
                                $('#inputGroupSelect04').val(0);
                                $('.cantclass').val('');
                                $('.cantclass').attr('disabled','disabled');
                                $('.mpp_lista').prop('checked',false);
                                act_bus($('.bootpag li.active a').html());
                                var datos = data.split(';');
                                cargandonoti.update('progress', '100');
                                cargandonoti.close();
                                swal("¡Listo!", "El articulo ha sido guardado correctamente.", "success");

                            });


                            break;

                        default:
                            swal("No guardado.");

                    }
                });
                        //editar
                        break;
                }
            }
        }

    });
</script>

</body>
</html>