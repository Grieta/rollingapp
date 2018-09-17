<?php include('includes/header.php'); ?>
</head>
<?php include('includes/nav.php'); ?>
<?php include('includes/menu.php'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/nestable/nestable.css?1423393667" />
<!-- Sidebar menu-->

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-dashboard"></i>
                Añadir Combos
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="fa fa-home fa-lg"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Añadir Combos</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="tile ">
                <!--h3 class="tile-title">Create a beautiful dashboard</h3-->
                <h3 class="tile-title">Combos 
                    <span id="name_art" data-id="0"></span></h3>
                <div class="tile-body">
                    <form class="">
                        <div class="form-group input-row">
                            <div class="input-group col-md-12">
                                <select
                                    class="custom-select"
                                    id="inputGroupSelect04"
                                    aria-label="Example select with button addon">
                                    <?= $sel_lines ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group form-row">

                            <div class="input-group col-md-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                                </div>
                                <input
                                    id="art_name"
                                    type="text"
                                    style="text-transform: uppercase;"
                                    class="form-control"
                                    aria-label="Nombre"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group col-md-7">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descripción</span>
                                </div>
                                <textarea id="art_descrip" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form>
<div class=" row">
                        <div class="input-group  col-md-4" data-toggle="buttons">
                            <label class="btn btn-primary checkss   active">
                                <input
                                    id="art_isiva"
                                    style="display: none"
                                    type="checkbox"
                                    autocomplete="off"
                                    checked="checked">
                                <span class="fa fa-check fa-check fa-lg" style="font-size: 2em"></span>
                           

                            </label>
                            <label class="text-center checkss-label">
                                INCLUIR IVA
                            </label>
                                                    </div>

                                    <div class="input-group-lg input-group col-md-7">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">PVP $</span>
                                        </div>
                                        <input id="art_pvp1" type="text" placeholder="PVP" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

        

                            </div>
                        </div>
                        <br>
                                                <div class="row">

                                <div class="col-md-6">

                        <div class="table-responsive">
                            <table class="table" id="objetocombos">
                                <thead>
                                        <th class="hidden" data-field="id">ID</th>
                                        <th class="centrartdhori" data-field="Objeto">OBJETO</th>
                                        <th data-field="Cantidad">CANTIDAD</th>
                                        <th class="hidden" data-field="Valor">VALOR</th>
                                    </tr>
                                </thead>
                                <tbody >
                                </tbody>
                            </table>
                         </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input class="form-control" id="art_bus" type="text"></div>
                                    <ul class="list-productos-horizontal" id="art_lista"></ul>
                            <div id="art_sel" class="" ></div>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="tile-footer">
                    <button id="art_guardar" class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-secondary" id="del_art" href="#">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i>Eliminar</button>&nbsp;&nbsp;&nbsp;<button id="new_art" class="btn btn-outline-info" href="#">
                        <i class="fa fa-fw fa-lg fa-plus-circle"></i>Nuevo</button>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            
          
                        <div class="col-md-12">
                <div class="tile ">
                    <h3 class="tile-title">Editar Combos</h3>
                    <div class="tile-body no-padding">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input
                                type="text"
                                id="co_bus"
                                class="form-control"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-12">
                            <ul class="list-productos-horizontal" id="co_lista"></ul>
                        </div>
                    </div>
                    <div class="tile-footer ">
                        <div id="co_sel" class=""></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
  </div>
</main><!-- Essential javascripts for application to work-->
<?php include('includes/essencial_js.php'); ?>
<script src="<?php echo base_url(); ?>assets/js/libs/nestable/jquery.nestable.js"></script>
<script src="<?php echo base_url(); ?>styles/js/custom/bt.js"></script>

<script src="<?php echo base_url(); ?>assets/js/core/demo/DemoUILists.js"></script>
<!-- motor javascript para los calculos y controladores de aticulos y lineas -->
<script >

    jQuery(document).ready(function () {
        $('#art_name').keyup(function () {
            var name = $('#art_name').val();
            if (name == '') {
                $('#name_art').html('');
            } else {
                $('#name_art').html('- ' + name.toUpperCase());

            }
        });
        $('#objetocombos').bootstrapTable({uniqueId: "id"});
        function art_del() 
        {

            var idarticulos = $('#name_art').attr('data-id');
            if (idarticulos == '0') {
            swal("¡Error!", "Debes seleccionar un artículo para eliminarlo.", "error");
            }else{
            swal("¿Estás Seguro de eliminar el Combo " + $('#name_art').html() + "?", {
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
                                url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_co/5",
                                data: {
                                    "idarticulos": idarticulos,

                                },
                                method: "POST",
                                beforeSend: function (xhr) {
                                    cargandonoti = $.notify({
                                        title: "Eliminando:",
                                        message: "Se esta Eliminando el Combo :(."
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
                                $('#name_art').html('');
                                $('#name_art').attr('data-id','0');
                                $('#inputGroupSelect04').val(0);
                                $('#objetocombos').bootstrapTable('removeAll');
                                var datos = data.split(';');
                                cargandonoti.update('progress', '100');
                                cargandonoti.close();
                                swal("¡Listo!", "El Combo ha sido eliminado correctamente.", "success");

                            });
                        break;

                    default:
                        swal("Tu Combo esta seguro :).");

                }
            });

            }

        }

        function input_empty()
        {
                                $('#art_name').val('');
                                $('#art_descrip').val('');
                                $('#art_pvp1').val('');
                                $('#name_art').html('');
                                $('#name_art').attr('data-id','0');
                                $('#inputGroupSelect04').val(0);
                                $('#objetocombos').bootstrapTable('removeAll');
        }

        $('#new_art').click(function () {
            input_empty();
        });

        $('#del_art').click(function () {
            art_del();
        });
        function quitar(x) {
            var data = x
                .parent()
                .prev()
                .parent()
                .attr("data-uniqueid");
            $('#objetocombos').bootstrapTable({uniqueId: "id"});

            $('#objetocombos').bootstrapTable('removeByUniqueId', data);
            $('.quitar').click(function () {
                quitar($(this));
            });
        }
        $('#art_guardar').click(function () {
        var idarticulos = $('#name_art').attr('data-id');
            if (idarticulos == '0') {
                save_co();
            }else{
                edit_co();
            }

        });
        $('form').submit(function () {
            return false;
        });
        function save_co() {
            var cargandonoti;
            var line_co = $('#inputGroupSelect04');
            var name_co = $('#art_name');
            var descrip_co = $('#art_descrip');
            var pvp1_co = $('#art_pvp1');
            var art_isiva = $('#art_isiva').is(':checked');
            var tabla_co = $('#objetocombos');
            if (line_co.val() == 0) {
                $.notify({
                    title: "Error:",
                    message: "Debes Llenar todos los datos para Guardar el Combo."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'danger'

                });
                return false;

            }
            $
                .ajax({
                    url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_co/2",
                    data: {
                        "art_fkidline": line_co.val(),
                        "art_name": name_co
                            .val()
                            .toUpperCase(),
                        "art_descrip": descrip_co.val(),
                        "art_pvp1": pvp1_co.val(),
                        "art_isiva": art_isiva,
                        "art_status":"1",
                        "tabla_co": JSON.stringify(tabla_co.bootstrapTable('getData'))

                    },
                    method: "POST",
                    dataType: "json",
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

                    if (data == '0') {
                        cargandonoti.update('progress', '100');
                        cargandonoti.close();

                        $.notify({
                            title: "Error:",
                            message: "Debes Llenar todos los datos para Guardar el Combo."
                        }, {
                            z_index: 1052,
                            allow_dismiss: true,
                            type: 'danger'

                        });
                    } else if (data == '1') {
                        cargandonoti.update('progress', '100');
                        cargandonoti.close();
                        swal("¡Listo!", "El Combo ha sido guardado correctamente.", "success");
             line_co.val(0);
             name_co.val('');
             name_co.keyup();
             descrip_co.val('');
             pvp1_co.val('');
             tabla_co.bootstrapTable('removeAll');

                    }

                });
        }
        function edit_co() {
             var idarticulos = $('#name_art').attr('data-id');
                                    swal(
                    "¿Deseas Editar el Combo " + $('#name_art').html() +
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
            var line_co = $('#inputGroupSelect04');
            var name_co = $('#art_name');
            var descrip_co = $('#art_descrip');
            var pvp1_co = $('#art_pvp1');
            var art_isiva = $('#art_isiva').is(':checked');
            var tabla_co = $('#objetocombos');
                             $
                            .ajax({
                                url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_co/4",
                                data: {
                                    "idarticulos" : idarticulos,
                        "art_fkidline": line_co.val(),
                        "art_name": name_co
                            .val()
                            .toUpperCase(),
                        "art_descrip": descrip_co.val(),
                        "art_pvp1": pvp1_co.val(),
                        "art_isiva": art_isiva,
                        "tabla_co": JSON.stringify(tabla_co.bootstrapTable('getData'))
                                },
                                method: "POST",
                                beforeSend: function (xhr) {
                                    cargandonoti = $.notify({
                                        title: "Guardando:",
                                        message: "Se esta Guardando el Combo."
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
                                $('#co_bus').keyup();
                                var datos = data.split(';');
                                cargandonoti.update('progress', '100');
                                cargandonoti.close();
                                swal("¡Listo!", "El Combo ha sido Editado correctamente.", "success");

                            });
                                                        break;

                        default:
                            swal("No guardado.");

                    }
                                    });

        }
        function acc_editar(id, prox, name, object) {

            switch (prox) {
                case "combos":
                            var cargandonoti;
            var line_co = $('#inputGroupSelect04');
            var name_co = $('#art_name');
            var descrip_co = $('#art_descrip');
            var pvp1_co = $('#art_pvp1');
            var art_isiva = $('#art_isiva').is(':checked');
            var tabla_co = $('#objetocombos');
                            $
                .ajax({
                    url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_co/3",
                    data: {
                        "idcombos": id,


                    },
                    method: "POST",
                    dataType: "json",
                    beforeSend: function (xhr) {
                        cargandonoti = $.notify({
                            title: "Cargando:",
                            message: "Se esta Cargando el Combo."
                        }, {
                            z_index: 1052,
                            allow_dismiss: true,
                            showProgressbar: true,
                            type: 'warning'
                        });
                    }
                })
                .done(function (data) {
                    cargandonoti.update('progress', '100');
                    cargandonoti.close();
                                        tabla_co.bootstrapTable('removeAll');

                    //swal("¡Listo!", "El Combo ha sido Cargado correctamente.", "success");
                      $.each(data, function (key, val) {
                                                                          var vall;
                                                if(data[key][0]['art_isiva']=='true')
                                                {
                                                    vall = (data[key][0]['art_pvp1'] * 1.<?= $this->session->userdata('iva') ?>);
                                                                    $('#art_isiva').prop('checked', true);
                                             $('.checkss').addClass('active');

                                                }else{
                                                    vall = data[key][0]['art_pvp1'];
                    $('#art_isiva').prop('checked', false);
                                $('.checkss').removeClass('active');

                                                }
                    line_co.val(data[key][0]['art_fkidline']);
                    name_co.val(data[key][0]['art_name']);
                    name_co.keyup();
                    descrip_co.val(data[key][0]['art_descrip']);
                    pvp1_co.val(vall.toFixed(2));
                    $('#name_art').attr('data-id',data[key][0]['idcombos']);
                        $.each(data[key][1], function (keyx, valx) {

                        var mydata = {
                            "id": data[key][1][keyx]['idarticulos'],
                            "Objeto": '<i class="fa fa-times-circle fa-lg quitar" style="color:red;" aria-hidden="tru' +
                                    'e"></i> ' + data[key][1][keyx]['art_name'],
                            "Cantidad": '<input  class="form-control cant" id="' + data[key][1][keyx]['idarticulos'] + '" value="1" type="number">',
                            "Valor": data[key][1][keyx]['cocant']
                        };
                        var newdata = [];
                        newdata.push(mydata);
                        $('#objetocombos').bootstrapTable("append", mydata);

                      });
                      });
                    $('.quitar').click(function () {
                        quitar($(this));
                    });
                });
                    break;
                case "art":
                    $('#objetocombos').bootstrapTable({uniqueId: "id"});
                    if ($('#objetocombos').bootstrapTable('getRowByUniqueId', id) == null) {

                        var mydata = {
                            "id": id,
                            "Objeto": '<i class="fa fa-times-circle fa-lg quitar" style="color:red;" aria-hidden="tru' +
                                    'e"></i> ' + name,
                            "Cantidad": '<input  class="form-control cant" id="' + id + '" value="1" type="number">',
                            "Valor": "1"
                        };
                        var newdata = [];
                        newdata.push(mydata);
                        $('#objetocombos').bootstrapTable("append", mydata);
                    } else {
                        var data = $('#objetocombos')
                            .find('tbody')
                            .find('#' + id)
                            .val();

                        var valor = parseInt(data) + 1;
                        var mydata = {
                            "id": id,
                            "Objeto": '<i class="fa fa-times-circle fa-lg quitar" style="color:red;" aria-hidden="tru' +
                                    'e"></i> ' + name,
                            "Cantidad": '<input  class="form-control cant " id="' + id + '" value="' + valor + '" type=' +
                                    '"number">',
                            "Valor": valor
                        };

                        $('#objetocombos').bootstrapTable('updateByUniqueId', {
                            id: id,
                            row: mydata
                        });

                    }
                    $('.quitar').click(function () {
                        quitar($(this));
                    });
                    break;
                default:
                    break;
            }

        }
        $('#co_bus').keyup(function () {
            var buscar = $(this).val();
            if (buscar.length >= 3 && buscar.trim() != "") {
                act_bus(
                    1,
                    $(this),
                    $('#co_sel'),
                    $('#co_lista'),
                    "co_pro",
                    $('.co_pro'),
                    "combos"
                );

            }

        });
        $('#art_bus').keyup(function () {
            var buscar = $(this).val();
            if (buscar.length > 3 && buscar.trim() != "") {
                act_bus(
                    1,
                    $(this),
                    $('#art_sel'),
                    $('#art_lista'),
                    "art_pro",
                    $('.art_pro'),
                    "art"
                );

            }

        });

        function act_bus(limit, busqueda, numeros, lista, classpro, proxx, objeto) {
            var cc = '<div class="progress mb-2"><div class="progress-bar progress-bar-striped bg-da' +
                    'nger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemi' +
                    'n="0" aria-valuemax="100"></div> </div>';
            var buscar = busqueda.val();
            var list_art = '';

            $
                .ajax({
                    url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_co/1",
                    data: {
                        "art_bus": buscar,
                        "limit": limit,
                        "objeto": objeto

                    },
                    method: "POST",
                    dataType: "json",
                    beforeSend: function (xhr) {
                        lista.html(cc);
                    }
                })
                .done(function (data) {

                    var datos = data['page'];
                    var art_name = data[0]['art_name'];
                    if (data.bus == 1) {
                        numeros
                            .bootpag({total: datos, maxVisible: 8})
                            .on("page", function (event,
                            /* page number here */
                            num) {
                                list_art = '';

                                $
                                    .ajax({
                                        url: "<?= base_url(); ?>BtnDirectos/add_upp_edit_co/1",
                                        data: {
                                            "art_bus": buscar,
                                            "limit": num,
                                            "objeto": objeto
                                        },
                                        method: "POST",
                                        dataType: "json",
                                        beforeSend: function (xhr) {
                                            lista.html(cc);
                                        }
                                    })
                                    .done(function (data) {

                                        var datos = data['page'];
                                        var art_name = data[0]['art_name'];
                                        if (data.bus == 1) {
                                            $.each(data, function (key, val) {
                                                //console.log(key+"----"+val);

                                                if (key == 'page' || key == 'bus') {} else {
                                                var vall;
                                                if(data[key]['art_isiva']=='true')
                                                {
                                                    vall = (data[key]['art_pvp1'] * 1.<?= $this->session->userdata('iva') ?>);
                                                }else{
                                                    vall = data[key]['art_pvp1'];

                                                }
                                                

                                                    console.log(data[key]['art_isiva']+"----"+vale);
                                                    list_art += "<li data-id='" + data[key]['idarticulos'] + "' class='productos " +
                                                            classpro + "'> " + data[key]['art_name'] + " "+ vall.toFixed(3) +"<br> </li>";

                                                }

                                            });

                                        } else {

                                            lista.html(list_art);
                                        }
                                        lista.html(list_art);
                                        $('.art_pro').click(function () {

                                            acc_editar($(this).attr('data-id'), "art", $(this).html(), $(this));
                                        });
                                        $('.co_pro').click(function () {

                                            acc_editar($(this).attr('data-id'), "combos", $(this).html(), $(this));
                                        });
                                    });
                                list_art = '';
                            });
                        $.each(data, function (key, val) {
                            //console.log(key+"----"+val);

                            if (key == 'page' || key == 'bus') {} else {

                                                var vall;
                                                if(data[key]['art_isiva']=='true')
                                                {
                                                    vall = (data[key]['art_pvp1'] * 1.<?= $this->session->userdata('iva') ?>);
                                                }else{
                                                vall = data[key]['art_pvp1'];
                                                }
                                                

                                                    list_art += "<li data-id='" + data[key]['idarticulos'] + "' class='productos " +
                                                            classpro + "'> " + data[key]['art_name'] + " "+ vall.toFixed(2) +"<br> </li>";

                            }

                        });

                    } else {}
                    lista.html(list_art);

                    $('.art_pro').click(function () {

                        acc_editar($(this).attr('data-id'), objeto, $(this).html());
                    });
                    $('.co_pro').click(function () {

                        acc_editar($(this).attr('data-id'), objeto, $(this).html());
                    });

                });

        }

    });
</script>
<!-- Google analytics script-->


</body>
</html>