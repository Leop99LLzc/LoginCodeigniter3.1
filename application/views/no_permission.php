<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Denegado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            margin: 50px auto;
            max-width: 600px;
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #e74c3c;
        }
        p {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Acceso Denegado</h1>
    <p>No tienes permiso para acceder a esta página.</p>
    <a href="<?php echo site_url('auth/logout'); ?>">Cerrar sesión</a>
</div>

</body>
</html>
