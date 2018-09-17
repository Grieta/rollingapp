<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->has_userdata('iduser')== null){
            redirect('/login');
        }

    }
	public function index()
	{
	    $pagina = array('pagina'=>'dash');

		$this->load->view('inicio',$pagina);
	}
    public function ventas()
    {
        $this->load->model('Linea');
        $lines = $this->Linea->sel_line();

        $where = 'fkidcompanyx = "' . $this->session->userdata('idcompany') . '"';
        $queryc = $this->db->select('*')
            ->from('app_option')
            ->where($where)
            ->get();
        $opt = $queryc->row();

        $pagina = array(
            'pagina'=>'sales',
            'sel_lines' => $lines,
            "ped_sec"=>$opt->sec_ped+1
    );

        $this->load->view('ventas',$pagina);
    }
    public function addlinea()
    {
        $this->load->model('Linea');
        $this->load->model('Articulos');
        $lines = $this->Linea->sel_line();
        if ($lines == "0") {
            $nes_line = "No Exiten Lineas";
            $lineas= '<option value="0" selected>SELECCIONAR LINEA...</option>';
        } else {
            $lineas = $this->Linea->sel_line_converter($lines);
            $nes_line = $this->Linea->sel_line_nestable($lines);
        }
        $materiaprima = $this->Articulos->obtMateriaPrima();
        $pagina = array('pagina'=>'addlinea',
            'sel_lines'=> $lineas,
            'nes_lines'=> $nes_line,
            'materiaprima'=> $materiaprima
        );

        $this->load->view('addlinea',$pagina);
    }

    public function combos()
    {
        $this->load->model('Linea');
        $lines = $this->Linea->sel_line();
        if ($lines == "0") {
            $nes_line = "No Exiten Lineas";
            $lineas = '<option value="0" selected>SELECCIONAR LINEA...</option>';
        } else {
            $lineas = $this->Linea->sel_line_converter($lines);
           /* $nes_line = $this->Linea->sel_line_nestable($lines);*/
        }
        $pagina = array(
            'pagina' => 'addlinea',
            'sel_lines' => $lineas
        );

        $this->load->view('combos', $pagina);
    }
        public function mp()
    {
        $this->load->model('Articulos');
        $materiaprima = $this->Articulos->obtMateriaPrima();

        $pagina = array(
            'pagina' => 'mp',
            'materiaprima'=> $materiaprima
        );
        $this->load->view('mp', $pagina);
    }
    public function inventario()
    {
        $this->load->model('Articulos');
        $materiaprima = $this->Articulos->obtMateriaPrima();
        $pagina = array(
            'pagina' => 'inventario',
            'materiaprima'=> $materiaprima
        );
        $this->load->view('inventario', $pagina);
    }
}
