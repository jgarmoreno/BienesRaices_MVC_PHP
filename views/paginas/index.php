<main class="contenedor seccion">
        <h1>Más sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy"> 
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere eligendi velit, quos ipsam obcaecati assumenda quibusdam sapiente blanditiis officiis expedita dolorum cum, animi dolor exercitationem culpa nobis itaque? Quod, sunt.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy"> 
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere eligendi velit, quos ipsam obcaecati assumenda quibusdam sapiente blanditiis officiis expedita dolorum cum, animi dolor exercitationem culpa nobis itaque? Quod, sunt.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy"> 
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere eligendi velit, quos ipsam obcaecati assumenda quibusdam sapiente blanditiis officiis expedita dolorum cum, animi dolor exercitationem culpa nobis itaque? Quod, sunt.</p>
            </div>
        </div>
    </main>
    <section class="seccion contenedor">
        <h2>Casas y Pisos en Venta</h2>

        <?php
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver todas las propiedades</a>
        </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor te responderá con la mayor brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el <span>20/04/2023</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el <span>12/03/2023</span> por: <span>Admin</span></p>
                        <p>
                            Maximiza el espacio de tu hogar ganando espacio con esta guía, aprende a combinar muebles y colores para darle vida a tu casa.
                        </p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple todas las expectativas.
                </blockquote>
                <p>- Jorge García Moreno, 26</p>
            </div>
        </section>
    </div>