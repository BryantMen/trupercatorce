<?php
session_start();
if(!isset($_SESSION['admin_logueado'])){
    header('Location: login.php');
    exit;
}
include('conexion.php');

$id = intval($_GET['id']);
$mensaje = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $precio = floatval($_POST['precio']);
    $stock = intval($_POST['stock']);
    
    $sql = "UPDATE herramientas SET nombre='$nombre', precio=$precio, stock=$stock WHERE id=$id";
    
    if($conexion->query($sql)){
        $mensaje = '<div class="mensaje-exito">Herramienta actualizada correctamente</div>';
    } else {
        $mensaje = '<div class="mensaje-error">Error: ' . $conexion->error . '</div>';
    }
}

$resultado = $conexion->query("SELECT * FROM herramientas WHERE id=$id");
$fila = $resultado->fetch_assoc();
if(!$fila){
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Herramienta - Truper</title>
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
            padding: 40px;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header-form {
            background: linear-gradient(135deg, #ff6600, #e65500);
            padding: 30px;
            text-align: center;
        }
        
        .logo-form {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 15px;
        }
        
        .logo-form img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .header-form h2 {
            color: white;
            font-size: 28px;
        }
        
        .header-form p {
            color: rgba(255,255,255,0.9);
            font-size: 14px;
            margin-top: 5px;
        }
        
        .form-body {
            padding: 40px;
        }
        
        .input-group {
            margin-bottom: 25px;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
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
        
        .btn-actualizar {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-actualizar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0,123,255,0.4);
        }
        
        .btn-volver-from {
            width: 100%;
            padding: 14px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            display: block;
            text-decoration: none;
            margin-top: 15px;
            transition: all 0.3s ease;
        }
        
        .btn-volver-from:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        
        .mensaje-exito {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            border-left: 4px solid #007bff;
        }
        
        .mensaje-error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            border-left: 4px solid #dc3545;
        }
        
        .info-id {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-form">
            <div class="logo-form">
                <img src="imagenes/logo.png" alt="Truper">
            </div>
            <h2>Editar Herramienta</h2>
            <p>Modifique los datos del producto</p>
        </div>
        <div class="form-body">
            <?php echo $mensaje; ?>
            <div class="info-id">Editando ID: <?php echo $fila['id']; ?></div>
            <form method="POST">
                <div class="input-group">
                    <label>Nombre de la herramienta</label>
                    <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required>
                </div>
                <div class="input-group">
                    <label>Precio (MXN)</label>
                    <input type="number" step="0.01" name="precio" value="<?php echo $fila['precio']; ?>" required>
                </div>
                <div class="input-group">
                    <label>Stock disponible</label>
                    <input type="number" name="stock" value="<?php echo $fila['stock']; ?>" required>
                </div>
                <button type="submit" class="btn-actualizar">Actualizar herramienta</button>
                <a href="admin.php" class="btn-volver-from">Volver al panel</a>
            </form>
        </div>
    </div>
</body>
</html>
