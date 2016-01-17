<?php
  // controlador que añade materia, creado por fvieira
  require_once '../model/Materia_Usuario.php';
  require_once '../model/driver.php';
  require_once '../model/Usuario.php';

  session_start();

  if(isset(array_keys($_POST)[0])){ // hace referencia al nombre del boton submit que ha hecho el post
    $mat = (array_keys($_POST)[0]);

    $db = Driver::getInstance();

    $usuario = new Usuario($db);
    //se borra la materia que se quiere añadir si ya ha sido añadida
    $usuario = $usuario->findBy('user_name',$_SESSION['name']);
    $usuario = $usuario[0];
    $mat_us = new Materia_Usuario($db);
    $mat_us = $mat_us->findBy('mat_id',$mat); // find the row to destroy
    foreach ($mat_us as $item) { //buscar la materia perteneciente al usuario conectado
      if($item->getUser_id() == $usuario->getUser_id()){
        $item->destroy();
      }
    }
    //se añade la materia al usuario
    $mat_us = new Materia_Usuario($db);
    $mat_us->setMat_id($mat);
    $mat_us->setUser_id($usuario->getUser_id());
    $mat_us->create();
    //retorno
    header("location: MisMaterias.php");
  }
?>
