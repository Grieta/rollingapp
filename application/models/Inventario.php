<?php

/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Inventario extends CI_Model
{

    public function add_mp($v,$a)
    {
         date_default_timezone_set('America/Guayaquil');
        setlocale(LC_ALL, "es_ES");
        $fecha = date("Y-m-d H:i:s");
        switch ($a) {
            case 'add':
            $datosadd = array('fkidcompanyinv' => $this->session->userdata('idcompany'),
            'inv_dcreation'=> $fecha,
            'inv_base0'=> $v['datos'][0]['value'],
            'inv_base12'=> $v['datos'][1]['value'],
            'inv_iva'=> $v['datos'][2]['value'],
            'inv_total'=> $v['datos'][3]['value'],
            'inv_tipo'=> $a,
            'inv_usrcreation'=> $this->session->userdata('iduser'),
             );
            //echo var_dump($datosadd);
            $this->db->insert('app_inventarios', $datosadd);
            $idinv = $this->db->insert_id();
            foreach (json_decode($v['materialist']) as $mp) {
             $datosmp = array('fkidmp' => $mp->id, 
             	"art_stock" => $mp->cantn,
             	"fkidinventarios" => $idinv);
             $this->db->insert('app_stock', $datosmp);

             $sql = $this->db->query('SELECT * FROM app_mp WHERE idmateriaprima = "'.$mp->id.'" and mp_idcompany = "'.$this->session->userdata('idcompany').'"');
        $r = $sql->row();
        $numerosq = $sql->num_rows();
        if($numerosq > 0){
        	$cantmp = $r->mp_cant;
        	$totaladd = $cantmp + $mp->cantn;
        	$datostotales = array('mp_cant' => $totaladd,
        	"mp_dupdate"=> $fecha );
        	$this->db->where('idmateriaprima', $mp->id);
                $this->db->update('app_mp', $datostotales);
        }
            }
            

                break;
            case 'rem':
           $datosadd = array('fkidcompanyinv' => $this->session->userdata('idcompany'),
            'motivo'=> $v['motivo'],
            'inv_dcreation'=> $fecha,
            'inv_base0'=> $v['datos'][0]['value'],
            'inv_base12'=> $v['datos'][1]['value'],
            'inv_iva'=> $v['datos'][2]['value'],
            'inv_total'=> $v['datos'][3]['value'],
            'inv_tipo'=> $a,
            'inv_usrcreation'=> $this->session->userdata('iduser'),
             );
            //echo var_dump($datosadd);
            $this->db->insert('app_inventarios', $datosadd);
            $idinv = $this->db->insert_id();
            foreach (json_decode($v['materialist']) as $mp) {
             $datosmp = array('fkidmp' => $mp->id, 
             	"art_stock" => $mp->cantn,
             	"fkidinventarios" => $idinv);
             $this->db->insert('app_stock', $datosmp);

             $sql = $this->db->query('SELECT * FROM app_mp WHERE idmateriaprima = "'.$mp->id.'" and mp_idcompany = "'.$this->session->userdata('idcompany').'"');
        $r = $sql->row();
        $numerosq = $sql->num_rows();
        if($numerosq > 0){
        	$cantmp = $r->mp_cant;
        	$totaladd = $cantmp - $mp->cantn;
        	$datostotales = array('mp_cant' => $totaladd,
        	"mp_dupdate"=> $fecha );
        	$this->db->where('idmateriaprima', $mp->id);
                $this->db->update('app_mp', $datostotales);
        }
            }                break;
            default:
                
                break;
        }
    }
}