<?php
// Controlador eliminar apunte hecho por cidleticia

//Includes iniciales

require_once '../model/driver.php';
require_once '../model/Apunte.php';
require_once 'navbar.php';
if(isset(array_keys($_POST)[1])){
  $db = Driver::getInstance();

  $id = (array_keys($_POST)[1]); // get the value of clicked button

  //FUNCIONES DEL CONTROLADOR
  $apunte = new Apunte($db);

  $apunte = $apunte->findBy('apunte_id',$id); // find the apunte
  $ruta = "../apuntes/".$apunte[0]->getRuta(); //route of the apunte

  $apunte[0]->destroy(); // destroy it
  unlink($ruta);  //delete apunte file
  if(isset($_GET["mat"])){
    header("location: adminMateria.php?mat=".$_GET["mat"]."");
  }else{
    header("location: misApuntes.php"); //return
  }
}
?>
