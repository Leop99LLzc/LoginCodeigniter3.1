<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Modelo para usuarios
        $this->load->library('session'); // Librería de sesión
    }

    // Mostrar formulario de login
    public function index() {
        $this->load->view('auth/login');
    }

    // Procesar login
    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Verificar credenciales en la base de datos
        $user = $this->User_model->get_user_by_username($username);

        if ($user && $user['password'] === $password) { // Aquí puedes usar password_verify si las contraseñas están cifradas
            // Configurar datos de sesión
            $this->session->set_userdata([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'full_name' => $user['full_name'],
                'role_id' => $user['role_id']
            ]);

            // Redirigir al dashboard
            redirect('dashboard');
        } else {
            // Si las credenciales son incorrectas
            $this->session->set_flashdata('error', 'Nombre de usuario o contraseña incorrectos.');
            redirect('auth');
        }
    }

    // Cerrar sesión
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
