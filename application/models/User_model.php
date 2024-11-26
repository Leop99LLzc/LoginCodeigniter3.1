<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Cargar la base de datos
    }

    // Obtener usuario por nombre de usuario
    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        return $this->db->get('users')->row_array();
    }

    // Verificar si el usuario existe y la contraseña es correcta
    public function login($username, $password) {
        // Buscar el usuario en la base de datos
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            
            // Verificar la contraseña (en este caso en texto claro, pero recomendamos usar hashing)
            if ($password == $user->password) {
                return $user;
            }
        }
        return false; // Si no se encuentra el usuario o la contraseña es incorrecta
    }

    // Obtener los roles del usuario
    public function get_user_roles($user_id) {
        $this->db->select('roles.role_name');
        $this->db->from('users');
        $this->db->join('user_roles', 'user_roles.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_roles.role_id');
        $this->db->where('users.id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Obtener permisos de un rol
    public function get_role_permissions($role_id) {
        $this->db->select('permissions.permission_name');
        $this->db->from('roles');
        $this->db->join('role_permissions', 'role_permissions.role_id = roles.id');
        $this->db->join('permissions', 'permissions.id = role_permissions.permission_id');
        $this->db->where('roles.id', $role_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
