<?php include ('includes/header.php');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/autocomplete.css">

</head>
<?php include ('includes/nav.php');?>
<?php include ('includes/menu.php')?>

<!-- Sidebar menu-->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Remover Inventario</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Remover Inventario</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="tile cambiocolor no-padding" >
                <!--h3 class="tile-title">Create a beautiful dashboard</h3-->

                <div class="padding-special" >
                    <ul class="list-productos" id="pro_listas" >
                        <?php 
                        foreach ($materiaprima as $mp) {
                            if($mp->mp_nombre == '')
                            {

                            }else{
                        ?>
                        <li id='mp_<?= $mp->idmateriaprima ?>'data-id='<?= $mp->idmateriaprima ?>' class='productos' style="vertical-align: middle;padding: 20px 0;"><p><?= $mp->mp_nombre ?></p><br><b><p class="pri"><?= $mp->mp_cant ?></p>-<p class="seg">0</p></b></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                    
                </div>
            </div>


        </div>
        <div class="col-md-4">
            <div class="tile">
                <div class="tile-title-w-btn">
              <h3 class="title">Remover Inventario</h3>
              <p><button id="hacer_inv" class="btn btn-primary icon-btn"><i class="fa fa-plus"></i>Remover</button></p>
            </div>
                <div class="table-responsive table-striped">
                    <table class="table" id="tablaped">
                        <thead>
                        <tr>
                            <th class="hidden" data-field="id">Id</th>
                            <th class="hidden" data-field="cantn">cant</th>
                            <th data-field="pro">Materia Prima</th>
                            <th data-field="cant">Cant.</th>
                            <th data-field="op">Op.</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
            <div class="modal fade" id="add_inv"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog  " style="" >
 
          <div class="modal-content " style="padding: 10px;" >
            <button type="button" style="text-align:  right;margin-right:  10px;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                    <label for="motivo">Motivo</label>
                    <input value="0" class="form-control" name="motivo" id="motivo" type="text" aria-describedby="motivohelp" placeholder="Ejem: Error de tipeo Inventario #30"><small class="form-text text-muted" id="motivohelp">Detalle el Motivo del Egreso.</small>
                  </div>
            <form id="newinv" class="">
                  <div class="form-group hidden">
                    <label for="base0">Base 0%</label>
                    <input value="0" class="form-control" name="base0" id="base0" type="number" aria-describedby="base0help" placeholder="Ejem: 10.50"><small class="form-text text-muted" id="base0help">Base de la Factura con 0% de iva.</small>
                  </div>
                  <div class="form-group hidden">
                    <label for="base12">Base <?= $this->session->userdata('iva') ?>%</label>
                    <input value="0" class="form-control" name="base12" id="base12" type="number" aria-describedby="base12help" placeholder="Ejem: 10.50"><small class="form-text text-muted" id="base12help">Base de la Factura con <?= $this->session->userdata('iva') ?>% de iva no agregado.</small>
                  </div>
                  <div class="form-group hidden">
                    <label for="iva">Iva <?= $this->session->userdata('iva') ?>%</label>
                    <input value="0" class="form-control" name="iva" id="iva" type="number" aria-describedby="ivahelp" placeholder="Ejem: 2.50"><small class="form-text text-muted" id="ivahelp">Iva <?= $this->session->userdata('iva') ?>% de la factura.</small>
                  </div>
                <div class="form-group hidden">
                    <label for="total">Total</label>
                    <input value="0" class="form-control" name="total" id="total" type="number" aria-describedby="totalhelp" placeholder="Ejem: 150.50"><small class="form-text text-muted" id="totalhelp">El Total de la Factura.</small>
                  </div>
                  <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Subir Inventario</button>
            </div>
            </form>
                        </div>

    </div>
     
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
</div>
   
</main>
<!-- Essential javascripts for application to work
<div class="toggle lg">
                  <label>
                    <input type="checkbox"><span class="button-indecator"></span>
                  </label>
                </div>
-->
<?php include ('includes/essencial_js.php');?>
<script src="<?php echo base_url(); ?>assets/js/libs/nestable/jquery.nestable.js"></script>
<script src="<?php echo base_url(); ?>styles/js/custom/bt.js"></script>

<script src="<?php echo base_url(); ?>assets/js/core/demo/DemoUILists.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.autocomplete.js"></script>

<script>
$(document).ready(function () {
    $('#tablaped').bootstrapTable({uniqueId: "id"});
            $('#newinv').submit(function () {
                $.notify({
                    title: "Info:",
                    message: "Guardando ingreso."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'info'

                });
                var form = $(this).serializeArray();
                var mp = $('#tablaped').bootstrapTable('getData');
                $.ajax({
                      type: "POST",
                      url: "<?= base_url(); ?>BtnDirectos/inventarios/rem",
                      data: {datos: form,materialist: JSON.stringify(mp),motivo
                        :$('#motivo').val()},
                      success: success,
                    });
                function success(data) {
                    $.notify({
                    title: "Listo:",
                    message: "Ingreso Guardado."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'success'

                });
                    location.reload();
                }
                return false;
            });
            $('#hacer_inv').click(function () {
                if($('#tablaped').bootstrapTable('getData') == "")
                {
                    $.notify({
                    title: "Error:",
                    message: "Debes Seleccionar al menos una Materia Prima."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'danger'

                });
                }else{
                    $('#add_inv').modal('show');

                }
            });
            $('form').submit(function () {
                return false;
            });
        $('.productos').click(function () {
            $(this).addClass('sel');
            var id_mp = $(this).attr('data-id');
            if($('#tablaped').bootstrapTable('getRowByUniqueId', id_mp) == null)
            {
            var mydata = {
            "id": id_mp,
            "pro": $(this).find('p').html(),
            "op": '<i class="fa fa-times-circle fa-lg quitar" style="color:red;" aria-hidden="true"></i>',
            "cant": '<input  class="form-control cant" data-id="'+id_mp+'" id="canti_' + id_mp + '" value="1" type="number">',
            "cantn": "1"
                        };
                        var newdata = [];
                        newdata.push(mydata);
                        $(this).find('b .seg').html('1');
                        $('#tablaped').bootstrapTable("append", mydata);
            }else{
                    var valor1 = $(this).find('b .seg').html();
                    var valor;
                    valor = parseInt(valor1) + 1;
                            var mydata = {
                                        "id": id_mp,
                                        "pro": $(this).find('p').html(),
                                        "op": '<i class="fa fa-times-circle fa-lg quitar" style="color:red;" aria-hidden="tru' +
                                                'e"></i>',
                                        "cant": '<input  class="form-control cant" id="canti_' + id_mp + '" data-id="'+id_mp+'" value="' + valor + '" type="' +
                                                'number">',
                                        "cantn": valor
                                    };
                        $(this).find('b .seg').html(valor);
                        $('#tablaped').bootstrapTable('updateByUniqueId', {
                            id: id_mp,
                            row: mydata
                        });
            }
                    $('.cant').focusout(function () {
                        act_cant($(this));
                    });
                            $('.quitar').click(function () {
                                quitar($(this));
                            });
        });

        $('.cant').focusout(function () {
            act_cant($(this));
        });

        $('.quitar').click(function () {
            quitar($(this));
        });

        function quitar(obj) {
            var id_mp = obj.parent().parent().find('td').first().html();
            $('#tablaped').bootstrapTable('removeByUniqueId',  id_mp);
            $('#mp_'+id_mp).find('b .seg').html("0");
            $('#mp_'+id_mp).removeClass("sel");
                    $('.quitar').click(function () {
            quitar($(this));
        });
        }

        function act_cant(obj) {
            var id_mp = obj.attr('data-id');
            var cant = obj.val();
            $('#mp_'+id_mp).find('b .seg').html(cant);
        }



});
</script>
<!-- Google analytics script-->

</body>
</html>