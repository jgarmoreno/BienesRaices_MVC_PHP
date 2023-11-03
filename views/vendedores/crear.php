<main class="contenedor seccion">
    <h1>Añade un vendedor</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/vendedores/crear" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" class="boton-verde" value="Añadir vendedor">
    </form>
</main>
<div class="contenedor">
    <a href="/admin" class="boton-verde">Volver</a>
</div>