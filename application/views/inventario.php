<?php include ('includes/header.php');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/autocomplete.css">

</head>
<?php include ('includes/nav.php');?>
<?php include ('includes/menu.php')?>

<!-- Sidebar menu-->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Inventario</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Inventario</a></li>
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
                        <li id='mp_<?= $mp->idmateriaprima ?>'data-id='<?= $mp->idmateriaprima ?>' class='productos' style="vertical-align: middle;padding: 20px 0;"><p><?= $mp->mp_nombre ?></p><br><b><p class="pri"><?= $mp->mp_cant ?></p>+<p class="seg">0</p></b></li>
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
              <h3 class="title">Añadir Inventario</h3>
              <p><button id="hacer_ped" class="btn btn-primary icon-btn"><i class="fa fa-plus"></i>Añadir</button></p>
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