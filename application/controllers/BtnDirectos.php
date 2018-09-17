<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtnDirectos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        echo 'Nope';
    }

    public function salir()
    {
        $this->session->sess_destroy();
        header('location: '.base_url().'/login');
    }
    public function notis()
    {
        $this->load->model('Noti');
        $logeado = $this->Noti->obnotis();
        echo $logeado;

    }
    public function llenarnotis()
    {
        $this->load->model('Noti');
        $logeado = $this->Noti->llenarnotis();
        echo $logeado;

    }
    public function actualizar_line_art(){
        $this->load->model('Linea');
        $setear = $this->input->post('setear');
        switch ($setear) {
            case '1':
                # code...
                $json_order = $this->input->post('json_order');
                $lines = $this->Linea->change_order($json_order);
                echo $lines;
                break;
            case '2': 
                $lines = $this->Linea->sel_line();
                if($lines == "0"){
                    $lineas = '<option value="0" selected>SELECCIONAR LINEA...</option>';
                }else{
                    $lineas = $this->Linea->sel_line_converter($lines);

                }
                echo $lineas;
            break;
            case '3':
            $post_line = $this->input->post();
                $lines = $this->Linea->add_line($post_line);

            break;
            case '4':
                $lines = $this->Linea->sel_line();
                if ($lines == "0") {
                    $nes_line = "No existen Lineas";
                } else {
                    $nes_line = $this->Linea->sel_line_nestable($lines);

                }
                echo $nes_line;
            break;
            case '5':
                $post_line = $this->input->post();
                $lines = $this->Linea->editdel_line($post_line,'edit');
            break;
            case '6':
                $post_line = $this->input->post();
                $lines = $this->Linea->editdel_line($post_line, 'del');
                break;
            default:
                # code...
                break;
        }
    }

    public function add_upp_edit_art($setear)
    {
        switch ($setear) {
            case '1':
                $post_line = $this->input->post();
                $this->load->model('Articulos');
                return $art_add = $this->Articulos->add_art($post_line,'add');

                break;
            case '2':
                $post_line = $this->input->post();
                $this->load->model('Articulos');
                $art_add = $this->Articulos->art_bus($post_line);
                break;
            case '3':
                $post_line = $this->input->post();
                $this->load->model('Articulos');
                $art_add = $this->Articulos->obt_art($post_line['idarticulos']);
                echo $art_add;
                break;
            case '4':
                $post_line = $this->input->post();
                $this->load->model('Articulos');
                $art_add = $this->Articulos->add_art($post_line,'edit');
                break;
            case '5':
                $post_line = $this->input->post();
                $this->load->model('Articulos');
                $art_add = $this->Articulos->del_art($post_line);
                break;
            default:
                # code...
                break;
        }
    }
    public function materiaprima($acc)  
    {
        $post_line = $this->input->post();
        $this->load->model('Articulos');
        switch ($acc) {
            case 'add':
                $result = $this->Articulos->add_mp($post_line,$acc);
                return $result;
                break;
            case 'edit':
                $result = $this->Articulos->add_mp($post_line,$acc);
                return $result;
                break;
            case 'carg':
                $result = $this->Articulos->add_mp($post_line,$acc);
                return $result;
                break;
            case 'act':
                $result = $this->Articulos->obtMateriaPrimax();
                echo $result;
                break;
            default:
                
                break;
        }
    }
    public function add_upp_edit_co($setear)
    {
        switch ($setear) {
            case '1':
                $post_line = $this->input->post();
            switch ($post_line['objeto']) {
                case 'combos':
                        $this->load->model('Combos');
                        $art_add = $this->Combos->co_bus($post_line);
                        break;
                case 'art':
                        $this->load->model('Articulos');
                        $art_add = $this->Articulos->art_bus($post_line);
                        break;
                
                default:
                    # code...
                    break;
            }
                break;
                //GUARDAR combo
            case '2':
                $post_line = $this->input->post();
                $val = 1;
                ini_set('display_errors',0);
                foreach ($post_line as $d)
                {
                    if($d == '')
                    {
                        $val = 0;
                    }
                }
                $arr = json_decode($post_line['tabla_co']);
                if(count($arr) == 0)
                {
                    $val = 0;
                }
                if($val == 0)
                {
                    echo 0;
                }else{
                    //activar modelos
                    $this->load->model('Combos');
                    $art_add = $this->Combos->add_co($post_line,"add");
                }
                break;
            case '3':
                $post_line = $this->input->post();

                $this->load->model('Combos');
               echo $art_add = $this->Combos->obt_co($post_line['idcombos']);
                break;
            default:
            case '4':
                $post_line = $this->input->post();
                $val = 1;
                ini_set('display_errors', 0);
                foreach ($post_line as $d) {
                    if ($d == '') {
                        $val = 0;
                    }
                }
                $arr = json_decode($post_line['tabla_co']);
                if (count($arr) == 0) {
                    $val = 0;
                }
                if ($val == 0) {
                    echo 0;
                } else {
                    //activar modelos
                    $this->load->model('Combos');
                    $art_add = $this->Combos->add_co($post_line, "edit");
                }
            break;
            case '5':
                $post_line = $this->input->post();

                $this->load->model('Combos');
                $art_add = $this->Combos->del_co($post_line);
            break;
                # code...
                break;
        }
    }

    public function cargar_sel_co($setear)
    {
        switch ($setear) {
            case '1':
                $post_line = $this->input->post();

                $this->load->model('Articulos');
                echo $art_add = $this->Articulos->obt_artxline($post_line['idlineas']);
                break;
            case '2':
                $post_line = $this->input->get();
                switch ($post_line['tipo']) {
                    case 'raz':
                        $this->load->model('Clientes');
                        echo $art_add = $this->Clientes->autocomplete($post_line['query'],"raz");
                        break;
                    case 'ced':
                        $this->load->model('Clientes');
                        echo $art_add = $this->Clientes->autocomplete($post_line['query'],"ced");
                        break;                    
                    default:
                        # code...
                        break;
                }

                break;
            case '3':
                $post_line = $this->input->post();

                $this->load->model('Clientes');
                echo $art_add = $this->Clientes->bus_cli($post_line);
                break;
            case '4':
                $post_line = $this->input->post();

                $this->load->model('Clientes');
                echo $art_add = $this->Clientes->add_cli($post_line,"add");
                break;
            case '5':
                $post_line = $this->input->post();

                $this->load->model('Clientes');
                echo $art_add = $this->Clientes->add_cli($post_line, "edit");
                break;
            case '6':
                $post_line = $this->input->post();
                $tabla = json_decode($post_line['table']);
                unset($post_line['table']);
                $post_line['table'] = $tabla;
                $this->load->model('Ventas');
                echo $art_add = $this->Ventas->crear_venta($post_line);
                break;                              
            default:
                # code...
                break;
        }
    }
}
