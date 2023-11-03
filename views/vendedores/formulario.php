<fieldset>
    <legend>Información general</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre);?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="nombre" name="vendedor[apellido]" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido);?>">

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="XXX-XXX-XXX" value="<?php echo s($vendedor->telefono);?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="vendedor[imagen]" accept="image/jpeg, image/png">
    <?php if($vendedor -> imagen) : ?>
        <img src="/imagenes/<?php echo $vendedor -> imagen ?>" class="imagen-small">
    <?php endif; ?>
</fieldset>