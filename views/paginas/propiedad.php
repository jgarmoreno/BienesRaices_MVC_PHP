<main class="contenedor seccion contenido-centrado">
    <?php if ($propiedad) : ?>
        <div class="propiedad-completa">
            <h1><?php echo $propiedad->titulo?></h1>
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen?>" alt="Imagen <?php echo $propiedad->titulo?>">

            <div class="resumen-propiedad">
                <p class="precio"><?php echo $propiedad->precio?> €</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono-propiedad" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p><?php echo $propiedad->wc?></p> 
                    </li>
                    <li>
                        <img class="icono-propiedad" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono Aparcamiento">
                        <p><?php echo $propiedad->estacionamientos?></p> 
                    </li>
                    <li>
                        <img class="icono-propiedad" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                        <p><?php echo $propiedad->habitaciones?></p> 
                    </li>
                </ul>
                <p class="texto-anuncio"><?php echo $propiedad->descripcion?></p>
                <p class="texto-anuncio"><?php echo $propiedad->descripcion?></p>
            </div>
        </div> 
    <?php endif;?> 
</main>