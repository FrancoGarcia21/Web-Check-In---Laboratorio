document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registerForm');
    form.addEventListener('submit', validateRegisterForm);
});

function validateRegisterForm(e) {
    const nombre = document.getElementById('nombre_completo').value.trim();
    const email = document.getElementById('email').value.trim();

    if (!nombre || !email) {
        //e.preventDefault(); // Evita que se envíe el formulario
        alert('Por favor, complete todos los campos obligatorios.');
    }
}

//console.log('register.js cargado correctamente');
// O también:
//alert('register.js cargado correctamente');
