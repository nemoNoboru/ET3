<?php
  //controlador hecho por FVieira
  require_once '../model/Titulacion_Usuario.php';
  require_once '../model/Usuario.php';
  require_once '../model/driver.php';

  session_start();

  $titulo = (array_keys($_POST)[0]); // get the value of clicked button

  $db = Driver::getInstance();
  $usuario = new Usuario($db);

  //borra la relacion entre una titulacion y un usuario
  $usuario = $usuario->findBy('user_name',$_SESSION['name']);
  $usuario = $usuario[0];
  $tit_us = new Titulacion_Usuario($db);
  $tit_us = $tit_us->findBy('tit_id',$titulo); // find the row to destroy
  foreach ($tit_us as $item) { //buscar la titulacion del usuario conectado
    if($item->getUser_id() == $usuario->getUser_id()){
      $item->destroy();
    }
  }
  header("location: mistitulaciones.php"); //return
?>
