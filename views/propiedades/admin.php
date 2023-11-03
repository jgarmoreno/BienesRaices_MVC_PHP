<main class="contenedor seccion">
    <h1>Administrador de Propiedades</h1>
    
    <?php
        if($resultado) {
            $mensaje = mostrarAlerta(intval($resultado));
            if ($mensaje) : ?>
                <p class="alerta correcto"><?php echo s($mensaje) ?></p>
            <?php endif; 
        } 
    ?> 
    <div class="acciones-admin">
        <a href="/propiedades/crear" class="boton boton-verde-block">Nueva propiedad</a>
        <a href="/vendedores/crear" class="boton boton-verde-block">Añadir vendedor</a>
    </div>

    <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($propiedades as $propiedad) : ?>
                <tr>
                    <td><?php echo $propiedad -> id ?></td>
                    <td><?php echo $propiedad -> titulo ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad -> imagen ?>" class="imagen-tabla"></td>
                    <td><?php echo $propiedad -> precio ?>€</td>
                    <td>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad -> id; ?>" class="boton-verdeCorrecto-block">Actualizar</a>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad -> id ;?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Borrar"></a>  
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>    
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendedores as $vendedor) : ?>
                    <tr>
                        <td><?php echo $vendedor -> id ?></td>
                        <td><?php echo $vendedor -> nombre . " " . $vendedor -> apellido ?></td>
                        <td>
                            <img src="/imagenes/<?php echo $vendedor -> imagen ?>" class="imagen-tabla">
                        </td>
                        <td><?php echo $vendedor -> telefono ?></td>
                        <td>
                            <a href="/vendedores/actualizar?id=<?php echo $vendedor -> id;?>" class="boton-verdeCorrecto-block">Actualizar</a>
                            <form method="POST" class="w-100" action="/vendedores/eliminar">
                                <input type="hidden" name="id" value="<?php echo $vendedor -> id;?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="boton-rojo-block" value="Borrar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>