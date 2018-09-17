<?php

/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Ventas extends CI_Model
{
    function crear_venta($v)
    {   
        ini_set("display_errors",1);
        date_default_timezone_set('America/Guayaquil');
        setlocale(LC_ALL, "es_ES");
        $fecha = date("Y-m-d H:i:s");
        
        $where = 'fkidcompanyx = "' . $this->session->userdata('idcompany') . '"';
        $queryc = $this->db->select('*')
            ->from('app_option')
            ->where($where)
            ->get();
        $opt = $queryc->row();
        $tipon = $this->obtipoxnombre($opt->tipo_doc);
        $sec_ped = $opt->sec_ped;

        $p = array(
            'fkidcompanyv' => $this->session->userdata('idcompany'),
            'ventas_fecha' => $fecha,
            'fkidclientesv' => $v['cli_activo'],
            'ventas_secdoc' => $tipon['secu'] + 1,
            'ventas_secped' => $sec_ped + 1,
            'ventas_tipodoc' => $opt->tipo_doc,
            'ventas_total' => $v['total'],
            'base0' => str_replace("$","", $v['base0']),
            'base12' => str_replace("$", "", $v['base12']),
            'iva' => str_replace("$", "", $v['iva']),
            'ventas_usrcreation' => $this->session->userdata('iduser')
         );

        $this->db->insert('app_ventas', $p);
        $idventas = $this->db->insert_id();
        foreach ($v['table'] as $k) {
            $idart = $k->id;
            $npro = $k->pro;
            $isiva = $k->isiva;
            $pvp = $k->pvp;
            $cantn = $k->cantn;
            $tipo = $k->tipo;

            $p = array(
                'fkidventas' => $idventas,
                'fkidart' => $idart,
                'vbody_artname' => $npro,
                'vbody_pvp' => $pvp,
                'vbody_cant' => $cantn,
                'vbody_isiva' => $isiva
            );

            $this->db->insert('app_vbody', $p);
            if($tipo == "art")
            {
                $where2 = 'idartfk = "' . $idart . '"';
                $queryc2 = $this->db->select('*')
                    ->from('app_bart')
                    ->where($where2)
                    ->get();
                $s = $queryc2->result();
                $numeros = $queryc2->num_rows();
                if ($numeros > 0) {
                foreach ($s as $key) {
                    
                    $id_mp = $key->idmpfk;
                    $where3 = 'idmateriaprima = "' . $id_mp . '"';
                $queryc3 = $this->db->select('*')
                    ->from('app_mp')
                    ->where($where3)
                    ->get();
                $s3 = $queryc3->result();
                $mpx = $key->cantxart * $cantn;
                $newstock = $s3[0]->mp_cant - $mpx;

                    $p2 = array(
                        'mp_cant' => $newstock
                    );
                    $this->db->where('idmateriaprima', $id_mp);
                    $this->db->update('app_mp', $p2);
                }
                }
                
 
            }else{
                $where22 = 'id_fkcombos = "' . $idart . '"';
                $queryc22 = $this->db->select('*')
                    ->from('app_cobody')
                    ->where($where22)
                    ->get();
                $result = $queryc22->result();
                foreach ($result as $rr) {
                    $cantidad = $rr->cocant;
                    $valorcant = $cantn * $cantidad;
                    $where2 = 'fkidarticulos = "' . $rr->id_fkart . '"';
                    $queryc2 = $this->db->select('*')
                    ->from('app_stock')
                    ->where($where2)
                    ->get();
                    $s = $queryc2->row();
                    $newstock = $s->art_stock - $valorcant;
                    $numeros = $queryc2->num_rows();
                    if ($numeros > 0) {
                        $p2 = array(
                        'art_stock' => $newstock
                    );
                        $this->db->where('fkidarticulos', $rr->id_fkart);
                        $this->db->update('app_stock', $p2);
                    }
                }
            }



        }
        switch ($opt->tipo_doc) {
            case '1':
                $p3 = array(
                    'sec_not' => $tipon['secu'] + 1,
                    'sec_ped' => $sec_ped+1
                );
                $this->db->where('fkidcompanyx', $this->session->userdata('idcompany'));
                $this->db->update('app_option', $p3);
                break;
            case '2':
                $p3 = array(
                    'sec_fact' => $tipon['secu'] + 1,
                    'sec_ped' => $sec_ped + 1
                );
                $this->db->where('fkidcompanyx', $this->session->userdata('idcompany'));
                $this->db->update('app_option', $p3);
            default:
                # code...
                break;
        }

        $resultadote = array(
            'sec_doc' => $tipon['secu'] + 1, 
            'sec_ped' => $sec_ped + 1
        );
        return json_encode($resultadote, JSON_UNESCAPED_UNICODE);



    }
    function obtipoxnombre()
    {
        $where = 'fkidcompanyx = "' . $this->session->userdata('idcompany') . '"';
        $queryc = $this->db->select('*')
            ->from('app_option')
            ->where($where)
            ->get();
        $r = $queryc->row();
        switch ($r->tipo_doc) {
            case '1':
            $r = array(
                'nombre' => "Nota de Venta", 
                'secu' => $r->sec_not
            );
                return $r;
                break;
            case '2':
                $r = array(
                    'nombre' => "Factura",
                    'secu' => $r->sec_fact
                );
                return $r;        
            default:
                # code...
                break;
        }
    }
    
}