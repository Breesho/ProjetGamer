<?php

// application/models/Login_model.php

class Login_model extends CI_Model {

    function can_login($email, $password)
    {
        $this->db->where('User_Mail', $email);
        $query = $this->db->get('user');
        if( $query->num_rows() > 0 ) {
            foreach( $query->result() as $row) {
                if( $row->User_Is_Email_Verified == 1) {
                    $store_password = $this->encryption->decrypt($row->User_Password);
                    if( $password == $store_password ) {
                        $this->session->set_userdata('id', $row->ID_User);
                    } else {
                        return 'Mot de passe incorrecte.';
                    }
                } else {
                    return "Veuillez valider votre adresse email avant de vous connecter.";
                }
            }
        } else {
            return "Adresse email invalide.";
        }
    }
}