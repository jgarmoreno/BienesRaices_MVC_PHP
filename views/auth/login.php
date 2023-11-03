<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesión</h1>

    <?php foreach($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Introduce tu email y contraseña</legend>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="email">

            <label for="password">Contraseña</label>
            <input type="password" placeholder="Tu contraseña" id="password" name="password">

        </fieldset>

        <input type="submit" value="Iniciar sesión" class="boton-verde">
    </form>
</main>