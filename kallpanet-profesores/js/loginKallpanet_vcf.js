const ip = "10.217.27.45";
const port = "4000";
const direccionServer = "http://"+ip+":"+ port +"/autenticar"
const btnIniciar = document.getElementById("buttonIniciar");
const zonaDanger = document.getElementById("danger");

btnIniciar.addEventListener('click', () => {
  
  zonaDanger.innerHTML = ``;
  
  
  if (checkNoEmpty()) {
    
    //Enviamos los datos en POST
    if(cleanInput().estatus == "error"){
      noCharacterSpecial();
    }


    if(cleanInput().estatus == "successfull"){
      let json = JSON.parse(cleanInput().orden);
      sendDate(json, direccionServer);
    }
    
    
  } else {
    avisoNoEmpty(); 
  }
});

function cleanInput() { //Acá devolvemos las cadenas limpias

  let datos = {estatus : "", orden: ""};

  let userInput = document.getElementById("userInput").value;
  let passwordInput = document.getElementById("userPassword").value;
  let userClean = '';
  let passwordClean = '';

  for (let index = 0; index < userInput.length; index++) {
    let char = userInput.charAt(index);
    if (char !== "\"" && char !== "\\" && char !== "," && char !== "/" && char !== "\'") {
      userClean += char;
    } else {
      datos.estatus = "error";
      
      return datos; //ESTO ES UN JSON
    }
  }

  for (let index = 0; index < passwordInput.length; index++) {
    let char = passwordInput.charAt(index);
    if (char !== "\"" && char !== "\\" && char !== "," && char !== "/" && char !== "\'") {
      passwordClean += char;
    } else {
      datos.estatus = "error";
      
      return datos; //ESTO ES UN JSON
    }
  }
  if(datos.estatus !== "error"){
    datos.estatus = "successfull";
    datos.orden = jsonUserPass(userClean, passwordClean);
    
  }
  return datos; //ESTO ES UN JSON
}

function checkNoEmpty() {
  let userInput = document.getElementById("userInput").value;
  let passwordInput = document.getElementById("userPassword").value;
  if (userInput === "" || passwordInput === "") {
    return false;
  } else {
    return true;
  }
}

function avisoNoEmpty(){
  let aviso = document.createElement("div");
    aviso.className = "danger-generado";
    aviso.innerHTML =`<div class="alert alert-danger" role="alert">
Rellene los datos
</div>`;
    zonaDanger.appendChild(aviso);
}

function noCharacterSpecial(){
let aviso = document.createElement("div");
aviso.className = "danger-generado";
aviso.innerHTML =`<div class="alert alert-danger" role="alert">
Hay caracteres no permitidos
</div>`;
zonaDanger.appendChild(aviso);
}

function NoexisteUsuario(){
  let aviso = document.createElement("div");
  aviso.className = "danger-generado";
  aviso.innerHTML =`<div class="alert alert-danger" role="alert">
Hay caracteres no permitidos
</div>`;
  zonaDanger.appendChild(aviso);
}

function sendDate(json, url){
  var opciones = {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(json)
  };
  fetch(url, opciones).then(function(response) {
    return response.json();
  }) .then(function(data) {
    console.log("Datos recibidos desde el servidor : " + data);

    if(typeof data.ruta !== undefined){
      window.location.href = data.ruta;
    }

  }).catch(function(error) {
    console.log("Error:", error);
  });

}

function jsonUserPass(usuario, password){
  let json = {usuario:usuario, password:password};
  let stringJson = JSON.stringify(json);
  return stringJson;
}


