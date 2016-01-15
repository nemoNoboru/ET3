<?php
  require_once '../model/Materia_Usuario.php';
  require_once '../model/driver.php';
  require_once '../model/Usuario.php';

  session_start();
  if(isset(array_keys($_POST)[0])){
    $mat = (array_keys($_POST)[0]);
    echo $mat;

    $db = Driver::getInstance();

    $usuario = new Usuario($db);

    $usuario = $usuario->findBy('user_name',$_SESSION['name']);
    $usuario = $usuario[0];
    $mat_us = new Materia_Usuario($db);
    $mat_us = $mat_us->findBy('mat_id',$mat); // find the row to destroy
    foreach ($mat_us as $item) { //buscar la titulacion del usuario conectado
      if($item->getUser_id() == $usuario->getUser_id()){
        $item->destroy();
      }
    }
    $mat_us = new Materia_Usuario($db);
    $mat_us->setMat_id($mat);
    $mat_us->setUser_id($usuario->getUser_id());

    $mat_us->create();
    header("location: MisMaterias.php
  }
?>
