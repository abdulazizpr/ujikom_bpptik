<?php

class Login_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }

    // cek keberadaan user di sistem
    function check_user_login($username, $password){
        $this->db->select('*');
        $this->db->from('aap_login');
        $this->db->where('aap_username', $username);
        $this->db->where('aap_password', $password);
    
        return $this->db->get();
    }
    

}