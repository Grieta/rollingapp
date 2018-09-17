<script src="<?php echo base_url(); ?>styles/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>styles/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>styles/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>styles/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo base_url(); ?>styles/js/plugins/pace.min.js"></script>
<script src="<?php echo base_url(); ?>styles/js/plugins/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>styles/js/custom/line.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="<?php echo base_url(); ?>styles/js/plugins/chart.js"></script>
<script type="text/javascript">
    $(window).resize(function(){     

    if ($('body').width() > 766 ){
        $('body').addClass('sidenav-toggled');
              // is mobile device

       }else if ($('body').width() < 767 ){
                   $('body').removeClass('sidenav-toggled');

    }

});
    $(document).ready(function () {
            if ($('body').width() > 766 ){
        $('body').addClass('sidenav-toggled');
              // is mobile device

       }else if ($('body').width() < 767 ){
                   $('body').removeClass('sidenav-toggled');

    }
        $('.<?= $pagina ?>').addClass('active');
var myVar;
        //myVar = setTimeout(obtnotis, 100000);
        $('.app-nav__item').click(function () {
            $('#notify').removeClass('fa-bell');
            $('#notify').addClass('fa-bell-o');
            $('.fa-comment').css('display','none');

            $('.num').css('display','none');
        });
        llenarnotis();
        obtnotis();
function llenarnotis() {
    $.ajax({
        url: "<?= base_url() ?>/btndirectos/llenarnotis",
        data:{},
        method:"POST",
        dataType: "json"

    })
        .done(function( data ) {

            if(data[0]['status']=='1'){
                for (var i = 0; i < data.length;i++)
                {
                    var notiify = $('.app-notification__content').html();

                    var notinew = crear_notify2(data[i]['title'],data[i]['fecha'],data[i]['icono']);
                    $('.app-notification__content').html(notiify+' '+notinew);
                   // alert(notinew);

                }
            }





        });
}
        function obtnotis() {
            $.ajax({
                url: "<?= base_url() ?>/btndirectos/notis",
                data:{},
                method:"POST"
            })
                .done(function( data ) {
                    var datos = data.split(';');
                    if(datos[3] == 1){
                        $('#notify').removeClass('fa-bell-o');
                        $('#notify').addClass('fa-bell');
                        $('.fa-comment').css('display','block');
                        var a = $('.num').html();
                        var suma = parseInt(a) + 1;
                        $('.num').html(suma);
                        $('#numm').html($('.num').html());
                        $('.num').css('display','block');
                        var notiify = $('.app-notification__content').html();
                        var notinew = crear_notify(datos[0],datos[1],datos[2]);
                        $('.app-notification__content').html(notinew+' '+notiify);

                    }else{

                    }
                    obtnotis();

                });

        }
        function crear_notify2(titulo,fechas,icono) {

            var notify = '                    <li>\n' +
                '                        <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="'+icono+' fa-lg"><i class="fa fa-circle '+icono+'-2x text-primary"></i><i class="fa fa-envelope '+icono+'-1x fa-inverse"></i></span></span>\n' +
                '                            <div>\n' +
                '                                <p class="app-notification__message">'+titulo+'</p>\n' +
                '                                <p class="app-notification__meta">'+fechas+'</p>\n' +
                '                            </div>\n' +
                '                        </a>\n' +
                '                    </li>\n';


            return notify;
        }
        function crear_notify(titulo,fechas,icono) {

            var notify = '                    <li>\n' +
                '                        <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="'+icono+' fa-lg"><i class="fa fa-circle '+icono+'-2x text-primary"></i><i class="fa fa-envelope '+icono+'-1x fa-inverse"></i></span></span>\n' +
                '                            <div>\n' +
                '                                <p class="app-notification__message">'+titulo+' <span class="badge badge-danger">Nuevo</span></p>\n' +
                '                                <p class="app-notification__meta">'+fechas+'</p>\n' +
                '                            </div>\n' +
                '                        </a>\n' +
                '                    </li>\n';


            return notify;
        }


    });
</script>