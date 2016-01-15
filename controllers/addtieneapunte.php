<?php
  require_once '../model/U_Tiene_A.php';
  require_once '../model/Apunte.php';
  require_once '../model/driver.php';
  require_once '../model/Usuario.php';

  session_start();
  if(isset(array_keys($_POST)[1])){
    $apunteid = (array_keys($_POST)[1]);
    echo $apunteid;
    $db = Driver::getInstance();
    $apunte = new Apunte($db);
    $apunte = $apunte->findBy('apunte_id',$apunteid)[0];
    $usuario = new Usuario($db);
    $usuario = $usuario->findBy('user_name',$_SESSION['name'])[0];

    $utienea = new U_Tiene_A($db);
    $utienea = $utienea->findBy('apunte_id',$apunte->getApunte_id()); // find the row to destroy
    foreach ($utienea as $item) { //buscar la titulacion del usuario conectado
      if($item->getUser_id() == $usuario->getUser_id()){
        $item->destroy();
      }
    }
    $utienea = new U_Tiene_A($db);
    $utienea->setApunte_id($apunteid);
    $utienea->setUser_id($usuario->getUser_id());
    if($usuario->getUser_id() != $apunte->getUser_id()){
      $utienea->create();
    }
    header("location: apuntesComunidad.php");
  }
?>
