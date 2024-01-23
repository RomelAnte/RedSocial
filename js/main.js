function mostrarImagen(input) {
    var vistaPrevia = document.querySelector(".portada");
    var estadistica = document.querySelector(".estadistica")
    var subirImagen = document.querySelector(".subirImagen")
    vistaPrevia.innerHTML = '';
    if (input.files && input.files[0]) {
        var lector = new FileReader();

        lector.onload = function (e) {
            var imagen = document.createElement('img');
            imagen.src = e.target.result;
            imagen.style.width = "100%"
            vistaPrevia.appendChild(imagen);
            
        };
        lector.readAsDataURL(input.files[0]);
    }
    estadistica.style.position = "relative";
    subirImagen.style.position = "relative";

}