function filtrarGrados(){
    let grado = document.getElementById("filtrar-grado").value;
    param1 = encodeURIComponent(grado).replace(/%20/g, '+');
    let url = 'http://localhost/kallpanet/kallpanet-admin-secciones.php?filtrogrados=' + param1;
    window.location.href = url;
}

function subir_secciones(){
    
    let select = document.getElementById("elegir-grado");
    let valor = select.value;
    let form_secciones = document.getElementById("input-grados-elegir");
    form_secciones.value = valor;
    
}

function cerrar_add(){
    document.getElementById("add-seccions-up").style.display = "none";

}

document.getElementById("add-seccion").addEventListener('click', ()=>{
    document.getElementById("add-seccions-up").style.display = "block";

});

function eliminarSeccion(e){
    document.getElementById(e).submit();
}