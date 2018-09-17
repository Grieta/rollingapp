<?php include ('includes/header.php');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/autocomplete.css">

</head>
<?php include ('includes/nav.php');?>
<?php include ('includes/menu.php')?>

<!-- Sidebar menu-->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Ventas</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Ventas</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="tile cambiocolor no-padding" >
                <!--h3 class="tile-title">Create a beautiful dashboard</h3-->
                <ul class="list-categoria" id="lineas_lista">
                <?php 
            
                foreach (json_decode($sel_lines) as $s) {
                ?>
                    <li style="cursor:pointer;font-size:" data-id="<?= $s->id ?>" class="" data-toggle="tooltip" data-placement="top" title="<?= $s->name ?>"><?php
                        $name = $s->name;
    
                            $search = array('-'," " );
                            $name = str_replace($search,"",$name);
                        
                        echo $name;
                         ?></li>
                <?php } ?>
                </ul>
                <div class="padding-special" >
                    <ul class="list-productos" id="pro_listas" >

                    </ul>
                    
                </div>
            </div>


        </div>
        <div class="col-md-5">
            <div class="tile">
                <div class="tile-title-w-btn">
              <h3 class="title">Pedido # <?= $ped_sec ?></h3>
              <p><button id="hacer_ped" class="btn btn-primary icon-btn"><i class="fa fa-plus"></i>Hacer Pedido</button></p>
            </div>
                <div class="table-responsive table-striped">
                    <table class="table" id="tablaped">
                        <thead>
                        <tr>
                            <th class="hidden" data-field="id">Id</th>
                            <th class="hidden" data-field="isiva">isiva</th>
                            <th class="hidden" data-field="tipo">Tipo</th>
                            <th class="hidden" data-field="cantn">cant</th>
                            <th data-field="pro">Producto</th>
                            <th data-field="cant">Cant.</th>
                            <th data-field="pvp">PVP+iva</th>
                            <th data-field="op">Op.</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                        <div class="row">
                             <div class="col-md-6 col-12">
                            </div>
                             <div class="col-md-3 col-6">
                    Base 0%: <br>
                    Base IVA: <br>
                    IVA: <br>
                    TOTAL: <br>
                   </div>
                   <div class="col-md-3 col-6">
                       <p id="base_0" style="display:inline;">$0.00</p><br>
                       <p id="base_iva" style="display:inline;">$0.00</p><br>
                       <p id="iva" style="display:inline;">$0.00</p><br>
                       <p id="total" style="display:inline;">$0.00</p><br>
                   </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Pedido" aria-hidden="true">
  <div class="modal-dialog modal-lg">
<div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title h4" id="myLargeModalLabel">Datos Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="row ">
                <div class="col-md-4">
                  <input id="cedula" type="text" name="cedula" placeholder="9999999999999" class="form-control " title="Cedula">
                </div>
                <div class="col-md-8">
                <input data-id="0" type="text" id="razon" placeholder="Consumidor Final" class="form-control ">  
                </div>
     </div>
     <div class="row">
                <div class="col-md-4" valing="middle">
                    <div class="animated-checkbox">
              <label>
                <input id="valced" type="checkbox" checked><span class="label-text">Validar Cedula</span>
              </label>
            </div>
            </div>

                <div class="col-md-8 ">
                  <p  class="text-success" id="checkced" >
                    <i class="fa fa-check" ></i>Identificación valida.
                  </p>
                </div>
              </div>
     <div class="col-md-12">
     <button class="btn btn-outline-info col-md-12 " id="mordata" style="margin:5px 0;" >Mas Datos >></button>
                </div>
     <div class="row mordatacli">
                <div class="col-md-4">
                  <input id="telefono" type="text" name="telefono" placeholder="Telefono" class="form-control " title="Cedula">
                </div>
                <div class="col-md-4">
                <input type="text" id="correo" placeholder="Correo" class="form-control ">  
                </div>
                <div class="col-md-4">
                <input type="text" id="direcc" placeholder="Dirección" class="form-control ">  
                </div>
     </div>
     <div class="row">
                  <div class="col-md-5">
                    <button type="button" data-toggle="collapse" href="#calculadoraCambio" class="btn btn-default btn-info btn-xs">CALCULADORA</button>
                  </div>
                  <div class="col-md-7 text-right">
                    <!-- ESTO PUEDE CAMBIAR -->
                    <h2 class="">TOTAL A PAGAR: $<p id="tot_pag" style="display:inline;">0.00</p></h2>
                  </div>
                </div>
      </div>
      <div class="collapse collapse-group"  id="calculadoraCambio" >
          <div class="row" style="margin:5px 10px;">
                  <div class="input-group col-md-4">
                      <div class="input-group-prepend">
                    <span class="input-group-text">RECIBE: $</span>
                    </div>
                    <input id="pago_unico_recibe" type="text"placeholder="0.00" class="form-control">
                  </div>
                  </div>
                  <div class="row" style="margin:5px 10px;">
                  <div class="input-group col-md-4">
                      <div class="input-group-prepend">
                    <span class="input-group-text info">CAMBIO: $</span>
                     </div>
                     <input id="cal_tot" disabled type="text"placeholder="-3.00" class="form-control">

                  </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="enviar_ped" class="btn btn-primary">Proceder</button>
      </div>
    </div>
    
  </div>

</div>
</div>
    <div class="modal fade" id="previa_ped" style="z-index: 1080" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog row justify-content-md-center " style="
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important;
        " >
 
          <div class="modal-content " style="max-width: 190px;"  >
            <button type="button" style="text-align:  right;margin-right:  10px;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php 
            date_default_timezone_set('America/Guayaquil');
            setlocale(LC_ALL, "es_ES");
            $fecha = date("Y-m-d H:i:s"); ?>
            <div class="text-factura-i" style="text-align:center;" ><?= $fecha ?></div>
            <div class="text-factura-i" style="text-align:center;" ><?= ucfirst($this->session->userdata('company')) ?></div>
            <br>
            <div class="text-factura-i" style="text-align:center;margin-bottom:5px;" >Pedido #<div class="text-factura-i" id="sec_pedido">12</div></div>
                            

            <table class="table table-borderless text-factura tableta_imprimir" id="table-ped">
                <tbody id="tabla-ped-data">
                    <tr>
                    <td >1</td>
                    <td>Salchipapa</td>

                    </tr>
                    <tr>
                    <td >2</td>
                    <td>Hamburguesa</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-factura-i" style="text-align:center;margin-top:5px;" >User:<div class="text-factura-i"><?= ucfirst($this->session->userdata('name')) ?></div></div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
        <div class="modal fade" id="previa_doc" style="z-index: 1080" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog row justify-content-md-center " style="
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important;
        " >
 
          <div class="modal-content " style="max-width: 190px;"  >
            <button type="button" style="text-align:  right;margin-right:  10px;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php 
                date_default_timezone_set('America/Guayaquil');
                setlocale(LC_ALL, "es_ES");
                $fecha = date("Y-m-d H:i:s"); ?>
            
            <div class="text-factura-i" style="text-align:center;margin-bottom:5px;" ><?= ucfirst($this->session->userdata('company')) ?></div>
            
            <div class="text-factura-i" style="text-align:center;" >Doc #<div class="text-factura-i" id="sec_doc">12</div></div>
            <div class="text-factura-i" style="text-align:left;margin-left:  10px;" >Fecha: <div class="text-factura-i"><?= $fecha ?></div></div>
            <div class="text-factura-i" style="text-align:left;margin-left:  10px;" >Cliente: <div class="text-factura-i razon">Consumidor Final</div></div>
            <div class="text-factura-i" style="text-align:left;margin-left:  10px;" >CI/RUC: <div class="text-factura-i cedula">99999</div></div>
            <div class="text-factura-i" style="text-align:left;margin-left:  10px;" >Telef: <div class="text-factura-i telef"></div></div>
            <div class="text-factura-i" style="text-align:left;margin-left:  10px;margin-bottom:5px;" >Dir: <div class="text-factura-i"></div></div>
            

            <table class="table table-borderless text-factura tableta_imprimir" id="tabla_doc">
                <thead>
                    <tr>
                        <th>CANT</th>
                        <th>DESCRIPCION</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody id="tabla-doc-data">
                    <tr>
                    <td >1</td>
                    <td>Salchipapa</td>
                    <td>$2.00</td>
                    </tr>
                    <tr>
                    <td >2</td>
                    <td>Hamburguesa</td>
                    <td>$5.00</td>
                    </tr>
                    <tr>
                        <td ></td>
                    <th scope="row">Subtotal</th>
                    <td>$7.00</td>
                    </tr>
                    <tr>
                        <td ></td>
                    <th scope="row">BASE <?= $this->session->userdata('iva') ?>%</th>
                    <td>$5.00</td>
                    </tr>
                    <tr>
                        <td ></td>
                    <th scope="row">BASE 0%</th>
                    <td>$0.00</td>
                    </tr>
                    <tr>
                        <td ></td>
                    <th scope="row">IVA <?= $this->session->userdata('iva') ?>%</th>
                    <td>$2.00</td>
                    </tr>
                    <tr>
                        <td ></td>
                    <th scope="row">TOTAL</th>
                    <td>$7.00</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-factura-i" style="text-align:center;margin-top:5px;" >User:<div class="text-factura-i"><?= ucfirst($this->session->userdata('name')) ?></div></div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade in" id="frmImprimir" tabindex="-1" style="">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body" style="padding-left: 10px; padding-right: 10px">
				<button type="button" class="close floating-close" style="margin-right: 0px" data-dismiss="modal" aria-hidden="true">×</button>
                <br>
				<!-- ngRepeat: btn in botones --><div class="row">
					<div class="col-sm-12">
						<div class="btn-group">
							<button id="_btn_i_0" autofocus="autofocus"  class="btn btn-default btn-sm">
								<i style="float:left; margin-right: 5px; font-size: 20px;" class="fa fa-code-fork " ></i> PEDIDO #<i id="ped-num">12</i></button>
							<button tooltip="Vista Previa" data-toggle="modal" data-target="#previa_ped" id="vista-ped" class="btn btn-default btn-sm">
								<i class="fa fa-eye"></i>
							</button>
						</div>
					</div>
                </div><!-- end ngRepeat: btn in botones -->
                <br>
                <div class="row" >
					<div class="col-sm-12">
						<div class="btn-group">
							<button  id="_btn_i_1" autofocus="autofocus"  class="btn btn-primary btn-sm">
								<i style="float:left; margin-right: 5px; font-size: 20px;" class="fa fa-code-fork"></i> NOTA DE ENTREGA #<i id="doc-num">12</i></button>
							<button tooltip="Vista Previa" data-toggle="modal" data-target="#previa_doc" id="vista-doc" class="btn btn-default btn-sm">
								<i class="fa fa-eye"></i>
							</button>
						</div>
					</div>
				</div><!-- end ngRepeat: btn in botones -->
				<small class="text-danger"></small>
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

    function enviar_ped() {
        var new_cli = $('#razon').attr('data-id');
        var id_cliente;
        switch (new_cli) {
            case "0":
                var cedula,telefono,correo,direccion,razon;
                cedula = $('#cedula');
                razon = $('#razon');
                telefono = $('#telefono');
                correo = $('#correo');
                direccion = $('#direcc');
                if(razon.val()=="")
                {

                    id_cliente = "1";
                    $('.razon').html("Consumidor Final");
                    $('.cedula').html("999999999");
                    $('.telef').html("");
                }else{
                    $('.razon').html(razon.val());
                    $('.cedula').html(cedula.val());
                    $('.telef').html(telefono.val());

                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>BtnDirectos/cargar_sel_co/4",
                    dataType: "json",
                    data: { 
                        "cli_cedula": cedula.val(),
                        "cli_razon": razon.val(),
                        "cli_telef": telefono.val(),
                        "cli_direcc": direccion.val(),
                        "cli_correo": correo.val(),
                        "cli_activo": "1"
                     }
                })
                .done(function( data ) {
                    id_cliente = data;
                });
                }

                break;
            default:
                cedula = $('#cedula');
                razon = $('#razon');
                telefono = $('#telefono');
                correo = $('#correo');
                direccion = $('#direcc');
                    $('.razon').html(razon.val());
                    $('.cedula').html(cedula.val());
                    $('.telef').html(telefono.val());
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>BtnDirectos/cargar_sel_co/5",
                    dataType: "json",
                    data: { 
                        "cli_cedula": cedula.val(),
                        "cli_razon": razon.val(),
                        "cli_telef": telefono.val(),
                        "cli_direcc": direccion.val(),
                        "cli_correo": correo.val(),
                        "idclientes": new_cli,
                        "cli_activo": "1"
                     }
                })
                .done(function( data ) {
                    id_cliente = new_cli;
                });
                break;
        }
            var tabla_co = $('#tablaped');
            var tabla_ped = '';
            var tabla_doc ='';
        $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>BtnDirectos/cargar_sel_co/6",
                    dataType: "json",
                    data: { 
                        "cli_activo": "1",
                        "total": $('#tot_pag').html(),
                        "base0": $('#base_0').html(),
                        "base12": $('#base_iva').html(),
                        "iva": $('#iva').html(),
                        "table":JSON.stringify(tabla_co.bootstrapTable('getData'))
                     }
                })
                .done(function( data ) {
                    var sec_doc = data['sec_doc'];
                    var sec_ped = data['sec_ped'];
                    
                    $('#sec_doc').html(sec_doc);
                    $('#doc-num').html(sec_doc);
                    $('#sec_pedidos').html(sec_ped);
                    $('#ped-num').html(sec_ped);
                    var od = $('#tablaped').bootstrapTable('getData');
                     $.each(od, function (key, val) {
                            
                            tabla_ped += '<tr>'+
                    '<td >'+od[key]['cantn']+'</td>'+
                    '<td>'+od[key]['pro']+'</td>';

                            tabla_doc += '<tr><td >'+od[key]['cantn']+'</td><td>'+od[key]['pro']+'</td><td>$'+od[key]['pvp']+'</td></tr>';
                         });
                    tabla_doc='<tr>'+
                        '<td ></td>'+
                    '<th scope="row">BASE <?= $this->session->userdata('iva') ?>%</th>'+
                    '<td>'+ $('#base_iva').html()+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td ></td>'+
                    '<th scope="row">BASE 0%</th>'+
                    '<td>'+ $('#base_0').html()+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td ></td>'+
                    '<th scope="row">IVA <?= $this->session->userdata('iva') ?>%</th>'+
                    '<td>'+ $('#iva').html()+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td ></td>'+
                    '<th scope="row">TOTAL</th>'+
                    '<td>'+ $('#tot_pag').html()+'</td>'+
                    '</tr>';
                         $('#tabla-ped-data').html(tabla_ped);
                         $('#tabla-doc-data').html(tabla_doc);
                         $('.bd-example-modal-lg').modal('hide');
                         $('#frmImprimir').modal('show');
                });
               

    }
$('#frmImprimir').on('hidden.bs.modal', function (e) {
  location.reload();

});
$('#previa_doc').on('show.bs.modal', function (e) {
  $('#frmImprimir').css('display','none');
})
$('#previa_doc').on('hidden.bs.modal', function (e) {
  $('#frmImprimir').css('display','block');
})
$('#previa_ped').on('show.bs.modal', function (e) {
  $('#frmImprimir').css('display','none');
})
$('#previa_ped').on('hidden.bs.modal', function (e) {
  $('#frmImprimir').css('display','block');
})
    $('#enviar_ped').click(function () {
        if($('#checkced').attr('class') == "text-success"){
        enviar_ped();
        }else{
            $.notify({
                    title: "Error:",
                    message: "Cedula no Válida."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'danger',
                    delay:1000

                });
        }
    });
    $('#pago_unico_recibe').keyup(function () {
        if($(this).val() == ""){
        $('#cal_tot').val("-"+$('#tot_pag').html());

        }else{
        var val1 = $('#tot_pag').html();
        var val2 = $(this).val();
        var total = parseFloat(val2) - parseFloat(val1);
        $('#cal_tot').val(total.toFixed(2));
        }

    });

        function sumar_valor()
        {
           var datos =  $('#tablaped').bootstrapTable('getData');
           var base_0 = 0, base_iva = 0;
            $.each(datos, function (key, val) {
                switch (datos[key]['isiva']) {
                    case "true":
                        base_iva += parseFloat(datos[key]['pvp']);
                        break;
                    case "false":
                        base_0 += parseFloat(datos[key]['pvp']);
                        
                        break;
                    default:
                        break;
                }

                
            });

                $('#base_0').html("$"+base_0.toFixed(2));
                var subtotal = (base_iva / 1.<?= $this->session->userdata('iva') ?>);
                var iva = base_iva - subtotal;
                $('#base_iva').html("$"+subtotal.toFixed(2));
                $('#iva').html("$"+iva.toFixed(2));
                var total = base_iva + base_0;
                $('#total').html("$"+total.toFixed(2));
                $('#tot_pag').html(total.toFixed(2));
                $('#cal_tot').val("-"+total.toFixed(2));
        }

        function validar() {
            var cad = document
                .getElementById("cedula")
                .value
                .trim();
            var total = 0;
            var longitud = cad.length;
            var longcheck = longitud - 1;

            if (cad !== "") {
                for (i = 0; i < longcheck; i++) {
                    if (i % 2 === 0) {
                        var aux = cad.charAt(i) * 2;
                        if (aux > 9) 
                            aux -= 9;
                        total += aux;
                    } else {
                        total += parseInt(cad.charAt(i));
                    }
                }

                total = total % 10
                    ? 10 - total % 10
                    : 0;

                if (cad.charAt(longitud - 1) == total) {
                    document
                        .getElementById("checkced")
                        .innerHTML = ('<i class="fa fa-check" ></i>Identificación valida.');
                    $("#checkced").removeClass('text-danger');
                    $("#checkced").addClass('text-success');
                } else {
                    $("#checkced").removeClass('text-success');

                    document
                        .getElementById("checkced")
                        .innerHTML = (
                        '<i class="fa fa-close"></i>El número de cédula de la persona natural es incorr' +
                        'ecto.'
                    );
                    $("#checkced").addClass('text-danger');

                }
            }
        }

        $('#hacer_ped').click(function () {
           var datos =  $('#tablaped').bootstrapTable('getData');

           var count = datos.length;
           if(count >0){
               $('.bd-example-modal-lg').modal('show');
           }else{
                 $.notify({
                    title: "Error:",
                    message: "Debes Seleccionar Productos para realizar pedido."
                }, {
                    z_index: 1052,
                    allow_dismiss: true,
                    type: 'danger',
                    delay:1000

                });
           }
        });

      $('#cedula').keyup(function () {
          if($('#valced').is(':checked'))
          {
        var cad = document.getElementById("cedula").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;
        if(longitud === 0)
        {
            document.getElementById("checkced").innerHTML = ('<i class="fa fa-check" ></i>Identificación valida.');
            $("#checkced").removeClass('text-danger');
            $("#checkced").addClass('text-success');
        }
          if(longitud <= 10)
          {
          validar();
          }else if(longitud > 10)
          {
              if(longitud > 10 && longitud < 13)
              {
                document.getElementById("checkced").innerHTML = ('<i class="fa fa-close"></i>El Ruc debe terminar en 001.');
                $("#checkced").addClass('text-danger');
                $("#checkced").removeClass('text-success');

              }else if(cad.substring(10,13) == 001)
              {
                document.getElementById("checkced").innerHTML = ('<i class="fa fa-check" ></i>Identificación valida.');
            $("#checkced").removeClass('text-danger');
            $("#checkced").addClass('text-success');

              }else{
                document.getElementById("checkced").innerHTML = ('<i class="fa fa-close"></i>El Ruc debe terminar en 001.');
                $("#checkced").addClass('text-danger');
                $("#checkced").removeClass('text-success');

              }
          }
        }else{
            document.getElementById("checkced").innerHTML = ('<i class="fa fa-check" ></i>Cedula Sin Validar.');
            $("#checkced").removeClass('text-danger');
            $("#checkced").addClass('text-success');
        }
      });

            $( ".mordatacli" ).animate({
                    opacity: 1,
                    left: "+=50",
                    height: "toggle"
                }, 200, function() {
                    // Animation complete.
            });

    $( "#mordata" ).click(function() {
            $( ".mordatacli" ).animate({
                opacity: 1,
                left: "+=50",
                height: "toggle"
            }, 200, function() {
                // Animation complete.
            });
    });

    $('#razon').autocomplete({
        serviceUrl: '<?= base_url(); ?>BtnDirectos/cargar_sel_co/2?tipo=raz',
         onSelect: function (suggestion) {
        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        var a = suggestion.value;
        $(this).attr('data-id',suggestion.data);
        $(this).attr('data-cant',a.length);
        $.ajax({
            method: "POST",
            url: "<?= base_url(); ?>BtnDirectos/cargar_sel_co/3",
            dataType: "json",
            data: { 
                "idclientes": suggestion.data
             }
        })
        .done(function( data ) {
            $('#cedula').val(data[0]['cli_cedula']);
            $('#cedula').attr('disabled','disabled');
            $('#telefono').val(data[0]['cli_telef']);
            $('#direcc').val(data[0]['cli_direcc']);
            $('#correo').val(data[0]['cli_correo']);

        });
        }
    });
    $('#cedula').autocomplete({
        serviceUrl: '<?= base_url(); ?>BtnDirectos/cargar_sel_co/2?tipo=ced',
         onSelect: function (suggestion) {
        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
         validar();
        var a = suggestion.value;
        $('#razon').attr('data-id',suggestion.data);
        $('#razon').attr('data-cant',a.length);
        $.ajax({
            method: "POST",
            url: "<?= base_url(); ?>BtnDirectos/cargar_sel_co/3",
            dataType: "json",
            data: { 
                "idclientes": suggestion.data
             }
        })
        .done(function( data ) {
            $('#razon').val(data[0]['cli_razon']);
            $('#cedula').attr('disabled','disabled');
            $('#telefono').val(data[0]['cli_telef']);
            $('#direcc').val(data[0]['cli_direcc']);
            $('#correo').val(data[0]['cli_correo']);

        });
        }
    });
    $('#razon').keyup(function () {
       var cantt = $(this).attr('data-cant');
       if($(this).val().length < cantt)
       {
           $(this).attr('data-id',0);
            $('#cedula').val("");
            $('#cedula').removeAttr('disabled');
            $('#telefono').val("");
            $('#direcc').val("");
            $('#correo').val("");
       }
    });

    $('#lineas_lista').find('li').first().addClass('active');
    
    $('#tablaped').bootstrapTable({uniqueId: "id"});

            $('form').submit(function () {
            return false;
        });

    function cambiar_pro(objeto) {
            var data = objeto
                .parent()
                .parent()
                .parent()
                .find('td')
                .first()
                .html();
            //console.log(data);
            var datoss = $('#tablaped').bootstrapTable('getRowByUniqueId', data);
            var total = objeto.val();
            $('#'+datoss['id']).find('p').html(objeto.val());
            var newval = $('#'+datoss['id']).attr('data-valor')*total;    

            var mydata = {
            "pvp": newval.toFixed(2),
            "cantn": objeto.val(),
            "cant": '<input  class="form-control cant" id="' + data + '" value="'+objeto.val()+'" type="number">'

            
        };

        $('#tablaped').bootstrapTable('updateByUniqueId', {
            id: data,
            row: mydata
             });
            objeto.val($('#'+datoss['id']).find('p').html());

            objeto.focus();
            sumar_valor();
                         $('.cant').focusout(function () {
                cambiar_pro($(this));
            });
                    $('.quitar').click(function () {
            quitar($(this));
        });
    }

    cargar_pro();

    function quitar(objeto) {
            var data = objeto
                .parent()
                .parent()
                .parent()
                .find('td')
                .first()
                .html();

            var datoss = $('#tablaped').bootstrapTable('getRowByUniqueId', data);
            $('#'+datoss['id']).removeClass('sel');
            $('#'+datoss['id']).find('p').html(0);
            $('#tablaped').bootstrapTable('removeByUniqueId',  data);
 
        sumar_valor();

        $('.quitar').click(function () {
            quitar($(this));
        });
    }

    function add_pro(id,objeto)
    {
        if ($('#tablaped').bootstrapTable('getRowByUniqueId', id) == null) {

         objeto.find('p').html(1);
         objeto.addClass('sel');
        var mydata = {
            "id": id,
            "pro": objeto.attr('data-nombre'),
            "isiva":objeto.attr('data-isiva'),
            "pvp": objeto.attr('data-valor'),
            "op": '<i class="fa fa-times-circle fa-lg quitar" style="color:red;" aria-hidden="true"></i>',
            "tipo": objeto.attr('data-tipo'),
            "cant": '<input  class="form-control cant" id="' + id + '" value="1" type="number">',
            "cantn": "1"
                        };
                        var newdata = [];
                        newdata.push(mydata);
                        $('#tablaped').bootstrapTable("append", mydata);
        }else{
        var data = $('#tablaped')
            .find('tbody')
            .find('#' + id)
            .val();
            
        var valor = parseInt(data) + 1;
         objeto.find('p').html(valor);
         objeto.addClass('sel');
        var newval = objeto.attr('data-valor')*valor;
        var mydata = {
            "id": id,
            "pro": objeto.attr('data-nombre'),
            "isiva":objeto.attr('data-isiva'),
            "pvp": newval.toFixed(2),
            "op": '<i class="fa fa-times-circle fa-lg quitar" style="color:red;" aria-hidden="tru' +
                    'e"></i>',
            "tipo": objeto.attr('data-tipo'),
            "cant": '<input  class="form-control cant" id="' + id + '" value="' + valor + '" type="' +
                    'number">',
            "cantn": valor
        };

        $('#tablaped').bootstrapTable('updateByUniqueId', {
            id: id,
            row: mydata
        });
        }
        $('.quitar').click(function () {
            quitar($(this));
        });
            $('.cant').focusout(function () {
                cambiar_pro($(this)); 
             });
        sumar_valor();
    }

    function cargar_pro() 
    {
        var id_line = $('#lineas_lista')
            .find('li.active')
            .attr('data-id');
        var cc = '<div class="progress mb-2" ><div class="progress-bar progress-bar-striped bg-d' +
                'anger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuem' +
                'in="0" aria-valuemax="100"></div> </div>';
        var list_art = '';
        var lista = $('#pro_listas');

        $
            .ajax({
                url: "<?= base_url(); ?>BtnDirectos/cargar_sel_co/1",
                data: {
                    "idlineas": id_line
                },
                method: "POST",
                dataType: "json",
                beforeSend: function (xhr) {
                    lista.html(cc);
                }
            })
            .done(function (data) {

                var art_name = data[0]['art_name'];
                console.log(art_name);

                $.each(data, function (key, val) {

                    var vall;
                    if (data[key]['art_isiva'] == 'true') {
                        vall = (data[key]['art_pvp1'] * 1.<?= $this -> session -> userdata('iva') ?>);
                    } else {
                        vall = data[key]['art_pvp1'];
                    }
                if ($('#tablaped').bootstrapTable('getRowByUniqueId', data[key]['idarticulos']) == null) {
                                    list_art += "<li id='"+ data[key]['idarticulos'] +"' data-tipo='" + data[key]['art_tipo'] + "' data-isiva='" + data[key]['art_isiva'] + "' data-nombre='" + data[key]['art_name'] + "' data-valor='" + vall.toFixed(2) + "' data-id='" + data[key]['idarticulos'] +
                                            "' class='productos'> " + data[key]['art_name'] + " <br> <p>0</p></li>";

                }else{
                    var datoslista = $('#tablaped').bootstrapTable('getRowByUniqueId', data[key]['idarticulos']);
                    if(datoslista['tipo'] == data[key]['tipo'])
                    {
                                                            list_art += "<li id='"+ data[key]['idarticulos'] +"' data-isiva='" + data[key]['art_isiva'] + "' data-tipo='" + data[key]['art_tipo'] + "' data-nombre='" + data[key]['art_name'] + "' data-valor='" + vall.toFixed(2) + "' data-id='" + data[key]['idarticulos'] +
                                            "' class='productos sel'> " + data[key]['art_name'] + " <br> <p>" + datoslista['cantn'] + "</p></li>";

                    }else{
                                                            list_art += "<li id='"+ data[key]['idarticulos'] +"' data-isiva='" + data[key]['art_isiva'] + "'' data-tipo='" + data[key]['art_tipo'] + "' data-nombre='" + data[key]['art_name'] + "' data-valor='" + vall.toFixed(2) + "' data-id='" + data[key]['idarticulos'] +
                                            "' class='productos sel'> " + data[key]['art_name'] + " <br> <p>" + datoslista['cantn'] + "</p></li>";

                    }
                }
                });


                lista.html(list_art);

       $('.productos').click(function () {
        var idpro = $(this).attr('data-id');
        add_pro(idpro,$(this));
        });

            });
    }

    $('#lineas_lista li').click(function () {
        var id_linea = $(this).attr('data-id');
        $('#lineas_lista')
            .find('li.active')
            .removeClass('active');
        $(this).addClass('active');
        cargar_pro();

    });
});
</script>
<!-- Google analytics script-->

</body>
</html>