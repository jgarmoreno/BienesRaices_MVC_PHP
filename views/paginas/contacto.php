<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if($mensaje) : ?>
        <p class="alerta correcto"><?php echo $mensaje;?></p>
    <?php endif; ?>
    
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>
    <h2>Rellene el formulario de contacto</h2>
    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Tu nombre:</label>
            <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>

        </fieldset>
        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vender o comprar:</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="vender">Vender</option>
                <option value="comprar">Comprar</option>
            </select>

            <label for="presupuesto">Precio o presupuesto:</label>
            <input type="number" placeholder="Tu presupuesto" id="presupuesto" name="contacto[presupuesto]" required>
        </fieldset>
        <fieldset>
            <legend>Método y preferencia de contacto</legend>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                <label for="contactar-email">Email</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <div id="contacto"></div>

        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>