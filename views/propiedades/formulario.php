<fieldset>
    <legend>Información general</legend>

    <label for="titulo">Nombre de la propiedad:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Título de la propiedad" value="<?php echo s($propiedad -> titulo) ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio" min="0" value="<?php echo s($propiedad -> precio) ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php if($propiedad -> imagen) : ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad -> descripcion) ?></textarea>

</fieldset> <!-- información general -->

<fieldset>
    <legend>Información de la propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" min="1" max="10" value="<?php echo s($propiedad -> habitaciones) ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="propiedad[wc]" min="1" max="10" value="<?php echo s($propiedad -> wc) ?>">

    <label for="estacionamientos">Estacionamientos:</label>
    <input type="number" id="estacionamientos" name="propiedad[estacionamientos]" min="1" max="10" value="<?php echo s($propiedad -> estacionamientos) ?>">
</fieldset>  <!-- información propiedad -->

<fieldset>
    <legend>Elige un vendedor</legend>

    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option selected value="">-- Seleccione --</option>
        <?php foreach ($vendedores as $vendedor) : ?>
            <option
                <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                value="<?php echo s($vendedor->id);?>">
                <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ;?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset> <!-- vendedores -->
