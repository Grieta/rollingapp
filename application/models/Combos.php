<?php

/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Combos extends CI_Model
{

    public function add_co($post, $cat)
    {

        date_default_timezone_set('America/Guayaquil');
        setlocale(LC_ALL, "es_ES");
        $fecha = date("Y-m-d H:i:s");
        $arr = json_decode($post['tabla_co']);
        $post['tabla_co'] = null;
        unset($post['tabla_co']);
        $post['art_dcreation'] = $fecha;
        $post['art_tipo'] = "combos";
        $post['art_usrcreation'] = $this->session->userdata('iduser');

        if($post['art_isiva'] == true){
            $iva = 1 . "." . $this->session->userdata('iva');
            $val = ($post['art_pvp1'] / $iva);
            $post['art_pvp1'] = number_format($val,2,".","");

        }

        switch ($cat) {
            case 'add':

                $this->db->insert('app_art', $post);
                $idcombos = $this->db->insert_id();
                foreach ($arr as $d) {
                    $arr2 = array(
                        'id_fkcombos' => $idcombos,
                        'id_fkart' => $d->id,
                        'cocant' => $d->Valor
                 );                        

                   $this->db->insert('app_cobody', $arr2);

                }
                echo 1;
                break;
            case 'edit':

                $id = $post['idarticulos'];
                unset($post['idarticulos']);
                $this->db->where('id_fkcombos', $id);
                $this->db->delete('app_cobody');

                $this->db->where('idarticulos', $id);
                $this->db->update('app_art', $post);
                foreach ($arr as $d) {
                    $arr2 = array(
                        'id_fkcombos' => $id,
                        'id_fkart' => $d->id,
                        'cocant' => $d->Valor
                    );

                    $this->db->insert('app_cobody', $arr2);
                    echo 1;
                }
                break;
            default:
                # code...
                break;
        }

    }

    public function co_bus($post)
    {
      /* $post['art_bus'] = 'cho';
        $post['limit'] ='0';*/
        $art_array = $post;
        $art_bus = $art_array['art_bus'];
        $art_limit = $art_array['limit'];
        $limite = ($art_limit - 1) * 6;

        $querya = $this->db->query('SELECT * FROM app_art co, app_line line where line.line_company = "' . $this->session->userdata('idcompany') . '" and co.art_fkidline=line.idline and co.art_name like "%' . trim($art_bus) . '%" and art_tipo="combos"  ORDER BY co.art_fkidline ASC;');
        $numerosq = $querya->num_rows();

        $queryc = $this->db->query('SELECT * FROM app_art co, app_line line where line.line_company = "' . $this->session->userdata('idcompany') . '" and co.art_fkidline=line.idline and co.art_name like "%' . trim($art_bus) . '%" and art_tipo="combos"  ORDER BY co.art_fkidline ASC  LIMIT ' . round(abs($limite), 0, PHP_ROUND_HALF_DOWN) . ',6;');

        $numeros = $queryc->num_rows();
        $resultado = $queryc->result();
        //echo $numeros;
        $dividir = ($numerosq / 2);
        if (is_float($dividir)) {
            $paginado = round(($numerosq / 6), 0, PHP_ROUND_HALF_DOWN) + 1;
        } else if ($numerosq == 2) {
            $paginado = round(($numerosq / 6), 0, PHP_ROUND_HALF_DOWN) + 1;

        } else {
            $paginado = round(($numerosq / 6), 0);
        }
        $result['page'] = $paginado;

        if ($numeros > 0) {
            $result['bus'] = 1;
            foreach ($resultado as $row) {
                $line_name = $row->art_name;
                $line_id = $row->idarticulos;
                $result[] = array(
                    'art_name' => $line_name,
                    'idarticulos' => $line_id,
                    'art_isiva' => $row->art_isiva,
                    'art_pvp1' => $row->art_pvp1  
                );

            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE);

        } else {
            $result['bus'] = 0;
            $result[] = array(
                'art_name' => '',
                'idarticulos' => '',
                'art_isiva' => '',
                'art_pvp1' => '¿'  
            );
            echo json_encode($result, JSON_UNESCAPED_UNICODE);

        }
    }

    public function obt_co($id)
    {

        $where = 'idarticulos = "' . $id . '" and art_tipo ="combos"';
        $queryc = $this->db->select('*')
            ->from('app_art')
            ->where($where)
            ->get();
        $numeros = $queryc->num_rows();
        $resultado = $queryc->result();
        if ($numeros > 0) {
            date_default_timezone_set('America/Guayaquil');
            setlocale(LC_ALL, "es_ES");
            foreach ($resultado as $row) {
                $where2 = 'id_fkcombos = "' . $id . '"';
                $queryc2 = $this->db->query('SELECT idarticulos, art_name, cocant FROM app_cobody co, app_art art where co.id_fkart = art.idarticulos and co.id_fkcombos= "' . $id . '";');;
                $arr = $queryc2->result();
                $sel_line[] = array(
                   0 => $row,
                   1 => $arr
                    );

            }
            return json_encode($sel_line, JSON_UNESCAPED_UNICODE);
        } else {
            return "0";
        }
    }

    public function del_co($post)
    {
        $id = $post['idarticulos'];
        $this->db->where('idarticulos', $id);
        $this->db->delete('app_art');
    }

}