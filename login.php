<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    
    if ($usuario == '24160720@itoaxaca.edu.mx' && $password == '24160720ito') {
        $_SESSION['admin_logueado'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Acceso denegado. Verifique sus credenciales.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion - Truper</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            width: 420px;
            padding: 40px;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .logo-login {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-circle {
            width: 80px;
            height: 80px;
            background: #f0f0f0;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 15px;
            box-shadow: 0 5px 15px rgba(255,102,0,0.2);
        }
        
        .logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .logo-login h2 {
            color: #ff6600;
            font-size: 24px;
        }
        
        .logo-login p {
            color: #666;
            font-size: 14px;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }
        
        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus {
            outline: none;
            border-color: #ff6600;
            box-shadow: 0 0 0 3px rgba(255,102,0,0.1);
        }
        
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ff6600, #e65500);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255,102,0,0.4);
        }
        
        .error-message {
            background: #fee;
            color: #c00;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-left: 4px solid #c00;
        }
        
        .btn-volver {
            text-align: center;
            margin-top: 25px;
        }
        
        .btn-volver a {
            display: inline-block;
            padding: 10px 25px;
            background: #f0f0f0;
            color: #666;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        
        .btn-volver a:hover {
            background: #ff6600;
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-login">
            <div class="logo-circle">
                <img src="imagenes/logo.png" alt="Truper">
            </div>
            <h2>Iniciar Sesion</h2>
            <p>Sistema de gestion de inventario</p>
        </div>
        
        <?php if($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="input-group">
                <label>Correo electronico</label>
                <input type="email" name="usuario" placeholder="usuario@itoaxaca.edu.mx" required>
            </div>
            <div class="input-group">
                <label>Contrasena</label>
                <input type="password" name="password" placeholder="Ingrese su contrasena" required>
            </div>
            <button type="submit">Iniciar Sesion</button>
        </form>
        
        <div class="btn-volver">
            <a href="index.php">← Volver al inicio</a>
        </div>
    </div>
</body>
</html>
