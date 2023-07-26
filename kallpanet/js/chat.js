const dni_mio = document.getElementById("dni").value;

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

 ///////////////////////////////////////////


 const connection = new WebSocket('ws://localhost:4000');
 
 
 //Vamos a generar la función que verifica si hay tablas creadas


function send(e){
    //Vamos a enviar los datos al servidor
    let mensaje = {administrador: , profesor: , mensaje: , desde:};
  let texto = document.getElementById("input").value;
  let profesor = lista[e].dni;
  let administrador = dni_mio; // <-------------------------------------------------------------------
  connection.send(JSON.stringify(mensaje));
  //enviarRegistrarDatos(administrador, profesor, texto);
  }

// Connection opened
connection.addEventListener('open', function (event) {
  console.log('Connected to WS Server ...' + event.target);
});


// Listen for messages
connection.addEventListener('message', function (event) {
 

let mensaje = JSON.parse(event.data); // ACÁ SE RECIVE UN ARRAY...
//console.log(mensaje + ' Size : '+ mensaje.length);

console.log(mensaje);

   

    for (let index = 0; index < responseData.length; index++) {
    if (responseData[index].desde == dni_mio) { // <-------------------------------------------------------------------
         document.getElementById("pantalla_cuerpo").innerHTML = `<div class="yo">${responseData[index].mensaje}</div>
      <div class="yo_triangulo"></div>`;
    } else {
      document.getElementById("pantalla_cuerpo").innerHTML = `<div class="otro">${responseData[index].mensaje}</div>
      <div class="otro_triangulo"></div>`;
    }
  }
 

 

});









    