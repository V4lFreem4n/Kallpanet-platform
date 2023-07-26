let btn = document.getElementById("desplegar");
let estado = false;

btn.addEventListener('click', () => {
    if (estado == false) {
        chat.classList.add("cerrado");
        document.getElementById("conversacion").style.display = "none";
        document.getElementById("chat").style.width = "280px";
        
        document.getElementById("atras").src = "images/atras.png";
        estado = true;
    } else {
        chat.classList.remove("cerrado");
        document.getElementById("chat").style.width = "700px";
        
        document.getElementById("conversacion").style.display = "block";
        document.getElementById("atras").src = "images/adelante.png";
        estado = false;
    }
});

 