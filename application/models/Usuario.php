<?php
/**
 * Created by PhpStorm.
 * User: CRISLIZAME
 * Date: 9/8/2018
 * Time: 18:04
 *
 */
class Usuario extends CI_Model {

    public function insertar_usuario($username,$usr_pass,$usr_dcreation,$usr_position,$fk_idcompany){
        $data = array(
            'usr_username' => $username,
            'usr_pass' => md5($usr_pass),
            'usr_dcreation' => $usr_dcreation,
            'usr_position' => $usr_position,
            'fk_idcompany' => $fk_idcompany
        );

        $this->db->insert('app_user', $data);
    }
    public function auth_login ($username,$pass){
        $query = $this->db->select('*')
             ->from('app_user')
             ->where('usr_username', $username)
          ->where('usr_pass', md5($pass))
         ->get();
            $resultado = $query->result();
        $numeros = $query->num_rows();
        if($numeros>0){
            foreach ($resultado as $row)
            {

                 $iduser = $row->iduser;
                 $company = $row->fk_idcompany;
                 $estado = $row->usr_status;
                $queryc = $this->db->select('*')
                    ->from('app_company')
                    ->where('idcompany', $company)
                    ->get();
                $row3 = $queryc->row();
                if($estado<=2){
                    if($row3->c_status<=2){
                        $query2 = $this->db->select('*')
                            ->from('app_userdata')
                            ->where('fk_iduser', $iduser)
                            ->get();
                        $row2 = $query2->row();
                        $this->session->set_userdata('name', $row2->ud_name);
                        $this->session->set_userdata('lastname', $row2->ud_lastname);
                        $this->session->set_userdata('email', $row2->ud_email);
                        $this->session->set_userdata('company', $row3->c_name);
                        $this->session->set_userdata('c_identy', $row3->c_identy);
                        $this->session->set_userdata('plan', $row3->c_plan);
                        $this->session->set_userdata('username', $row->usr_username);
                        $this->session->set_userdata('iduser', $row->iduser);
                        $this->session->set_userdata('cargo', $row->usr_position);
                        $this->session->set_userdata('idcompany', $company);
                        $this->session->set_userdata('iva', $row3->c_iva);
                        echo 'Ingreso con Éxito.'.';'.'1';
                    }else{
                        echo 'Empresa en estado bloqueado o suspendido.'.';'.'3';
                    }
                }else{
                    echo 'Usuario se encuentra bloqueado o suspendido.'.';'.'2';
                }




            }
        }else{
            return 'No encontrado'.';'.'4';
        }



    }
}