<?php
/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Noti extends CI_Model
{
    public function obnotis()
    {
        $where = '(noti_idcompany = "'.$this->session->userdata('idcompany').'" OR noti_iduser = "'.$this->session->userdata('iduser').'")';
        $queryc = $this->db->select('*')
                ->from('app_noti')
                ->where($where)
                ->where('noti_isnew = "TRUE"')
                ->get();

        $numeros = $queryc->num_rows();
        if ($numeros>0) {
            date_default_timezone_set('America/Guayaquil');
            setlocale(LC_ALL, "es_ES");

            $row3 = $queryc->row();
            usleep(100000);
            clearstatcache();
            $title = $row3->noti_title;
            $id = $row3->idnoti;
            $icono = $row3->noti_icon;
            $fecha =strftime("%d, %B %Y", strtotime($row3->noti_datetime));
            $data = array(
                'noti_isnew' => "FALSE"
                        );

            $this->db->where('idnoti', $id);
            $this->db->update('app_noti', $data);
            echo $title.';'.ucwords($fecha).';'.$icono.';1';
        } else {
            echo '2';
        }
    }
    public function llenarnotis()
    {
        $where = '(noti_idcompany = "'.$this->session->userdata('idcompany').'" OR noti_iduser = "'.$this->session->userdata('iduser').'")';
        $queryc = $this->db->select('*')
        ->from('app_noti')
        ->where($where)
        ->where('noti_isnew = "FALSE"')
        ->order_by('idnoti', 'DESC')
        ->limit(10)
        ->get();
        $result = null;
        $numeros = $queryc->num_rows();
        $resultado = $queryc->result();
        if ($numeros>0) {
            date_default_timezone_set('America/Guayaquil');
            setlocale(LC_ALL, "es_ES");
            foreach ($resultado as $row) {
                $title = $row->noti_title;
                $id = $row->idnoti;
                $icono = $row->noti_icon;
                $fecha =strftime("%d, %B %Y", strtotime($row->noti_datetime));

                $result[] = array('title'=>$title,
                'fecha'=>ucwords($fecha),
                'icono'=>$icono,
                'status'=>'1'
            );
            }
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return '0';
        }
    }
}
