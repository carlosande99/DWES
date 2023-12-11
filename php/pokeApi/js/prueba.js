document.addEventListener('DOMContentLoaded', function () {
    var botonBusqueda = document.getElementById('mostrarBuscador');
    var buscadorContainer = document.getElementById('buscadorContainer');
    var cerrarBuscador = document.getElementById('cerrarBuscador');

    botonBusqueda.addEventListener('click', function () {
        if (buscadorContainer.style.display === 'none' || buscadorContainer.style.display === '') {
            buscadorContainer.style.display = 'inline';
            if (botonBusqueda.innerHTML === "Búsqueda"){
                botonBusqueda.innerHTML = "Búsqueda";
                botonBusqueda.innerHTML = "Cerrar";
            }else{
                botonBusqueda.innerHTML = "Cerrar";
            }
        } else {
            buscadorContainer.style.display = 'none';
            buscadorInput.value = "";
            botonBusqueda.innerHTML = "Búsqueda";
        }
    });

    cerrarBuscador.addEventListener('click', function () {
        botonBusqueda.innerHTML = "Búsqueda";
        buscadorContainer.style.display = 'none';
    });
});

function cambiarImagen(imagenes){
    let imagen =document.getElementById("imagenPokemon");
    console.log(imagen);
    let indiceActual = imagenes.indexOf(imagen.src);
    indiceActual++;
    if (indiceActual >= imagenes.length) {
        indiceActual = 0;
    }
    imagen.src = imagenes[indiceActual];
};