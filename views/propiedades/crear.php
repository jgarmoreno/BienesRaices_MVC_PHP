<main class="contenedor seccion">
    <h1>Crea una propiedad</h1>

        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

    <form class="formulario" method="POST" action="/propiedades/crear" enctype="multipart/form-data">
        <?php include __DIR__ . '../formulario.php'; ?>
        <input type="submit" value="Añadir propiedad" class="boton-verde">
    </form>
</main>
<div class="contenedor">
    <a href="/admin" class="boton-verde">Volver</a>
</div>