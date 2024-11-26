<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| CUSTOM ROUTES
| -------------------------------------------------------------------
*/

$route['default_controller'] = 'auth';  // Página de login por defecto
$route['no_permission'] = 'acl/no_permission';  // Página de acceso denegado
$route['dashboard'] = 'dashboard/index';  // Acceso a dashboard, solo si el usuario tiene permiso

// Otras rutas personalizadas que puedas tener...

// Rutas por defecto de CodeIgniter
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

