


const btn_grados = document.getElementById("btn_grados");

const btn_secciones = document.getElementById("btn_secciones");

const btn_cursos_modificar = document.getElementById("cursos-modificar");

const btn_cursos_actividad = document.getElementById("cursos-actividad");

const btn_profesores = document.getElementById("profesores-modificar");

const btn_alumnos_modificar = document.getElementById("alumnos-modificar");

const btn_tickets = document.getElementById("tickets");

btn_grados.addEventListener('click', ()=>{
    window.location.href = "http://localhost/kallpanet/kallpanet-admin-grados.php";
});

btn_secciones.addEventListener('click', ()=>{
    window.location.href = "http://localhost/kallpanet/kallpanet-admin-secciones.php";
});

btn_cursos_modificar.addEventListener('click', ()=>{
    window.location.href ="http://localhost/kallpanet/kallpanet-admin-cursos-modificar.php";
});

btn_cursos_actividad.addEventListener('click', ()=>{
    window.location.href = "http://localhost/kallpanet/kallpanet-admin-cursos-ver.php";
});

btn_profesores.addEventListener('click', ()=>{
    window.location.href = "http://localhost/kallpanet/kallpanet-admin-profesores.php";
});

btn_alumnos_modificar.addEventListener('click', ()=>{
    window.location.href = "http://localhost/kallpanet/kallpanet-admin-alumnos.php";
});

btn_tickets.addEventListener('click', ()=>{
  window.location.href = "http://localhost/kallpanet/tickets.php";
});





document.getElementById("cerrar_sesion").addEventListener("click", function() {
    fetch("cerrar_sesion.php", {
      method: "POST"
    })
    .then(function(response) {
      if (response.ok) {
        // Redirecciona al usuario a una página de inicio de sesión u otra página relevante
        window.location.href = "http://localhost/kallpanet/login-admin.php";
      } else {
        console.log("Error al cerrar sesión");
      }
    })
    .catch(function(error) {
      console.log("Error de red: " + error);
    });
  });
  

  document.addEventListener('DOMContentLoaded', function() {
    clearURLParams();
  
    function clearURLParams() {
      var newURL = window.location.pathname;
      history.replaceState({}, document.title, newURL);
    }
  });
 