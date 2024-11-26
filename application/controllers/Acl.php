<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Acl_model');
        $this->load->library('session');
    }

    // Verificar si el usuario tiene un permiso
    public function check_permission($permission) {
        $user_id = $this->session->userdata('user_id');
        
        if ($user_id && $this->Acl_model->has_permission($user_id, $permission)) {
            return true;
        }
        
        // Si no tiene permiso, redirigir o mostrar mensaje
        redirect('no_permission'); // Ruta a donde redirigir si no tiene permiso
    }

    public function no_permission() {
        $this->load->view('no_permission');
    }
    
}
