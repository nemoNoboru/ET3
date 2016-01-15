<?php
// Controlador de baja Materia de la BD por Rui Caramés
  require_once '../model/Materia.php';
  require_once '../model/driver.php';
  if(isset((array_keys($_POST)[0]))){
    $mat = (array_keys($_POST)[0]); // coge el valor del boton clickado
    $db = Driver::getInstance(); // incializa BD
    $materia = new Materia($db); // inicializa objeto Materia

    $materia = $materia->findBy('mat_id',$mat); //coge la materia que se corresponde con el valor del boton clickado previamente
    $materia[0]->destroy();// elimina materia de la BD

    header("location: administrarMaterias.php"); // vuelve a administrarMarterias
}
?>
