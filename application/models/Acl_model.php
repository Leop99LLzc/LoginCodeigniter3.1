<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acl_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Carga la base de datos
    }

    // Obtener los roles de un usuario
    public function get_user_roles($user_id) {
        $this->db->select('roles.role_name');
        $this->db->from('users');
        $this->db->join('user_roles', 'user_roles.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_roles.role_id');
        $this->db->where('users.id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Verificar si un usuario tiene un permiso
    public function has_permission($user_id, $permission) {
        $roles = $this->get_user_roles($user_id);

        foreach ($roles as $role) {
            $this->db->select('permissions.permission_name');
            $this->db->from('roles');
            $this->db->join('role_permissions', 'role_permissions.role_id = roles.id');
            $this->db->join('permissions', 'permissions.id = role_permissions.permission_id');
            $this->db->where('roles.role_name', $role['role_name']);
            $this->db->where('permissions.permission_name', $permission);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return true;
            }
        }

        return false;
    }
}
