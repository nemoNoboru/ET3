<?php
  // Plantilla de creación de un controlador por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Cancerbero
  require_once '../cancerbero/cancerbero.php';
  $cerb = new Cancerbero('AP_MisTitulaciones');
  $cerb->handleAuto();

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/Titulacion.php';
  require_once '../model/Usuario.php';
  require_once '../model/driver.php';
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita


  //Conexion a la BD
  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $rendermistit = new TemplateEngine();
  $titulaciones = new Titulacion($db);
  $usuario = new Usuario($db);
  $usuario = $usuario->findBy('user_name',$_SESSION['name']);
  $misTitulaciones = $usuario[0]->titulaciones();
  $alltitulaciones = $titulaciones->all();

  $rendermistit->misTitulaciones = $misTitulaciones;
  $rendermistit->allTitulaciones = $alltitulaciones;
  $renderMain->title = "Mis titulaciones"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $rendermistit->render('misTitulaciones_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
