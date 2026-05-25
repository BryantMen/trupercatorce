<?php
session_start();
if(!isset($_SESSION['admin_logueado'])){
    header('Location: login.php');
    exit;
}
include('conexion.php');

if(isset($_GET['eliminar'])){
    $id = $_GET['eliminar'];
    $conexion->query("DELETE FROM herramientas WHERE id = $id");
    echo "<script>alert('Registro eliminado correctamente'); window.location='admin.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Truper</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-small {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            overflow: hidden;
        }
        
        .logo-small img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .header-left h1 {
            font-size: 24px;
        }
        
        .header-left p {
            font-size: 12px;
            color: #aaa;
        }
        
        .header-buttons {
            display: flex;
            gap: 15px;
        }
        
        .btn-agregar-header {
            background: #28a745;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        
        .btn-agregar-header:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        .btn-cerrar {
            background: #dc3545;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        
        .btn-cerrar:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        
        .dashboard-content {
            padding: 30px 40px;
        }
        
        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .card h3 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .card .numero {
            font-size: 36px;
            font-weight: bold;
            color: #ff6600;
        }
        
        .tabla-container {
            background: white;
            border-radius: 15px;
            overflow-x: auto;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        
        thead {
            background: linear-gradient(135deg, #ff6600, #e65500);
            color: white;
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .acciones {
            display: flex;
            gap: 10px;
        }
        
        .btn-editar {
            background: #007bff;
            color: white;
            padding: 6px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
            transition: all 0.2s ease;
            display: inline-block;
            text-align: center;
            min-width: 70px;
        }
        
        .btn-editar:hover {
            background: #0056b3;
        }
        
        .btn-eliminar {
            background: #dc3545;
            color: white;
            padding: 6px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
            transition: all 0.2s ease;
            display: inline-block;
            text-align: center;
            min-width: 70px;
        }
        
        .btn-eliminar:hover {
            background: #c82333;
        }
        
        .footer-dashboard {
            margin-top: 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .acciones {
                flex-direction: column;
            }
            th, td {
                padding: 8px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <div class="header-left">
            <div class="logo-small">
                <img src="imagenes/logo.png" alt="Truper">
            </div>
            <div>
                <h1>Panel de Control Truper</h1>
                <p>Gestion de inventario - Equipo 14</p>
            </div>
        </div>
        <div class="header-buttons">
            <a href="insertar.php" class="btn-agregar-header">Agregar Herramienta</a>
            <a href="logout.php" class="btn-cerrar">Cerrar Sesion</a>
        </div>
    </div>
    
    <div class="dashboard-content">
        <?php
        $total_registros = $conexion->query("SELECT COUNT(*) as total FROM herramientas")->fetch_assoc()['total'];
        $total_stock = $conexion->query("SELECT SUM(stock) as total FROM herramientas")->fetch_assoc()['total'];
        ?>
        
        <div class="info-cards">
            <div class="card">
                <h3>Total de Herramientas</h3>
                <div class="numero"><?php echo $total_registros; ?></div>
            </div>
            <div class="card">
                <h3>Unidades en Stock</h3>
                <div class="numero"><?php echo number_format($total_stock); ?></div>
            </div>
            <div class="card">
                <h3>Ultima actualizacion</h3>
                <div class="numero" style="font-size: 16px;"><?php echo date('d/m/Y'); ?></div>
            </div>
        </div>
        
        <div class="tabla-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Herramienta</th>
                        <th>Precio (MXN)</th>
                        <th>Stock</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $resultado = $conexion->query("SELECT * FROM herramientas ORDER BY id DESC");
                    while($fila = $resultado->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                        <td>$<?php echo number_format($fila['precio'], 2); ?></td>
                        <td><?php echo $fila['stock']; ?></td>
                        <td><?php echo isset($fila['fecha_registro']) ? $fila['fecha_registro'] : date('Y-m-d'); ?></td>
                        <td class="acciones">
                            <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn-editar">Editar</a>
                            <a href="admin.php?eliminar=<?php echo $fila['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar ' + '<?php echo addslashes($fila['nombre']); ?>' + '? Esta accion no se puede deshacer.');">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="footer-dashboard">
            <p>Truper - Sistema de Gestion de Inventario | Instituto Tecnologico de Oaxaca</p>
        </div>
    </div>
</body>
</html>
