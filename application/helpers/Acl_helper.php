<?php
if (!function_exists('check_permission')) {
    function check_permission($permission) {
        $CI =& get_instance();
        $CI->load->model('Acl_model');
        $user_id = $CI->session->userdata('user_id');
        
        if ($user_id && $CI->Acl_model->has_permission($user_id, $permission)) {
            return true;
        }
        
        // Si no tiene permiso, redirigir o mostrar mensaje
        redirect('no_permission'); // Ruta a donde redirigir si no tiene permiso
    }
}
