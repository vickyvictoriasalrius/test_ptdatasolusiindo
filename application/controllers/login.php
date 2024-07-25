<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    // Menampilkan halaman login
    public function index() {
        $this->load->view('login_view');
    }

    // Memproses login
    public function process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        // Memeriksa kredensial login
        $user = $this->User_model->check_login($username, $password);
        
        if ($user) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}
?>
