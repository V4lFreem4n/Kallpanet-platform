document.getElementById("add-grado").addEventListener('click', ()=>{
    document.getElementById("panel-add-up").style.display = 'block';    
    });
    let btn_descartar_grado = document.getElementById("descartar-add-grado");
    btn_descartar_grado.addEventListener('click', ()=>{ 
      document.getElementById("panel-add-up").style.display = 'none';   
    });

    