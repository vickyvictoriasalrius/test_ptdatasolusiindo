<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            return $query->row(); 
        } else {
            return false; 
        }
    }
}
?>
