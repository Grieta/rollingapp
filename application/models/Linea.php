<?php
/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Linea extends CI_Model {

    public function add_line($post){
        $line_data = $post;
        $line_name = $line_data['line_name'];
        $line_order = $line_data['line_order'];

        $data = array(
            'line_name' => strtoupper($line_name),
            'line_order' => $line_order,
            'line_company' => $this->session->userdata('idcompany'),
            'line_status' => '1'
        );

        $this->db->insert('app_line', $data);
    }

    public function sel_line()
    {
        
            $where = '(line_company = "'.$this->session->userdata('idcompany').'" AND line_status = "1")';
            $queryc = $this->db->select('*')
                ->from('app_line')
                ->where($where)
                ->order_by('line_order','ASC')
                ->get();

            $numeros = $queryc->num_rows();
            $resultado = $queryc->result();
            $sel_line = null;
        if($numeros>0){
            date_default_timezone_set('America/Guayaquil');
            setlocale(LC_ALL, "es_ES");
            foreach ($resultado as $row) {
                $line_name = $row->line_name;
                $line_id = $row->idline;
                $line_order = $row->line_order;

                $sel_line[] = array(
                    'id'=>$line_id,
                    'name'=>$line_name,
                    'order'=>$line_order
                );
                
            }
            return json_encode($sel_line, JSON_UNESCAPED_UNICODE);
        }else{
            return "0";
        }
    }
    
    public function sel_line_converter($json_line)
    {
        $lineas = json_decode($json_line, true);

        $length = count($lineas);

        $sel_line = '<option value="0" selected>SELECCIONAR LINEA...</option>';

        for($i = 0; $i < $length; $i++){
            $line_id = $lineas[$i]['id'];
            $line_name = $lineas[$i]['name'];
            
            $sel_line .= '
            <option value="' . $line_id . '">' . $line_name . '</option>
            ';
        }

        return $sel_line;

    }

    public function sel_line_nestable($json_line)
    {
        $lineas = json_decode($json_line, true);

        $length = count($lineas);

        $sel_line = '';

        for ($i = 0; $i < $length; $i++) {
            $line_id = $lineas[$i]['id'];
            $line_name = $lineas[$i]['name'];
            $line_order = $lineas[$i]['order'];

            $sel_line .= '
                <li class="dd-item list-group" data-id="' . $line_id . '">
                    <div class="dd-handle btn btn-default-light"></div>
                    <div class="editar btn btn-default-light"><div style="display: inline;">' . $line_name . '</div> </div>
                    <i class="editar_nes fa fa-pencil linear btn btn-info" style="left:84%;padding:9px 0px;color:#17a2b8;"  class="" ></i>
                    <div class="cerrar_nes linear btn btn-danger">X</div>
                </li>            
                ';
        }

        return $sel_line;

    }

    public function change_order($json_lineorder)
    {
        $line_order = json_decode($json_lineorder,true);
        $count_order = count($line_order);

        for($i = 0 ; $i<$count_order;$i++)
        {
            $idline = $line_order[$i]["id"];

            $data = array(
                'line_order' => $i
            );

            $this->db->where('idline', $idline);
            $this->db->update('app_line', $data);

        }
        return 1;
    }
    public function editdel_line($post,$valor)
    {
        $line_data = $post;
        $line_name = $line_data['line_name'];
        $idline = $line_data['idline'];
        switch ($valor) {
            case 'del':
                $this->db->delete('app_line', array('idline' => $idline));
                break;
            case 'edit':
                $data = array(
                    'line_name' => $line_name,
                );

                $this->db->where('idline', $idline);
                $this->db->update('app_line', $data);
                return 1;
                break;
            default:
                # code...
                break;
        }

    }
}

?>