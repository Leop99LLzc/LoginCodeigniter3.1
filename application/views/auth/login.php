<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Aula Virtual</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .login-container {
            width: 400px;
            margin: 100px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .login-container input[type="text"], 
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-container button:hover {
            background: #2980b9;
        }
        .error-message {
            color: #e74c3c;
            margin-bottom: 15px;
            text-align: center;
        }
        .info-message {
            color: #3498db;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Aula Virtual</h1>

    <!-- Mostrar mensaje de error si la autenticación falla -->
    <?php if ($this->session->flashdata('error')): ?>
        <p class="error-message"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?php echo site_url('auth/login'); ?>" method="post">
        <label for="username">Nombre de Usuario</label>
        <input type="text" name="username" id="username" placeholder="Ingrese su nombre de usuario" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <p class="info-message">¿Olvidaste tu contraseña? Contacta con el administrador.</p>
</div>

</body>
</html>
