<?php

/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Articulos extends CI_Model
{
    public function add_mp($v,$a)
    {
         date_default_timezone_set('America/Guayaquil');
        setlocale(LC_ALL, "es_ES");
        $fecha = date("Y-m-d H:i:s");
        switch ($a) {
            case 'add':
                $v['mp_dcreate'] = $fecha;
                $v['mp_dupdate'] = $fecha;
                $v['mp_idcompany'] = $this->session->userdata('idcompany');
                $this->db->insert('app_mp', $v);
                break;
            case 'edit':
                $id = $v['idmateriaprima'];
                unset($v['idmateriaprima']);
                $this->db->where('idmateriaprima', $id);
                $this->db->update('app_mp', $v);
                break;
            case 'carg':
            $sql = $this->db->query('SELECT * FROM app_mp WHERE idmateriaprima = "'.$v['idmateriaprima'].'" and mp_idcompany = "'.$this->session->userdata('idcompany').'"');
        $resultado = $sql->result();
        $numerosq = $sql->num_rows();
        if($numerosq > 0){
                    echo json_encode($resultado);

                }else{
                    $aa = array(array('idmateriaprima' => '',
                            'mp_nombre' => '',
                            "mp_cant" => ''));
                    $arrayName = $aa;
                   
                    echo json_encode($arrayName);
                }
                break;
            default:
                
                break;
        }
    }

    public function add_art($post,$cat)
    {
        date_default_timezone_set('America/Guayaquil');
        setlocale(LC_ALL, "es_ES");
        $fecha = date("Y-m-d H:i:s");
                $pp = $post['materiaprima'];  //1 idmp 2 cantidad
                $c = explode("-", $pp);
                unset($post['materiaprima']);
        switch ($cat) {
            case 'add':
                $post['art_dcreation'] = $fecha;
                $post['art_usrcreation'] = $this->session->userdata('iduser');

                $this->db->insert('app_art', $post);
               /* $po = array(
                    "fkidarticulos"=> $this->db->insert_id(),
                    "art_stock"=> "0"
                );
                $this->db->insert('app_stock', $po);*/
                $idart = $this->db->insert_id();
                foreach ($c as $key) {
                    $id_cant = explode(";", $key);

                    $datosmp = array(
                        'idartfk' => $idart,
                        'idmpfk' => $id_cant[0],
                        'cantxart' => $id_cant[1] 
                     );
                    //echo var_dump($datosmp);
                    $this->db->insert('app_bart', $datosmp);
                }

                break;
            case 'edit':
                $id = $post['idarticulos'];
                unset($post['idarticulos']);
                $this->db->where('idarticulos', $id);
                $this->db->update('app_art', $post);
                foreach ($c as $key) {
                    $id_cant = explode(";", $key);
         $sql2 = $this->db->query('SELECT * FROM app_bart WHERE idmpfk = "'.$id_cant[0].'" and idartfk = "'.$id.'"');
        $resultado2 = $sql2->result();
        $numerosq2 = $sql2->num_rows();
        if($numerosq2 >0){
                               $datosmp = array(
                        'idartfk' => $id,
                        'idmpfk' => $id_cant[0],
                        'cantxart' => $id_cant[1] 
                     );
                    //echo var_dump($datosmp);
                    $this->db->where(array('idmpfk'=> $id_cant[0],'idartfk'=> $id));
                    $this->db->update('app_bart', $datosmp); 
                }else{
                     $datosmp = array(
                        'idartfk' => $id,
                        'idmpfk' => $id_cant[0],
                        'cantxart' => $id_cant[1] 
                     );
                    //echo var_dump($datosmp);
                    $this->db->insert('app_bart', $datosmp);
                }

                }
                break;
            default:
                # code...
                break;
        }
        
    }
    public function obtMateriaPrima()
    {
        $sql = $this->db->query('SELECT * FROM app_mp WHERE mp_idcompany = "'.$this->session->userdata('idcompany').'"');
        $resultado = $sql->result();
        $numerosq = $sql->num_rows();
        if($numerosq > 0){
                    return $resultado;

                }else{
                    $aa = array(array('idmateriaprima' => '',
                            'mp_nombre' => ''));
                    $arrayName = $aa;
                   
                    return json_decode(json_encode($arrayName),false);
                }
        
    }
    public function obtMateriaPrimax()
    {
        $sql = $this->db->query('SELECT * FROM app_mp WHERE mp_idcompany = "'.$this->session->userdata('idcompany').'"');
        $resultado = $sql->result();
        $numerosq = $sql->num_rows();
        if($numerosq > 0){
                    echo json_encode($resultado);

                }else{
                    $aa = array(array('idmateriaprima' => '',
                            'mp_nombre' => ''));
                    $arrayName = $aa;
                   
                    echo json_encode($arrayName);
                }
        
    }    
    public function art_bus($post)
    {
      /* $post['art_bus'] = 'cho';
        $post['limit'] ='0';*/
        $art_array = $post;
        $art_bus = $art_array['art_bus'];
        $art_limit = $art_array['limit'];
        $limite = ($art_limit-1)*6;
       
        $querya = $this->db->query('SELECT * FROM app_art art, app_line line where line.line_company = "' . $this->session->userdata('idcompany') . '" and art.art_fkidline=line.idline and art.art_name like "%' . trim($art_bus) . '%"  ORDER BY art.art_fkidline ASC;');
        $numerosq = $querya->num_rows();

        $queryc = $this->db->query('SELECT * FROM app_art art, app_line line where line.line_company = "' . $this->session->userdata('idcompany') . '" and art.art_fkidline=line.idline and art.art_name like "%'.trim($art_bus).'%" ORDER BY art.art_fkidline ASC  LIMIT '. round(abs($limite), 0, PHP_ROUND_HALF_DOWN) .',6;');

        $numeros = $queryc->num_rows();
        $resultado = $queryc->result();
        //echo $numeros;
        $dividir = ($numerosq / 2);
        if(is_float($dividir)){
            $paginado = round(($numerosq/6), 0, PHP_ROUND_HALF_DOWN) +1;
        }else if($numerosq == 2){
            $paginado = round(($numerosq / 6), 0, PHP_ROUND_HALF_DOWN) + 1;

        }
        else{
            $paginado = round(($numerosq / 6), 0);
        }
        $result['page'] = $paginado;
       
        if ($numeros > 0) 
        {
            $result['bus'] = 1;
            foreach ($resultado as $row) {
               $line_name = $row->art_name;
               $line_id = $row->idarticulos;
                $result[] = array(
                    'art_name' => $line_name , 
                    'idarticulos' => $line_id , 
                    'art_isiva' => $row->art_isiva , 
                    'art_pvp1' => $row->art_pvp1  
                );

            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE);

        }else{
            $result['bus'] = 0;
            $result[] = array(
                'art_name' => '',
                'idarticulos' => '',
                'art_isiva' => '',
                'art_pvp1' => ''  
            );
            echo json_encode($result, JSON_UNESCAPED_UNICODE);

        }
    }

    public function obt_art($id)
    {

        $where = 'idarticulos = "'.$id.'"';
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
                $art_name = $row->art_name;
                $art_descrip = $row->art_descrip;
                $art_fkidline = $row->art_fkidline;
                $art_pvp1 = $row->art_pvp1;

                $art_costo = $row->art_costo;
                $art_isiva = $row->art_isiva;

                $sel_line[] = $row;

        $where2 = 'idartfk = "'.$id.'"';
        $queryc2 = $this->db->select('*')
              
            ->from('app_bart')
            ->where($where2)
            ->get();
        $numeros2 = $queryc2->num_rows();
        $resultado2 = $queryc2->result();
            foreach ($resultado2 as $row2) {
            $sel_line['materiaprima'][] = $row2;
               }
            }
            return json_encode($sel_line, JSON_UNESCAPED_UNICODE);
        } else {
            return "0";
        }
    }
    public function obt_artxline($id)
    {

        $where = 'art_fkidline = "' . $id . '" and art_status="1"';
        $queryc = $this->db->select('idarticulos,art_name,art_pvp1,art_isiva,art_tipo')
            ->from('app_art')
            ->where($where)
            ->get();
        $numeros = $queryc->num_rows();
        $resultado = $queryc->result();
        if ($numeros > 0) {
            date_default_timezone_set('America/Guayaquil');
            setlocale(LC_ALL, "es_ES");
            foreach ($resultado as $row) {
                $art_name = $row->art_name;
                $art_pvp1 = $row->art_pvp1;

                $idarticulos = $row->idarticulos;
                $art_isiva = $row->art_isiva;


                $sel_line[] = array(
                    "art_name"=> $art_name,
                    "art_pvp1"=> $art_pvp1,
                    "idarticulos"=> $idarticulos,
                    "art_isiva"=> $art_isiva,
                    "art_tipo"=> $row->art_tipo
                );

            }
            return json_encode($sel_line, JSON_UNESCAPED_UNICODE);
        } else {
           
                $sel_line[] = array(
                    "art_name" => "",
                    "art_pvp1" => "",
                    "idarticulos" => "",
                    "art_isiva" => "",
                    "tipo" => ""
                );
                return json_encode($sel_line, JSON_UNESCAPED_UNICODE);
            
        }
    }
    public function del_art($post)
    {
        $id = $post['idarticulos'];
        $this->db->where('idarticulos', $id);
        $this->db->delete('app_art');
    }
    
}