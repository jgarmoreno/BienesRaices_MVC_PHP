document.addEventListener('DOMContentLoaded', function (){
    eventListeners();
    darkMode();
})

function darkMode() {
    const prefDarkMode = window.matchMedia('(prefers-color-scheme:dark)');
    if(prefDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    prefDarkMode.addEventListener('change', function(){
        if(prefDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        } 
    });
    
    let botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    // Mostrar campos condicionales del formulario (email o telefono)
    const metodoContacto = document.querySelectorAll("input[name='contacto[contacto]']");
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}
function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }
    // navegacion.classlist.toggle('mostrar');
}
function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
        
            <label for="telefono">Móvil</label>
            <input type="tel" placeholder="Tu teléfono" id="telefono" name="contacto[telefono]">

            <p>Elija una fecha y hora preferida para el contacto:</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        
    
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]" required>
        `;
    }
}