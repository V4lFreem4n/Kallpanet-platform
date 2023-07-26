<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['asistencia']) && is_array($_POST['asistencia'])) {
    foreach ($_POST['asistencia'] as $dni_alumno => $valorSelect) {
      // $dni_alumno contiene el DNI del alumno
      // $valorSelect contiene el valor seleccionado en el select correspondiente al alumno

      // Realiza las consultas o acciones que desees usando $dni_alumno y $valorSelect
      // ...
    }
  }
}
?>
