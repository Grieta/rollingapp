<?php

/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Clientes extends CI_Model
{
    function add_cli($p,$cat)
    {
        date_default_timezone_set('America/Guayaquil');
        setlocale(LC_ALL, "es_ES");
        $fecha = date("Y-m-d H:i:s");


        switch ($cat) {
            case 'add':
                $post['cli_dcreation'] = $fecha;
                $post['cli_usrcreation'] = $this->session->userdata('iduser');
                $this->db->insert('app_clientes', $p);
                return $this->db->insert_id();
                break;
            case 'edit':
                $id = $post['idclientes'];
                unset($post['idclientes']);
                $this->db->where('idclientes', $id);
                $this->db->update('app_clientes', $p);
                return "";
                break;
            default:
                # code...
                break;
        }
    }
    function autocomplete($v,$p)
    {
        switch ($p) {
            case 'raz':
                $where = 'cli_idcompanyfk = "' . $this->session->userdata('idcompany') . '" and cli_razon like "%' . trim($v) . '%"';
                $queryc = $this->db->select('*')
                    ->from('app_clientes')
                    ->where($where)
                    ->get();
                $numeros = $queryc->num_rows();
                $resultado = $queryc->result();
                $result['query'] = $v;
                if ($numeros > 0) {
                    date_default_timezone_set('America/Guayaquil');
                    setlocale(LC_ALL, "es_ES");
                    foreach ($resultado as $row) {
                        $array[] = array(
                            "value" => $row->cli_razon,
                            "data" => $row->idclientes
                        );
                    }
                    $result['suggestions'] = $array;
                }
                return json_encode($result, JSON_UNESCAPED_UNICODE);
                break;
            case 'ced':
                $where = 'cli_idcompanyfk = "' . $this->session->userdata('idcompany') . '" and cli_cedula like "%' . trim($v) . '%"';
                $queryc = $this->db->select('*')
                    ->from('app_clientes')
                    ->where($where)
                    ->get();
                $numeros = $queryc->num_rows();
                $resultado = $queryc->result();
                $result['query'] = $v;
                if ($numeros > 0) {
                    date_default_timezone_set('America/Guayaquil');
                    setlocale(LC_ALL, "es_ES");
                    foreach ($resultado as $row) {
                        $array[] = array(
                            "value" => $row->cli_cedula,
                            "data" => $row->idclientes
                        );
                    }
                    $result['suggestions'] = $array;
                }
                return json_encode($result, JSON_UNESCAPED_UNICODE);
                break;            
            default:
                # code...
                break;
        }

    }

    function bus_cli($p)
    {
        $where = 'cli_idcompanyfk = "' . $this->session->userdata('idcompany') . '" and idclientes = "' . trim($p['idclientes']) . '"';
        $queryc = $this->db->select('*')
            ->from('app_clientes')
            ->where($where)
            ->get();
        $numeros = $queryc->num_rows();
        $resultado = $queryc->result();
        if ($numeros > 0) {
            date_default_timezone_set('America/Guayaquil');
            setlocale(LC_ALL, "es_ES");
            return json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    } 

}