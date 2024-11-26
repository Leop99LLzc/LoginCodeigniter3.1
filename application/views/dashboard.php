<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
            color: #333;
        }
        p {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bienvenido al Aula Virtual</h1>
    <p>
        Hola <strong><?php echo $user['full_name']; ?></strong> (<?php echo $user['username']; ?>),
    </p>
    <p>
        <?php if (!empty($roles)): ?>
            <?php if ($roles[0]['role_name'] == 'admin'): ?>
                como Director, tiene acceso completo para gestionar el sistema y visualizar reportes.
            <?php elseif ($roles[0]['role_name'] == 'editor'): ?>
                como Docente, puede asignar y editar notas de los estudiantes.
            <?php elseif ($roles[0]['role_name'] == 'user'): ?>
                como Alumno, puede consultar sus notas y dejar comentarios.
            <?php endif; ?>
        <?php endif; ?>
    </p>
    <a href="<?php echo site_url('auth/logout'); ?>">Cerrar sesión</a>
</div>

</body>
</html>
