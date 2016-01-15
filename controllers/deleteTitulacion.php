<?php
// Controlador eliminar Titulacion hecho por cidleticia

//Includes iniciales

require_once '../model/driver.php';
require_once '../model/Titulacion.php';

if(isset((array_keys($_POST)[1]))){
  $id = (array_keys($_POST)[1]); // get the value of clicked button
  $db = Driver::getInstance();

  $titulacion = new Titulacion($db);
  //FUNCIONES DEL CONTROLADOR
  $titulacion = $titulacion->findBy('tit_id',$id);
  $titulacion[0]->destroy();
  header("location: consultaTitulaciones.php"); //return
}
