<?php
//Controlador para el borrado de notificaciones por Martín Vázquez
session_start();

require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
require_once '../model/Usuario.php'; //ORM boroto
require_once '../model/driver.php';
require_once '../model/Notificacion.php';

if(isset($_SESSION['name'])){
  $dbm = Driver::getInstance();

  $usuario = new Usuario($dbm);
  $notif = new Notificacion($dbm);

  //borrar todas las notificaciones pertenecientes a un usuario
  $usuario = $usuario->findBy("user_name", $_SESSION["name"]);
  $notif = $notif->findBy("user_id", $usuario[0]->getUser_id());
  foreach($notif as $key){
    $key->destroy();
  }
}
  ?>
  La bandeja de notificaciones se ha limpiado
