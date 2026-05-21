<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truper | Herramientas Profesionales</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #ff6600 0%, #e65500 100%);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-img {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .logo-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .logo-text {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        
        .logo-text small {
            font-size: 14px;
            font-weight: normal;
            display: block;
        }
        
        .btn-ingresar {
            background: white;
            color: #ff6600;
            padding: 12px 28px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .btn-ingresar:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        /* Navegacion */
        nav {
            background: #222;
            padding: 15px 0;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 25px;
            padding: 8px 15px;
            transition: all 0.3s ease;
            font-weight: 500;
            border-radius: 20px;
        }
        
        nav a:hover {
            background: #ff6600;
            color: white;
        }
        
        /* Secciones */
        section {
            padding: 60px 40px;
        }
        
        .section-inicio {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://www.truper.com/img/fondo-tools.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .section-inicio h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .section-inicio p {
            font-size: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .section-productos {
            background: white;
        }
        
        .section-productos h2, .section-mision h2 {
            text-align: center;
            font-size: 36px;
            color: #ff6600;
            margin-bottom: 40px;
        }
        
        .productos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .producto-card {
            background: #f9f9f9;
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }
        
        .producto-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-color: #ff6600;
        }
        
        .producto-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            object-fit: contain;
        }
        
        .producto-card h3 {
            color: #ff6600;
            margin-bottom: 10px;
            font-size: 22px;
        }
        
        .producto-card p {
            color: #666;
        }
        
        .precio {
            color: #28a745;
            font-weight: bold;
            font-size: 20px;
            margin-top: 15px;
        }
        
        .section-mision {
            background: #f0f0f0;
        }
        
        .mision-vision {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .mision-card, .vision-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }
        
        .mision-card h3, .vision-card h3 {
            color: #ff6600;
            font-size: 28px;
            margin-bottom: 20px;
        }
        
        footer {
            background: #222;
            color: #999;
            text-align: center;
            padding: 30px;
        }
        
        footer p {
            margin: 5px 0;
        }
        
        footer hr {
            width: 100px;
            margin: 20px auto;
            border-color: #ff6600;
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .mision-vision {
                grid-template-columns: 1fr;
            }
            nav a {
                margin: 0 10px;
                font-size: 14px;
            }
            .section-inicio h1 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <div class="logo-img">
                <img src="imagenes/logo.png" alt="Truper">
            </div>
            <div class="logo-text">
                TRUPER
                <small>Herramientas de Calidad</small>
            </div>
        </div>
        <a href="login.php" class="btn-ingresar">Iniciar Sesion</a>
    </div>
    
    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#productos">Productos</a>
        <a href="#mision">Mision y Vision</a>
        <a href="#contacto">Contacto</a>
    </nav>
    
    <section id="inicio" class="section-inicio">
        <div>
            <h1>Bienvenido a Truper</h1>
            <p>Lideres en herramientas profesionales para Mexico y America Latina. Calidad y precio justo que garantizan su inversion.</p>
        </div>
    </section>
    
    <section id="productos" class="section-productos">
        <h2>Nuestros Productos</h2>
        <div class="productos-grid">
            <div class="producto-card">
                <img src="imagenes/martillo.jfif" alt="Martillo">
                <h3>Martillos</h3>
                <p>Desde el clasico martillo hasta especializados</p>
                <div class="precio">Desde $150 MXN</div>
            </div>
            <div class="producto-card">
                <img src="imagenes/taladro2.jpg" alt="Taladro">
                <h3>Taladros</h3>
                <p>Herramientas electricas profesionales</p>
                <div class="precio">Desde $1250 MXN</div>
            </div>
            <div class="producto-card">
                <img src="imagenes/dados.jpg" alt="Dados">
                <h3>Dados y juegos</h3>
                <p>Sets completos en diferentes medidas</p>
                <div class="precio">Desde $280 MXN</div>
            </div>
            <div class="producto-card">
                <img src="imagenes/pinza.jpeg" alt="Pinzas">
                <h3>Pinzas y cortadores</h3>
                <p>Precision y durabilidad garantizada</p>
                <div class="precio">Desde $95 MXN</div>
            </div>
        </div>
    </section>
    
    <section id="mision" class="section-mision">
        <h2>Nuestra Empresa</h2>
        <div class="mision-vision">
            <div class="mision-card">
                <h3>Mision</h3>
                <p>Proveer herramientas de alta calidad que impulsen el trabajo de los mexicanos, garantizando durabilidad, innovacion y precio justo para profesionales y aficionados.</p>
            </div>
            <div class="vision-card">
                <h3>Vision</h3>
                <p>Ser lideres en el mercado latinoamericano de herramientas, expandiendo nuestra presencia internacional y desarrollando productos sustentables que mejoren la calidad de vida de nuestros usuarios.</p>
            </div>
        </div>
    </section>
    
    <footer id="contacto">
        <p><strong>Truper Equipo 14</strong></p>
        <p>Taller de Sistemas Operativos - Instituto Tecnologico de Oaxaca</p>
        <hr>
        <p>Telefono: 951-123-4567 | Email: ventas@truper.com</p>
        <p>Alumno: Mendez Guzman Bryant | Semestre Enero - Junio 2026</p>
    </footer>
</body>
</html>
