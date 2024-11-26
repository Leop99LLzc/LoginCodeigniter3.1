<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Acl_model');
        $this->load->library('session');

        // Verifica si el usuario tiene permiso para ver el dashboard
        $user_id = $this->session->userdata('user_id');
        if (!$this->Acl_model->has_permission($user_id, 'view_dashboard')) {
            redirect('no_permission');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $roles = $this->Acl_model->get_user_roles($user_id);

        // Obtener datos del usuario
        $this->db->select('full_name, username');
        $this->db->where('id', $user_id);
        $user = $this->db->get('users')->row_array();

        // Enviar datos a la vista
        $data['roles'] = $roles;
        $data['user'] = $user;
        $this->load->view('dashboard', $data);
    }
}
