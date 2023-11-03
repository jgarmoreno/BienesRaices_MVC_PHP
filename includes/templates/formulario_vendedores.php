<fieldset>
    <legend>Información general</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre del vendedor" value="<?php echo s($vendedor -> nombre) ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido del vendedor" value="<?php echo s($vendedor -> apellido) ?>">

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="XXX-XXX-XXX"value="<?php echo s($vendedor -> telefono) ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="vendedor[imagen]">
    <?php if($vendedor -> imagen) : ?>
        <img src="/bienesraices/imagenes/<?php echo $vendedor->imagen ?>" class="imagen-small">
    <?php endif; ?>

</fieldset>