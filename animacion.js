function mostrarAnimacion() {
    const animacion = document.getElementById("animacion");

    // Hacer visible el contenedor de animación
    animacion.style.visibility = "visible";
    animacion.style.pointerEvents = "auto";

    // Agregar el mensaje de Feliz Cumpleaños
    const mensaje = document.createElement("h2");
    mensaje.id = "mensaje";
    mensaje.textContent = "¡Feliz Cumpleaños! 🎉🎂";
    animacion.appendChild(mensaje);

    // Animación de texto y colores
    mensaje.style.fontSize = "3rem";
    mensaje.style.color = "rgb(255, 0, 255)";
    mensaje.style.fontWeight = "bold";
    mensaje.style.animation = "animacionTexto 5s ease-in-out, animacionRGB 3s infinite alternate";

    // Reproducir el sonido
    const audio = new Audio('SONIDO1.mp3');  // Asegúrate de tener el archivo de sonido
    audio.play();

    // Generar serpentinas
    generarSerpentina();

    // Generar confeti
    generarConfeti();

    // Eliminar el mensaje después de 10 segundos
    setTimeout(() => {
        animacion.innerHTML = ""; // Limpiar la animación
        animacion.style.visibility = "hidden"; // Volver a ocultar el contenedor de animación
        animacion.style.pointerEvents = "none"; // Deshabilitar interacciones mientras está oculto
    }, 10000); // Duración de la animación (10 segundos)
}

function generarSerpentina() {
    const animacion = document.getElementById("animacion");

    // Crear una serpentina flotante
    for (let i = 0; i < 5; i++) {
        const serpentina = document.createElement("div");
        serpentina.classList.add("serpentina");
        serpentina.style.animation = `flotarSerpentina ${Math.random() * 5 + 5}s linear infinite`;
        serpentina.style.left = `${Math.random() * 100}vw`;
        serpentina.style.top = `${Math.random() * 100}vh`;
        animacion.appendChild(serpentina);
    }
}

function generarConfeti() {
    const animacion = document.getElementById("animacion");

    // Crear confeti
    for (let i = 0; i < 30; i++) { // Generar 30 partículas de confeti
        const confeti = document.createElement("div");
        confeti.classList.add("confeti");
        confeti.style.left = `${Math.random() * 100}vw`;
        confeti.style.animationDuration = `${Math.random() * 3 + 2}s`; // Duración aleatoria
        confeti.style.animationDelay = `${Math.random() * 2}s`; // Retardo aleatorio
        animacion.appendChild(confeti);
    }
}
