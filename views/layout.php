<?php 
if(!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if(!isset($inicio)) {
    $inicio = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Start cookieyes banner -->
	<script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/b9e7bde4b52aea0aa324fcac/script.js"></script>
	<!-- End cookieyes banner -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" style="width:30rem" alt="Logotipo de Bienes Raíces">   
                </a>
                <div class="mobile-menu">
                    <img loading="lazy" src="../build/img/barras.svg" alt="Icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth) : ?>
                            <a href="/logout">Cerrar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div>
            <?php if($inicio) { ?>
            <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
            <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p> 
        </div>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>
