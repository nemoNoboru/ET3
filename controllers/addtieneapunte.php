<?php
  // controlador hecho por FVieira

  require_once '../model/U_Tiene_A.php';
  require_once '../model/Apunte.php';
  require_once '../model/driver.php';
  require_once '../model/Usuario.php';

  session_start();

  if(isset(array_keys($_POST)[1])){ //hace referencia al nombre del boton que hizo el post
    $apunteid = (array_keys($_POST)[1]);

    $db = Driver::getInstance();
    $apunte = new Apunte($db);
    // se borra el apunte si ya estaba añadido
    $apunte = $apunte->findBy('apunte_id',$apunteid)[0];
    $usuario = new Usuario($db);
    $usuario = $usuario->findBy('user_name',$_SESSION['name'])[0];

    $utienea = new U_Tiene_A($db);
    $utienea = $utienea->findBy('apunte_id',$apunte->getApunte_id()); // find the row to destroy
    foreach ($utienea as $item) { //buscar el apunte del usuario conectado
      if($item->getUser_id() == $usuario->getUser_id()){
        $item->destroy();
      }
    }
    // se añade el apunte
    $utienea = new U_Tiene_A($db);
    $utienea->setApunte_id($apunteid);
    $utienea->setUser_id($usuario->getUser_id());
    if($usuario->getUser_id() != $apunte->getUser_id()){ // si el apunte a guardar no es del propio usuario
      $utienea->create();
    }
    //retorno
    header("location: apuntesComunidad.php");
  }
?>
