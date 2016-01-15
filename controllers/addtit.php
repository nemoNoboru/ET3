<?php
  require_once '../model/Titulacion_Usuario.php';
  require_once '../model/driver.php';
  require_once '../model/Usuario.php';

  session_start();
  if(isset(array_keys($_POST)[0])){  
    $titulo = (array_keys($_POST)[0]);
    echo $titulo;
    $db = Driver::getInstance();
    $usuario = new Usuario($db);
    $usuario = $usuario->findBy('user_name',$_SESSION['name']);
    $usuario = $usuario[0];
    $tit_us = new Titulacion_Usuario($db);
    $tit_us = $tit_us->findBy('tit_id',$titulo); // find the row to destroy
    foreach ($tit_us as $item) { //buscar la titulacion del usuario conectado
      if($item->getUser_id() == $usuario->getUser_id()){
        $item->destroy();
      }
    }
    $tit_us = new Titulacion_Usuario($db);
    $tit_us->setTit_id($titulo);
    $tit_us->setUser_id($usuario->getUser_id());

    $tit_us->create();
    header("location: mistitulaciones.php");
  }
?>
